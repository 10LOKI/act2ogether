<?php

namespace App\Models;

use App\Config\Database;
use PDO;

class Etudiant
{
    private $db;
    
    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }
    
    public function register($nom, $email, $motDePasse)
    {
        $hashedPassword = password_hash($motDePasse, PASSWORD_DEFAULT);
        
        $stmt = $this->db->prepare("INSERT INTO etudiants (nom, email, mot_de_passe) VALUES (?, ?, ?)");
        $stmt->execute([$nom, $email, $hashedPassword]);
        
        return $this->db->lastInsertId();
    }
    
    public function login($email, $motDePasse)
    {
        $stmt = $this->db->prepare("SELECT * FROM etudiants WHERE email = ?");
        $stmt->execute([$email]);
        $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($etudiant && password_verify($motDePasse, $etudiant['mot_de_passe'])) {
            return $etudiant;
        }
        return false;
    }
    
    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM etudiants WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function ajouterPoints($id, $points)
    {
        $stmt = $this->db->prepare("UPDATE etudiants SET total_points = total_points + ? WHERE id = ?");
        return $stmt->execute([$points, $id]);
    }
    
    public function getMesInscriptions($etudiantId)
    {
        $stmt = $this->db->prepare("
            SELECT i.*, e.titre, e.date_evenement, e.lieu, e.points_recompense 
            FROM inscriptions i 
            JOIN evenements e ON i.evenement_id = e.id 
            WHERE i.etudiant_id = ? 
            ORDER BY i.date_inscription DESC
        ");
        $stmt->execute([$etudiantId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getRank($etudiantId)
    {
        $stmt = $this->db->prepare("
            SELECT COUNT(*) + 1 as `rank`
            FROM etudiants
            WHERE total_points > (SELECT total_points FROM etudiants WHERE id = ?)
        ");
        $stmt->execute([$etudiantId]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['rank'];
    }
    
    public function getTopEtudiants($limit = 10)
    {
        $stmt = $this->db->prepare("
            SELECT id, nom, total_points
            FROM etudiants
            WHERE total_points > 0
            ORDER BY total_points DESC
            LIMIT :limit
        ");
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}