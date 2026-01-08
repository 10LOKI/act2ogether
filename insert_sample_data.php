<?php
require_once __DIR__ . '/act2ogether/app/Core/Database.php';

use App\Core\Database;

try {
    $db = Database::getInstance();
    
    // Insert sample events
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
    
    // Insert sample partners
    $partners = [
        ['name' => 'Association Verte Maroc', 'description' => 'Organisation environnementale', 'contact_email' => 'contact@vertemaroc.org', 'status' => 'active'],
        ['name' => 'Solidarité Casablanca', 'description' => 'Association d\'aide aux personnes démunies', 'contact_email' => 'info@solidaritecasa.ma', 'status' => 'active'],
        ['name' => 'Éducation Pour Tous', 'description' => 'ONG focalisée sur l\'éducation', 'contact_email' => 'contact@educationpourtous.ma', 'status' => 'active']
    ];
    
    foreach ($partners as $partner) {
        $db->insert('partners', $partner);
    }
    
    // Insert sample rewards
    $rewards = [
        ['name' => 'Bon d\'achat Carrefour 50 DH', 'description' => 'Bon d\'achat valable dans tous les magasins Carrefour', 'points_cost' => 500, 'partner_id' => 1, 'category' => 'shopping', 'status' => 'active'],
        ['name' => 'Entrée gratuite Cinéma', 'description' => 'Ticket gratuit pour une séance de cinéma', 'points_cost' => 300, 'partner_id' => 2, 'category' => 'entertainment', 'status' => 'active'],
        ['name' => 'Kit écologique', 'description' => 'Kit contenant des produits écologiques', 'points_cost' => 400, 'partner_id' => 1, 'category' => 'environment', 'status' => 'active']
    ];
    
    foreach ($rewards as $reward) {
        $db->insert('rewards', $reward);
    }
    
    echo "Sample data inserted successfully!\n";
    echo "3 events, 3 partners, and 3 rewards have been added to the database.\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>