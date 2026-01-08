<?php

namespace App\Models;

use App\Config\Database;
use PDO;

class Inscription
{
    private $db;
    
    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }
    
    public function inscrire($etudiantId, $evenementId)
    {
        if ($this->dejaInscrit($etudiantId, $evenementId)) {
            return false;
        }
        
        $stmt = $this->db->prepare("SELECT participants_actuels, participants_max FROM evenements WHERE id = ?");
        $stmt->execute([$evenementId]);
        $event = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($event['participants_actuels'] >= $event['participants_max']) {
            return false;
        }
        
        $stmt = $this->db->prepare("INSERT INTO inscriptions (etudiant_id, evenement_id) VALUES (?, ?)");
        $result = $stmt->execute([$etudiantId, $evenementId]);
        
        if ($result) {
            $stmt = $this->db->prepare("UPDATE evenements SET participants_actuels = participants_actuels + 1 WHERE id = ?");
            $stmt->execute([$evenementId]);
            
            $this->completer($this->db->lastInsertId());
        }
        
        return $result;
    }
    
    public function completer($inscriptionId)
    {
        $stmt = $this->db->prepare("
            SELECT i.*, e.points_recompense 
            FROM inscriptions i 
            JOIN evenements e ON i.evenement_id = e.id 
            WHERE i.id = ?
        ");
        $stmt->execute([$inscriptionId]);
        $inscription = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($inscription) {
            $stmt = $this->db->prepare("UPDATE inscriptions SET statut = 'complete', points_attribues = ? WHERE id = ?");
            $stmt->execute([$inscription['points_recompense'], $inscriptionId]);
            
            $stmt = $this->db->prepare("UPDATE etudiants SET total_points = total_points + ? WHERE id = ?");
            $stmt->execute([$inscription['points_recompense'], $inscription['etudiant_id']]);
        }
    }
    
    public function dejaInscrit($etudiantId, $evenementId)
    {
        $stmt = $this->db->prepare("SELECT id FROM inscriptions WHERE etudiant_id = ? AND evenement_id = ?");
        $stmt->execute([$etudiantId, $evenementId]);
        return $stmt->fetch() !== false;
    }
}