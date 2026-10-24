<!-- ========== CHATBOT FLOATING BUTTON ========== -->
<div id="chatbotWrapper" class="fixed right-4 transition-all duration-300 ease-out" style="bottom: 1.5rem; z-index: 9999;">
    <button id="chatbotToggle" type="button"
        class="relative group w-10 h-10 rounded-full bg-gradient-to-br from-emerald-500 to-blue-500 shadow-xl flex items-center justify-center hover:scale-110 active:scale-95 transition-transform duration-300"
        aria-label="Open chat">
        <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full border-2 border-white dark:border-gray-900 animate-pulse pointer-events-none"></span>
        <i class="fas fa-comment-dots text-white text-lg group-hover:rotate-12 transition-transform pointer-events-none"></i>
        <span class="absolute inset-0 rounded-full bg-emerald-400 opacity-40 animate-ping pointer-events-none"></span>
    </button>
</div>

<!-- ========== CHAT MODAL ========== -->
<div id="chatModal" class="fixed inset-0 hidden" style="z-index: 9999;" role="dialog" aria-modal="true" aria-labelledby="chatTitle">
    <!-- Backdrop -->
    <div id="chatBackdrop" class="absolute inset-0 bg-black/50 backdrop-blur-xs"></div>

    <!-- Panel (Mobile & Desktop Same Size) -->
    <div id="chatPanel" class="absolute bottom-4 right-4 left-4 sm:left-auto sm:w-[320px] h-[500px] max-h-[85vh] bg-white dark:bg-gray-900 shadow-2xl rounded-2xl flex flex-col overflow-hidden border border-gray-200 dark:border-gray-800">
        
        <!-- Header -->
        <div class="bg-gradient-to-r from-emerald-500 to-blue-500 px-5 py-4 flex items-center gap-3 flex-shrink-0">
            <div class="relative flex-shrink-0">
                <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center shadow-md">
                    <i class="fas fa-user-nurse text-emerald-500 text-lg"></i>
                </div>
                <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-400 rounded-full border-2 border-white"></span>
            </div>
            <div class="flex-1 min-w-0 text-white">
                <p id="chatTitle" class="font-semibold text-sm sm:text-base truncate">Nurse Assistant</p>
                <p class="text-[11px] sm:text-xs opacity-90 flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-300 animate-pulse"></span>
                    <span id="status">Online · Ready to help</span>
                </p>
            </div>
            <!-- New Chat Button -->
            <button id="new-chat" type="button" class="text-white hover:bg-white/20 rounded-full w-8 h-8 flex items-center justify-center transition flex-shrink-0" title="New Chat">
                <i class="fas fa-rotate-right"></i>
            </button>
            <!-- Close Button -->
            <button id="chatClose" type="button" class="text-white hover:bg-white/20 rounded-full w-8 h-8 flex items-center justify-center transition flex-shrink-0" aria-label="Close chat">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Messages Area -->
        <div id="messages" class="flex-1 overflow-y-auto p-4 space-y-4 bg-gray-50 dark:bg-gray-950 flex flex-col">
            <!-- Initial welcome message will be injected by JS or you can hardcode it -->
        </div>

        <!-- Input Area -->
        <div class="p-3 border-t border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 flex-shrink-0">
            <form id="chat-form" class="flex items-center gap-2">
                <input type="text" id="message-input" placeholder="Type your message…"
                    class="flex-1 px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-sm text-gray-900 dark:text-white placeholder-gray-400 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition"
                    autocomplete="off">
                <button type="submit" id="send-button"
                    class="w-10 h-10 rounded-full bg-emerald-500 hover:bg-emerald-600 text-white flex items-center justify-center flex-shrink-0 transition shadow-md disabled:opacity-50">
                    <i class="fas fa-paper-plane text-sm"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<!-- ========== CHAT PANEL ANIMATION STYLES ========== -->
<style>
    #chatPanel {
        transform: translateY(2rem) scale(0.96);
        opacity: 0;
        transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.3s ease-out;
        transform-origin: bottom center;
    }
    @media (min-width: 640px) {
        #chatPanel { transform-origin: bottom right; }
    }
    #chatPanel.chat-open {
        transform: translateY(0) scale(1);
        opacity: 1;
    }
    #chatBackdrop {
        opacity: 0;
        transition: opacity 0.3s ease-out;
    }
    #chatBackdrop.chat-open { opacity: 1; }
    body.chat-open-body { overflow: hidden; }
</style>

<!-- ========== CHATBOT SCRIPTS ========== -->
<script>
    // 1. Modal Toggle Logic (Wrapper, Scroll, Open/Close)
    (function () {
        var wrapper = document.getElementById('chatbotWrapper');
        var toggleBtn = document.getElementById('chatbotToggle');
        var modal = document.getElementById('chatModal');
        var backdrop = document.getElementById('chatBackdrop');
        var panel = document.getElementById('chatPanel');
        var closeBtn = document.getElementById('chatClose');
        var messageInput = document.getElementById('message-input');

        // Scroll positioning
        var isScrolled = false;
        window.addEventListener('scroll', function () {
            var shouldMoveUp = window.scrollY > 300;
            if (shouldMoveUp !== isScrolled) {
                isScrolled = shouldMoveUp;
                wrapper.style.bottom = isScrolled ? '6rem' : '1.5rem';
            }
        }, { passive: true });

        function openChat() {
            modal.classList.remove('hidden');
            void modal.offsetWidth;
            backdrop.classList.add('chat-open');
            panel.classList.add('chat-open');
            document.body.classList.add('chat-open-body');
            setTimeout(function () { if (messageInput) messageInput.focus(); }, 350);
        }

        function closeChat() {
            backdrop.classList.remove('chat-open');
            panel.classList.remove('chat-open');
            document.body.classList.remove('chat-open-body');
            setTimeout(function () { modal.classList.add('hidden'); }, 350);
        }

        toggleBtn.addEventListener('click', openChat);
        closeBtn.addEventListener('click', closeChat);
        backdrop.addEventListener('click', closeChat);

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) closeChat();
        });
    })();

    // 2. Your Chat API Logic (Modified slightly for styling)
    document.addEventListener('DOMContentLoaded', function() {
        const CHAT_URL = @json(route('chatbot.message'));
        const MAX_HISTORY = 20;

        const form = document.getElementById('chat-form');
        const input = document.getElementById('message-input');
        const messagesEl = document.getElementById('messages');
        const sendButton = document.getElementById('send-button');
        const newChatButton = document.getElementById('new-chat');
        const statusEl = document.getElementById('status');

        let chatHistory = [];

        function addMessage(text, sender) {
            const bubble = document.createElement('div');
            
            if (sender === 'user') {
                bubble.className = 'ml-auto bg-blue-600 text-white rounded-xl rounded-tr-none p-3 max-w-[85%] whitespace-pre-wrap break-words text-sm shadow-sm';
            } else {
                bubble.className = 'mr-auto bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 border border-gray-100 dark:border-gray-700 rounded-xl rounded-tl-none p-3 max-w-[85%] whitespace-pre-wrap break-words text-sm shadow-sm';
            }

            bubble.textContent = text;
            messagesEl.appendChild(bubble);
            messagesEl.scrollTop = messagesEl.scrollHeight;
        }

        // Initial message
        addMessage('Hello! 👋 Welcome to Nurse Next Door.\nHow may I assist you today?', 'bot');

        form.addEventListener('submit', async (event) => {
            event.preventDefault();

            const message = input.value.trim();
            if (!message || sendButton.disabled) return;

            addMessage(message, 'user');
            input.value = '';
            sendButton.disabled = true;
            statusEl.textContent = 'Thinking...';
            statusEl.classList.add('animate-pulse');

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
                        history: chatHistory.slice(-MAX_HISTORY),
                    }),
                });

                const data = await response.json().catch(() => ({}));

                if (!response.ok) {
                    throw new Error(data.error || data.message || 'Request failed. Please try again.');
                }

                addMessage(data.answer, 'bot');
                chatHistory.push({ role: 'user', content: message });
                chatHistory.push({ role: 'assistant', content: data.answer });
                
                statusEl.textContent = 'Online · Ready to help';
                statusEl.classList.remove('animate-pulse');
            } catch (error) {
                statusEl.textContent = 'Error occurred';
                statusEl.classList.remove('animate-pulse');
                addMessage('⚠️ ' + error.message, 'bot');
            } finally {
                sendButton.disabled = false;
                input.focus();
            }
        });

        newChatButton.addEventListener('click', () => {
            chatHistory = [];
            messagesEl.innerHTML = '';
            addMessage('Hello! 👋 Welcome to Nurse Next Door.\nHow may I assist you today?', 'bot');
            statusEl.textContent = 'Online · Ready to help';
            input.focus();
        });
    });
</script>