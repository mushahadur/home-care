<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    private const MAX_HISTORY = 20;

    private const SYSTEM_PROMPT = 'You are a helpful, concise assistant.';

    public function index()
    {
        return view('frontend.chatbot.index');
    }

    public function chat(Request $request): JsonResponse
    {
        $data = $request->validate([
            'message'        => ['required', 'string', 'max:4000'],
            'history'        => ['nullable', 'array', 'max:' . self::MAX_HISTORY],
            'history.*.role' => ['required', 'in:user,model'],
            'history.*.text' => ['required', 'string', 'max:8000'],
        ]);

        $apiKey = config('services.gemini.api_key');

        if (empty($apiKey)) {
            return response()->json(['error' => 'Chatbot is not configured.'], 500);
        }

        $model = config('services.gemini.model', 'gemini-flash-latest');
        $url   = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent";

        // Gemini is stateless: we send the previous turns + the new message every time.
        $contents = [];
        foreach ($data['history'] ?? [] as $turn) {
            $contents[] = [
                'role'  => $turn['role'],
                'parts' => [['text' => $turn['text']]],
            ];
        }
        $contents[] = [
            'role'  => 'user',
            'parts' => [['text' => $data['message']]],
        ];

        try {
            $response = Http::timeout(60)
                // Key goes in a header, not in the URL, so it never lands in logs.
                ->withHeaders(['x-goog-api-key' => $apiKey])
                // Retry temporary failures (500/503) and network drops: 3 tries, 1s apart.
                ->retry(3, 1000, function ($exception) {
                    if ($exception instanceof ConnectionException) {
                        return true;
                    }

                    return $exception instanceof RequestException
                        && in_array($exception->response->status(), [500, 503], true);
                }, false)
                ->post($url, [
                    'systemInstruction' => ['parts' => [['text' => self::SYSTEM_PROMPT]]],
                    'contents'          => $contents,
                ]);
        } catch (ConnectionException $e) {
            Log::error('Gemini connection error: ' . $e->getMessage());

            return response()->json(['error' => 'Could not reach the AI service. Please try again.'], 504);
        }

        if ($response->failed()) {
            // Full details go to the log; the visitor only sees a safe message.
            Log::error('Gemini API error', [
                'status' => $response->status(),
                'body'   => $response->body(),
            ]);

            return match (true) {
                $response->status() === 429 => response()->json(
                    ['error' => 'Too many requests. Please wait a moment and try again.'], 429
                ),
                in_array($response->status(), [500, 503], true) => response()->json(
                    ['error' => 'The AI service is busy right now. Please try again shortly.'], 503
                ),
                default => response()->json(
                    ['error' => 'The AI service could not process this request.'], 502
                ),
            };
        }

        // A reply can have several parts; join all the text pieces.
        $answer = collect($response->json('candidates.0.content.parts', []))
            ->pluck('text')
            ->filter()
            ->implode('');

        if ($answer === '') {
            Log::warning('Gemini returned no text', [
                'blockReason'  => $response->json('promptFeedback.blockReason'),
                'finishReason' => $response->json('candidates.0.finishReason'),
            ]);

            return response()->json(['error' => 'No answer was returned. Try rephrasing your question.'], 502);
        }

        return response()->json(['answer' => $answer]);
    }
}