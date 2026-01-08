<?php
require_once __DIR__ . '/act2ogether/app/Core/Database.php';

use App\Core\Database;

try {
    $db = Database::getInstance();
    
    // Update events with relevant images
    $db->query("UPDATE events SET image = 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&h=600&fit=crop' WHERE title LIKE '%Nettoyage%Plage%'");
    
    $db->query("UPDATE events SET image = 'https://images.unsplash.com/photo-1593113598332-cd288d649433?w=800&h=600&fit=crop' WHERE title LIKE '%Distribution%Repas%'");
    
    $db->query("UPDATE events SET image = 'https://images.unsplash.com/photo-1497486751825-1233686d5d80?w=800&h=600&fit=crop' WHERE title LIKE '%Alphabétisation%'");
    
    // Add images to other events if they exist
    $db->query("UPDATE events SET image = 'https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=800&h=600&fit=crop' WHERE title LIKE '%Nettoyage%' AND image IS NULL");
    
    $db->query("UPDATE events SET image = 'https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?w=800&h=600&fit=crop' WHERE title LIKE '%Soutien%scolaire%'");
    
    $db->query("UPDATE events SET image = 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=800&h=600&fit=crop' WHERE title LIKE '%Distribution%' AND image IS NULL");
    
    echo "Images added to events successfully!\n";
    
    // Show updated events
    $events = $db->fetchAll("SELECT title, image FROM events WHERE image IS NOT NULL");
    foreach ($events as $event) {
        echo "- " . $event['title'] . " | " . $event['image'] . "\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>