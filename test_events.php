<?php
// Test events controller directly
require_once __DIR__ . '/act2ogether/app/Core/Database.php';
require_once __DIR__ . '/act2ogether/app/Core/Controller.php';
require_once __DIR__ . '/act2ogether/app/Controllers/EventController.php';

use App\Controllers\EventController;

try {
    echo "Testing EventController...\n";
    
    $controller = new EventController();
    
    // Capture output
    ob_start();
    $controller->index();
    $output = ob_get_clean();
    
    echo "Controller output length: " . strlen($output) . " characters\n";
    echo "First 500 characters:\n";
    echo substr($output, 0, 500) . "\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>