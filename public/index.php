<?php
// Simple front controller
require_once __DIR__ . '/../app/Core/Controller.php';
require_once __DIR__ . '/../app/Core/Router.php';

// Very light router dispatch (stub)
$router = new \App\Core\Router();
$router->dispatch();
