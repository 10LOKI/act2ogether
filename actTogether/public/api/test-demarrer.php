<?php
// Test API demarrer
require_once '../../includes/session.php';
require_once '../../includes/security.php';
require_once '../../vendor/autoload.php';

use App\Controllers\ChatbotController;

header('Content-Type: application/json');

try {
    $controller = new ChatbotController();
    $controller->demarrer();
} catch (Exception $e) {
    echo json_encode([
        'error' => true,
        'message' => $e->getMessage(),
        'trace' => $e->getTraceAsString()
    ]);
}
