<?php
// Test chatbot database
require_once 'vendor/autoload.php';

use App\Config\Database;

try {
    $db = Database::getInstance()->getConnection();
    
    echo "<h2>Test Chatbot Database</h2>";
    
    // Check conversations table
    $stmt = $db->query("SHOW TABLES LIKE 'conversations'");
    if ($stmt->rowCount() > 0) {
        echo "✓ Table 'conversations' existe<br>";
    } else {
        echo "✗ Table 'conversations' n'existe pas<br>";
    }
    
    // Check messages table
    $stmt = $db->query("SHOW TABLES LIKE 'messages'");
    if ($stmt->rowCount() > 0) {
        echo "✓ Table 'messages' existe<br>";
    } else {
        echo "✗ Table 'messages' n'existe pas<br>";
    }
    
    // Check reponses_automatiques table
    $stmt = $db->query("SHOW TABLES LIKE 'reponses_automatiques'");
    if ($stmt->rowCount() > 0) {
        echo "✓ Table 'reponses_automatiques' existe<br>";
        
        // Count responses
        $stmt = $db->query("SELECT COUNT(*) as count FROM reponses_automatiques");
        $count = $stmt->fetch()['count'];
        echo "  → $count réponses automatiques trouvées<br>";
        
        // Show first response
        $stmt = $db->query("SELECT * FROM reponses_automatiques LIMIT 1");
        $response = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($response) {
            echo "  → Exemple: " . substr($response['reponse'], 0, 50) . "...<br>";
        }
    } else {
        echo "✗ Table 'reponses_automatiques' n'existe pas<br>";
    }
    
    echo "<br><strong>Si des tables manquent, exécutez: <a href='install.php'>install.php</a></strong>";
    
} catch (Exception $e) {
    echo "<h2 style='color: red;'>Erreur: " . $e->getMessage() . "</h2>";
}
