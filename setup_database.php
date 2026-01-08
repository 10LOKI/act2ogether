<?php
// Database setup script
$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'act2gether';

try {
    // Connect to MySQL server
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create database if it doesn't exist
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$database` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "Database '$database' created successfully or already exists.\n";
    
    // Use the database
    $pdo->exec("USE `$database`");
    
    // Read and execute the schema
    $schema = file_get_contents(__DIR__ . '/database_schema.sql');
    $statements = explode(';', $schema);
    
    foreach ($statements as $statement) {
        $statement = trim($statement);
        if (!empty($statement)) {
            $pdo->exec($statement);
        }
    }
    
    echo "Database schema created successfully!\n";
    echo "You can now access your application.\n";
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}