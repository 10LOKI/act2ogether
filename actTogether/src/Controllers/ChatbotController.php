<?php

namespace App\Controllers;

use App\Models\Chatbot;
use App\Core\View;
use Exception;

class ChatbotController
{
    private $chatbotModel;
    
    public function __construct()
    {
        $this->chatbotModel = new Chatbot();
    }
    
    public function demarrer()
    {
        try {
            header('Content-Type: application/json');
            
            $sessionId = uniqid('chat_', true);
            $etudiantId = $_SESSION['etudiant_id'] ?? null;
            
            $conversationId = $this->chatbotModel->creerConversation($etudiantId, $sessionId);
            
            $messageBienvenue = 'السلام عليكم! 👋 Bienvenue sur actTogether. Comment puis-je vous aider?';
            $this->chatbotModel->ajouterMessage($conversationId, 'bot', $messageBienvenue);
            
            echo json_encode([
                'conversation_id' => $conversationId,
                'session_id' => $sessionId,
                'message' => $messageBienvenue,
                'suggestions' => ['Comment ça marche?', 'Voir événements', 'S\'inscrire']
            ]);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
    
    public function envoyerMessage()
    {
        try {
            header('Content-Type: application/json');
            
            $sessionId = $_POST['session_id'] ?? '';
            $message = $_POST['message'] ?? '';
            
            if (empty($sessionId)) {
                echo json_encode(['error' => 'Session ID manquant']);
                return;
            }
            
            if (empty($message)) {
                echo json_encode(['error' => 'Message vide']);
                return;
            }
            
            $conversation = $this->chatbotModel->getConversationParSession($sessionId);
            
            if (!$conversation) {
                echo json_encode(['error' => 'Conversation introuvable']);
                return;
            }
            
            $this->chatbotModel->ajouterMessage($conversation['id'], 'visiteur', $message);
            
            $reponse = $this->chatbotModel->trouverReponse($message);
            
            $this->chatbotModel->ajouterMessage($conversation['id'], 'bot', $reponse['reponse']);
            
            echo json_encode($reponse);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}