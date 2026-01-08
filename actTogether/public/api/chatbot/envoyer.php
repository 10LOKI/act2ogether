<?php
require_once '../../../includes/session.php';
require_once '../../../includes/security.php';
require_once '../../../vendor/autoload.php';

use App\Controllers\ChatbotController;

header('Content-Type: application/json');

$controller = new ChatbotController();
$controller->envoyerMessage();