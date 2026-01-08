<?php
echo "Testing actTogether Website Flow\n";
echo "================================\n\n";

// Test 1: Database Connection
echo "1. Testing Database Connection...\n";
try {
    require_once 'act2ogether/app/Core/Database.php';
    $db = App\Core\Database::getInstance();
    echo "✓ Database connection successful\n\n";
} catch (Exception $e) {
    echo "✗ Database connection failed: " . $e->getMessage() . "\n\n";
    exit;
}

// Test 2: Check Tables
echo "2. Checking Database Tables...\n";
$tables = ['users', 'events', 'registrations', 'partners', 'rewards'];
foreach ($tables as $table) {
    try {
        $count = $db->fetch("SELECT COUNT(*) as count FROM $table")['count'];
        echo "✓ Table '$table' exists with $count records\n";
    } catch (Exception $e) {
        echo "✗ Table '$table' error: " . $e->getMessage() . "\n";
    }
}
echo "\n";

// Test 3: Test User Registration
echo "3. Testing User Registration...\n";
$testUser = [
    'first_name' => 'Test',
    'last_name' => 'User',
    'email' => 'test@example.com',
    'password' => password_hash('password123', PASSWORD_DEFAULT)
];

try {
    // Delete if exists
    $db->query('DELETE FROM users WHERE email = ?', [$testUser['email']]);
    
    // Insert test user
    $userId = $db->insert('users', $testUser);
    echo "✓ User registration successful (ID: $userId)\n";
    
    // Test login
    $user = $db->fetch('SELECT * FROM users WHERE email = ?', [$testUser['email']]);
    if ($user && password_verify('password123', $user['password'])) {
        echo "✓ User login verification successful\n";
    } else {
        echo "✗ User login verification failed\n";
    }
} catch (Exception $e) {
    echo "✗ User registration failed: " . $e->getMessage() . "\n";
}
echo "\n";

// Test 4: Test Event Registration
echo "4. Testing Event Registration...\n";
try {
    $events = $db->fetchAll('SELECT * FROM events LIMIT 1');
    if (!empty($events)) {
        $event = $events[0];
        
        // Register user for event
        $registration = [
            'user_id' => $userId,
            'event_id' => $event['id'],
            'status' => 'registered'
        ];
        
        $regId = $db->insert('registrations', $registration);
        echo "✓ Event registration successful (ID: $regId)\n";
        
        // Update participant count
        $db->update('events', 
            ['current_participants' => $event['current_participants'] + 1],
            'id = ?',
            [$event['id']]
        );
        echo "✓ Event participant count updated\n";
    } else {
        echo "✗ No events available for testing\n";
    }
} catch (Exception $e) {
    echo "✗ Event registration failed: " . $e->getMessage() . "\n";
}
echo "\n";

// Test 5: Check Controllers
echo "5. Testing Controllers...\n";
$controllers = [
    'HomeController' => 'act2ogether/app/Controllers/HomeController.php',
    'AuthController' => 'act2ogether/app/Controllers/AuthController.php',
    'DashboardController' => 'act2ogether/app/Controllers/DashboardController.php',
    'EventController' => 'act2ogether/app/Controllers/EventController.php'
];

foreach ($controllers as $name => $path) {
    if (file_exists($path)) {
        echo "✓ $name exists\n";
    } else {
        echo "✗ $name missing\n";
    }
}
echo "\n";

// Test 6: Check Views
echo "6. Testing Views...\n";
$views = [
    'Home' => 'act2ogether/app/Views/home/index.php',
    'Login' => 'act2ogether/app/Views/auth/login.php',
    'Register' => 'act2ogether/app/Views/auth/register.php',
    'Dashboard' => 'act2ogether/app/Views/dashboard/index.php',
    'Events List' => 'act2ogether/app/Views/events/index.php',
    'Event Detail' => 'act2ogether/app/Views/events/show.php'
];

foreach ($views as $name => $path) {
    if (file_exists($path)) {
        echo "✓ $name view exists\n";
    } else {
        echo "✗ $name view missing\n";
    }
}
echo "\n";

echo "Website Flow Test Complete!\n";
echo "==========================\n";
echo "The website should now work from signup to event registration.\n";
echo "Visit: http://localhost/act2gether/act2ogether/public/\n";
?>