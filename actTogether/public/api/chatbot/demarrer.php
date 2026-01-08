<?php
session_start();
require_once '../../../config/database.php';
require_once '../../../vendor/autoload.php';

use App\Controllers\ChatbotController;

$controller = new ChatbotController();
$controller->demarrer();