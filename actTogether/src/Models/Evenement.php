<?php

namespace App\Models;

use App\Config\Database;
use PDO;

class Evenement
{
    private $db;
    
    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }
    
    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM evenements ORDER BY date_evenement ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM evenements WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getDisponibles()
    {
        $stmt = $this->db->query("
            SELECT * FROM evenements 
            WHERE participants_actuels < participants_max 
            AND date_evenement >= CURDATE()
            ORDER BY date_evenement ASC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}