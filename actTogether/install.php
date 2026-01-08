<?php
// Script d'installation de la base de données

$host = 'localhost';
$username = 'root';
$password = '';

try {
    // Connexion sans database
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "✓ Connexion MySQL réussie<br>";
    
    // Créer database
    $pdo->exec("CREATE DATABASE IF NOT EXISTS acttogether");
    echo "✓ Database 'acttogether' créée<br>";
    
    // Utiliser database
    $pdo->exec("USE acttogether");
    
    // Lire et exécuter schema.sql
    $schema = file_get_contents(__DIR__ . '/sql/schema.sql');
    $statements = explode(';', $schema);
    
    foreach ($statements as $statement) {
        $statement = trim($statement);
        if (!empty($statement)) {
            $pdo->exec($statement);
        }
    }
    echo "✓ Tables créées<br>";
    
    // Lire et exécuter seed.sql
    $seed = file_get_contents(__DIR__ . '/sql/seed.sql');
    $statements = explode(';', $seed);
    
    foreach ($statements as $statement) {
        $statement = trim($statement);
        if (!empty($statement) && !stripos($statement, 'USE acttogether')) {
            $pdo->exec($statement);
        }
    }
    echo "✓ Données de test insérées<br>";
    
    // Ajouter étudiants test
    $pdo->exec("INSERT IGNORE INTO etudiants (nom, email, mot_de_passe, total_points) VALUES
        ('Youssef El Amrani', 'youssef@test.ma', '" . password_hash('test123', PASSWORD_DEFAULT) . "', 250),
        ('Salma Bennani', 'salma@test.ma', '" . password_hash('test123', PASSWORD_DEFAULT) . "', 180),
        ('Omar Alaoui', 'omar@test.ma', '" . password_hash('test123', PASSWORD_DEFAULT) . "', 150)");
    echo "✓ Étudiants test ajoutés<br>";
    
    // Créer table messages_contact
    $pdo->exec("CREATE TABLE IF NOT EXISTS messages_contact (
        id INT PRIMARY KEY AUTO_INCREMENT,
        nom VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        sujet VARCHAR(100) NOT NULL,
        message TEXT NOT NULL,
        date_envoi TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    echo "✓ Table messages_contact créée<br><br>";
    
    echo "<h2 style='color: green;'>✓ Installation terminée avec succès!</h2>";
    echo "<p><a href='public/index.php'>Accéder au site</a></p>";
    
} catch (PDOException $e) {
    echo "<h2 style='color: red;'>✗ Erreur: " . $e->getMessage() . "</h2>";
}
?>