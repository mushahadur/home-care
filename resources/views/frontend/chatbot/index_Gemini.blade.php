<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AI Chatbot</title>

    {{-- Tailwind CDN is fine for development. For production, build Tailwind with Vite. --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center p-4">

    <main class="w-full max-w-3xl bg-white rounded-2xl shadow-lg overflow-hidden">
        <header class="bg-blue-600 text-white p-5 flex items-center justify-between">
            <div>
                <h1 class="text-xl font-bold">AI Assistant</h1>
                <p class="text-sm text-blue-100">Powered by Gemini AI</p>
            </div>
            <button
                id="new-chat"
                type="button"
                class="text-sm border border-blue-300 rounded-lg px-3 py-1.5 hover:bg-blue-700"
            >
                New chat
            </button>
        </header>

        <section
            id="messages"
            class="h-[480px] overflow-y-auto p-5 space-y-4"
            aria-live="polite"
        >
            <div class="mr-auto bg-gray-100 rounded-xl p-4 max-w-[85%]">
                Hello! Ask me anything.
            </div>
        </section>

        <form id="chat-form" class="border-t p-4 flex gap-3">
            <input
                id="message-input"
                type="text"
                maxlength="4000"
                placeholder="Type your question..."
                autocomplete="off"
                required
                class="flex-1 min-w-0 border rounded-xl px-4 py-3
                       focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            <button
                id="send-button"
                type="submit"
                class="bg-blue-600 text-white rounded-xl px-5 py-3
                       hover:bg-blue-700 disabled:opacity-50"
            >
                Send
            </button>
        </form>

        <p id="status" class="px-4 pb-3 text-sm text-gray-500" role="status"></p>
    </main>

    <script>
        const CHAT_URL = @json(route('chatbot.message'));
        const MAX_HISTORY = 20;

        const form = document.getElementById('chat-form');
        const input = document.getElementById('message-input');
        const messagesEl = document.getElementById('messages');
        const sendButton = document.getElementById('send-button');
        const newChatButton = document.getElementById('new-chat');
        const statusEl = document.getElementById('status');

        // Gemini remembers nothing, so we keep the conversation here and send it each time.
        // Each item: { role: 'user' | 'model', text: '...' }
        let chatHistory = [];

        function addMessage(text, sender) {
            const bubble = document.createElement('div');

            bubble.className = sender === 'user'
                ? 'ml-auto bg-blue-600 text-white rounded-xl p-4 max-w-[85%] whitespace-pre-wrap break-words'
                : 'mr-auto bg-gray-100 text-gray-900 rounded-xl p-4 max-w-[85%] whitespace-pre-wrap break-words';

            // textContent (not innerHTML): model output is treated as plain text, never HTML.
            bubble.textContent = text;

            messagesEl.appendChild(bubble);
            messagesEl.scrollTop = messagesEl.scrollHeight;
        }

        form.addEventListener('submit', async (event) => {
            event.preventDefault();

            const message = input.value.trim();
            if (!message || sendButton.disabled) return;

            addMessage(message, 'user');
            input.value = '';
            sendButton.disabled = true;
            statusEl.textContent = 'Gemini is thinking...';

            try {
                const response = await fetch(CHAT_URL, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({
                        message,
                        history: chatHistory.slice(-MAX_HISTORY), // previous turns only
                    }),
                });

                const data = await response.json().catch(() => ({}));

                if (!response.ok) {
                    throw new Error(data.error || data.message || 'Request failed. Please try again.');
                }

                addMessage(data.answer, 'bot');

                // Save the turn only after success, so a failed request leaves no broken history.
                chatHistory.push({ role: 'user', text: message });
                chatHistory.push({ role: 'model', text: data.answer });
                statusEl.textContent = '';
            } catch (error) {
                statusEl.textContent = error.message;
            } finally {
                sendButton.disabled = false;
                input.focus();
            }
        });

        newChatButton.addEventListener('click', () => {
            chatHistory = [];
            messagesEl.innerHTML = '';
            addMessage('Hello! Ask me anything.', 'bot');
            statusEl.textContent = '';
            input.focus();
        });
    </script>
</body>
</html>