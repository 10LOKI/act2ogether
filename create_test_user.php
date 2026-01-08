<?php
// Create test user
$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'act2gether';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create test user
    $testUser = [
        'first_name' => 'Marie',
        'last_name' => 'Dupont',
        'email' => 'marie@test.com',
        'password' => password_hash('123456', PASSWORD_DEFAULT),
        'university' => 'Université de Paris',
        'points' => 2450,
        'volunteer_hours' => 45.5
    ];
    
    $sql = "INSERT INTO users (first_name, last_name, email, password, university, points, volunteer_hours) 
            VALUES (:first_name, :last_name, :email, :password, :university, :points, :volunteer_hours)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute($testUser);
    
    echo "Test user created successfully!\n";
    echo "Email: marie@test.com\n";
    echo "Password: 123456\n";
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}