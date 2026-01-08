<?php
require_once __DIR__ . '/act2ogether/app/Core/Database.php';

use App\Core\Database;

try {
    $db = Database::getInstance();
    
    // Insert sample events only
    $events = [
        [
            'title' => 'Nettoyage de Plage Rabat',
            'description' => 'Rejoignez-nous pour nettoyer la plage de Rabat et protéger notre environnement marin. Une journée enrichissante pour toute la famille.',
            'event_date' => '2024-12-30 09:00:00',
            'location' => 'Plage de Rabat, Maroc',
            'points_reward' => 250,
            'max_participants' => 50,
            'status' => 'published'
        ],
        [
            'title' => 'Distribution de Repas aux Sans-Abri',
            'description' => 'Aidez-nous à distribuer des repas chauds aux personnes dans le besoin dans le centre-ville de Casablanca.',
            'event_date' => '2024-12-28 18:00:00',
            'location' => 'Centre-ville Casablanca, Maroc',
            'points_reward' => 300,
            'max_participants' => 30,
            'status' => 'published'
        ],
        [
            'title' => 'Atelier d\'Alphabétisation pour Enfants',
            'description' => 'Enseignez la lecture et l\'écriture aux enfants défavorisés dans notre centre éducatif. Votre aide peut changer leur avenir.',
            'event_date' => '2025-01-05 14:00:00',
            'location' => 'Centre Éducatif Marrakech, Maroc',
            'points_reward' => 400,
            'max_participants' => 20,
            'status' => 'published'
        ]
    ];
    
    foreach ($events as $event) {
        $db->insert('events', $event);
    }
    
    echo "3 sample events inserted successfully!\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>