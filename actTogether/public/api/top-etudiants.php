<?php
require_once '../../config/database.php';
require_once '../../vendor/autoload.php';

use App\Config\Database;
use App\Models\Etudiant;

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

try {
    $etudiantModel = new Etudiant();
    $topEtudiants = $etudiantModel->getTopEtudiants(10);
    echo json_encode($topEtudiants);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}