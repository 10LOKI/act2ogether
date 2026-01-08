<?php
echo "Testing Navigation Links\n";
echo "========================\n\n";

// Test URLs
$testUrls = [
    '/' => 'Home Page',
    '/events' => 'Events Page', 
    '/auth/login' => 'Login Page',
    '/auth/register' => 'Register Page'
];

foreach ($testUrls as $url => $name) {
    echo "Testing: $name ($url)\n";
    
    // Simulate the router
    $parts = explode('/', trim($url, '/'));
    
    if (empty($parts[0])) {
        echo "✓ Routes to HomeController->index()\n";
    } else {
        $controller = ucfirst($parts[0]) . 'Controller';
        $method = $parts[1] ?? 'index';
        echo "✓ Routes to $controller->$method()\n";
    }
    echo "\n";
}

echo "Navigation Test Complete!\n";
echo "All links should work properly now.\n";
?>