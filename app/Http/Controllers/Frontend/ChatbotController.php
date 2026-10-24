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

    // Groq speaks the "OpenAI-compatible" format.
    private const API_URL = 'https://api.groq.com/openai/v1/chat/completions';

    public function index()
    {
        return view('frontend.chatbot.index');
    }

    public function chat(Request $request): JsonResponse
    {
        $data = $request->validate([
            'message'           => ['required', 'string', 'max:4000'],
            'history'           => ['nullable', 'array', 'max:' . self::MAX_HISTORY],
            'history.*.role'    => ['required', 'in:user,assistant'],
            'history.*.content' => ['required', 'string', 'max:8000'],
        ]);

        $apiKey = config('services.groq.api_key');

        if (empty($apiKey)) {
            return response()->json(['error' => 'Chatbot is not configured.'], 500);
        }

        $model = config('services.groq.model', 'openai/gpt-oss-120b');

        // The API is stateless: system prompt + previous turns + the new message, every time.
        $messages = [['role' => 'system', 'content' => self::SYSTEM_PROMPT]];

        foreach ($data['history'] ?? [] as $turn) {
            $messages[] = ['role' => $turn['role'], 'content' => $turn['content']];
        }

        $messages[] = ['role' => 'user', 'content' => $data['message']];

        try {
            $response = Http::timeout(60)
                ->withToken($apiKey) // sends "Authorization: Bearer <key>"
                // Retry temporary failures (500/503) and network drops: 3 tries, 1s apart.
                ->retry(3, 1000, function ($exception) {
                    if ($exception instanceof ConnectionException) {
                        return true;
                    }

                    return $exception instanceof RequestException
                        && in_array($exception->response->status(), [500, 503], true);
                }, false)
                ->post(self::API_URL, [
                    'model'    => $model,
                    'messages' => $messages,
                ]);
        } catch (ConnectionException $e) {
            Log::error('Groq connection error: ' . $e->getMessage());

            return response()->json(['error' => 'Could not reach the AI service. Please try again.'], 504);
        }

        if ($response->failed()) {
            // Full details go to the log; the visitor only sees a safe message.
            Log::error('Groq API error', [
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

        // OpenAI-style reply: choices[0].message.content
        $answer = $response->json('choices.0.message.content');

        if (!is_string($answer) || trim($answer) === '') {
            Log::warning('Groq returned no text', [
                'finish_reason' => $response->json('choices.0.finish_reason'),
            ]);

            return response()->json(['error' => 'No answer was returned. Try rephrasing your question.'], 502);
        }

        return response()->json(['answer' => $answer]);
    }
}