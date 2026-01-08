<?php

namespace App\Models;

use App\Config\Database;
use PDO;

class Chatbot
{
    private $db;
    
    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }
    
    public function creerConversation($etudiantId = null, $sessionId, $nom = null, $email = null)
    {
        $stmt = $this->db->prepare("INSERT INTO conversations (etudiant_id, session_id, nom_visiteur, email_visiteur) VALUES (?, ?, ?, ?)");
        $stmt->execute([$etudiantId, $sessionId, $nom, $email]);
        return $this->db->lastInsertId();
    }
    
    public function getConversationParSession($sessionId)
    {
        $stmt = $this->db->prepare("SELECT * FROM conversations WHERE session_id = ?");
        $stmt->execute([$sessionId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function ajouterMessage($conversationId, $expediteur, $contenu, $type = 'texte')
    {
        $stmt = $this->db->prepare("INSERT INTO messages (conversation_id, expediteur, contenu, type_message) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$conversationId, $expediteur, $contenu, $type]);
    }
    
    public function getHistorique($conversationId, $limit = 50)
    {
        $stmt = $this->db->prepare("SELECT * FROM messages WHERE conversation_id = ? ORDER BY date_envoi ASC LIMIT ?");
        $stmt->bindValue(1, $conversationId, PDO::PARAM_INT);
        $stmt->bindValue(2, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function trouverReponse($messageUtilisateur)
    {
        $message = strtolower(trim($messageUtilisateur));
        
        $stmt = $this->db->query("SELECT * FROM reponses_automatiques WHERE actif = TRUE ORDER BY priorite DESC");
        $reponses = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($reponses as $reponse) {
            $motsCles = json_decode($reponse['mots_cles'], true);
            foreach ($motsCles as $motCle) {
                if (strpos($message, strtolower($motCle)) !== false) {
                    return [
                        'reponse' => $reponse['reponse'],
                        'suggestions' => json_decode($reponse['suggestions'], true),
                        'categorie' => $reponse['categorie']
                    ];
                }
            }
        }
        
        return [
            'reponse' => 'Je n\'ai pas bien compris. 🤔 Pouvez-vous reformuler ou choisir une option ci-dessous?',
            'suggestions' => ['Comment ça marche?', 'Voir événements', 'Parler à un humain'],
            'categorie' => 'defaut'
        ];
    }
    
    public function terminerConversation($conversationId)
    {
        $stmt = $this->db->prepare("UPDATE conversations SET statut = 'terminee', date_fin = NOW() WHERE id = ?");
        return $stmt->execute([$conversationId]);
    }
    
    public function transfererAdmin($conversationId)
    {
        $stmt = $this->db->prepare("UPDATE conversations SET statut = 'en_attente' WHERE id = ?");
        return $stmt->execute([$conversationId]);
    }
}