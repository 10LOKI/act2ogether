<?php
// Test registration functionality
require_once 'act2ogether/app/Core/Database.php';

use App\Core\Database;

try {
    $db = Database::getInstance();
    echo "Database connection: OK\n";
    
    // Test data
    $testData = [
        'nom' => 'Test User',
        'email' => 'test@example.com',
        'mot_de_passe' => password_hash('password123', PASSWORD_DEFAULT)
    ];
    
    // Check if user exists
    $existing = $db->fetch('SELECT id FROM etudiants WHERE email = ?', [$testData['email']]);
    if ($existing) {
        echo "Test user already exists, deleting...\n";
        $db->delete('etudiants', 'email = ?', [$testData['email']]);
    }
    
    // Insert test user
    $userId = $db->insert('etudiants', $testData);
    echo "User created with ID: $userId\n";
    
    // Verify user was created
    $user = $db->fetch('SELECT * FROM etudiants WHERE id = ?', [$userId]);
    if ($user) {
        echo "User verification: OK\n";
        echo "Name: " . $user['nom'] . "\n";
        echo "Email: " . $user['email'] . "\n";
    } else {
        echo "User verification: FAILED\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>