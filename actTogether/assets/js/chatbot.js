// Chatbot Widget pour actTogether
class ActTogetherChatbot {
    constructor() {
        this.sessionId = null;
        this.isOpen = false;
        this.init();
    }
    
    init() {
        this.creerWidget();
        this.attacherEvenements();
    }
    
    creerWidget() {
        const html = `
            <div id="chatbot-container">
                <button id="chatbot-toggle" class="chatbot-btn">💬</button>
                <div id="chatbot-window" class="chatbot-window hidden">
                    <div class="chatbot-header">
                        <h3>🤝 actTogether</h3>
                        <button id="chatbot-close">✕</button>
                    </div>
                    <div id="chatbot-messages" class="chatbot-messages"></div>
                    <div class="chatbot-input">
                        <input type="text" id="chatbot-input-field" placeholder="Tapez votre message...">
                        <button id="chatbot-send">➤</button>
                    </div>
                </div>
            </div>
        `;
        document.body.insertAdjacentHTML('beforeend', html);
    }
    
    attacherEvenements() {
        document.getElementById('chatbot-toggle').addEventListener('click', () => this.toggleChat());
        document.getElementById('chatbot-close').addEventListener('click', () => this.toggleChat());
        document.getElementById('chatbot-send').addEventListener('click', () => this.envoyerMessage());
        document.getElementById('chatbot-input-field').addEventListener('keypress', (e) => {
            if (e.key === 'Enter') this.envoyerMessage();
        });
    }
    
    async toggleChat() {
        const window = document.getElementById('chatbot-window');
        this.isOpen = !this.isOpen;
        window.classList.toggle('hidden');
        
        if (this.isOpen && !this.sessionId) {
            await this.demarrerConversation();
        }
    }
    
    async demarrerConversation() {
        try {
            const response = await fetch('/actTogether/public/api/chatbot/demarrer.php', {
                method: 'POST'
            });
            
            if (!response.ok) {
                throw new Error('Erreur réseau');
            }
            
            const data = await response.json();
            
            if (data.error) {
                this.afficherMessage('bot', 'Erreur: ' + data.error);
                return;
            }
            
            this.sessionId = data.session_id;
            this.afficherMessage('bot', data.message, data.suggestions);
        } catch (error) {
            console.error('Erreur chatbot:', error);
            this.afficherMessage('bot', 'Désolé, une erreur s\'est produite. Veuillez réessayer.');
        }
    }
    
    async envoyerMessage() {
        const input = document.getElementById('chatbot-input-field');
        const message = input.value.trim();
        
        if (!message) return;
        
        this.afficherMessage('user', message);
        input.value = '';
        
        this.afficherTyping();
        
        try {
            const formData = new FormData();
            formData.append('session_id', this.sessionId);
            formData.append('message', message);
            
            const response = await fetch('/actTogether/public/api/chatbot/envoyer.php', {
                method: 'POST',
                body: formData
            });
            
            if (!response.ok) {
                throw new Error('Erreur réseau');
            }
            
            const data = await response.json();
            
            this.retirerTyping();
            
            if (data.error) {
                this.afficherMessage('bot', 'Erreur: ' + data.error);
                return;
            }
            
            this.afficherMessage('bot', data.reponse, data.suggestions);
        } catch (error) {
            console.error('Erreur envoi message:', error);
            this.retirerTyping();
            this.afficherMessage('bot', 'Désolé, impossible d\'envoyer le message.');
        }
    }
    
    afficherMessage(expediteur, contenu, suggestions = []) {
        const messagesDiv = document.getElementById('chatbot-messages');
        const messageDiv = document.createElement('div');
        messageDiv.className = `chatbot-message chatbot-message-${expediteur}`;
        messageDiv.textContent = contenu;
        messagesDiv.appendChild(messageDiv);
        
        if (suggestions && suggestions.length > 0) {
            const suggestionsDiv = document.createElement('div');
            suggestionsDiv.className = 'chatbot-suggestions';
            suggestions.forEach(suggestion => {
                const btn = document.createElement('button');
                btn.className = 'chatbot-suggestion-btn';
                btn.textContent = suggestion;
                btn.onclick = () => {
                    document.getElementById('chatbot-input-field').value = suggestion;
                    this.envoyerMessage();
                };
                suggestionsDiv.appendChild(btn);
            });
            messagesDiv.appendChild(suggestionsDiv);
        }
        
        messagesDiv.scrollTop = messagesDiv.scrollHeight;
    }
    
    afficherTyping() {
        const messagesDiv = document.getElementById('chatbot-messages');
        const typing = document.createElement('div');
        typing.id = 'typing-indicator';
        typing.className = 'chatbot-typing';
        typing.textContent = '...';
        messagesDiv.appendChild(typing);
    }
    
    retirerTyping() {
        const typing = document.getElementById('typing-indicator');
        if (typing) typing.remove();
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new ActTogetherChatbot();
});