<?php
session_start();

// Headers de sécurité
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");
header("Referrer-Policy: strict-origin-when-cross-origin");

// Charger tous les helpers AVANT autoload
require_once '../includes/session.php';
require_once '../includes/functions.php';
require_once '../includes/csrf.php';
require_once '../includes/security.php';
require_once '../includes/validation.php';

// Autoload Composer
require_once '../vendor/autoload.php';

use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\EtudiantController;
use App\Controllers\EvenementController;
use App\Controllers\ContactController;

$router = new Router();

$router->get('/', [HomeController::class, 'index']);
$router->get('/register', [EtudiantController::class, 'register']);
$router->post('/register', [EtudiantController::class, 'register']);
$router->get('/login', [EtudiantController::class, 'login']);
$router->post('/login', [EtudiantController::class, 'login']);
$router->get('/dashboard', [EtudiantController::class, 'dashboard']);
$router->get('/logout', [EtudiantController::class, 'logout']);
$router->get('/evenements', [EvenementController::class, 'liste']);
$router->get('/evenement/{id}', [EvenementController::class, 'details']);
$router->post('/evenement/inscrire', [EvenementController::class, 'inscrire']);
$router->get('/contact', [ContactController::class, 'index']);
$router->post('/contact', [ContactController::class, 'index']);

$router->run();