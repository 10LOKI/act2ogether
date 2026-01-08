<?php
require_once __DIR__ . '/act2ogether/app/Core/Database.php';

use App\Core\Database;

try {
    $db = Database::getInstance();
    
    // Update events to have future dates
    $db->query("UPDATE events SET event_date = '2025-01-15 09:00:00' WHERE title = 'Nettoyage de Plage Rabat'");
    $db->query("UPDATE events SET event_date = '2025-01-20 18:00:00' WHERE title = 'Distribution de Repas aux Sans-Abri'");
    $db->query("UPDATE events SET event_date = '2025-01-25 14:00:00' WHERE title = 'Atelier d\'Alphabétisation pour Enfants'");
    
    echo "Event dates updated to future dates!\n";
    
    // Check current events
    $events = $db->fetchAll("SELECT title, event_date, status FROM events");
    foreach ($events as $event) {
        echo "- " . $event['title'] . " | " . $event['event_date'] . " | " . $event['status'] . "\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>