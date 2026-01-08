<?php
require_once 'act2ogether/app/Core/Database.php';

use App\Core\Database;

try {
    $db = Database::getInstance();
    
    // Sample partners
    $partners = [
        ['name' => 'McDonald\'s Maroc', 'logo' => 'mcdonalds.png', 'description' => 'Chaîne de restauration rapide'],
        ['name' => 'Carrefour', 'logo' => 'carrefour.png', 'description' => 'Grande surface'],
        ['name' => 'Inwi', 'logo' => 'inwi.png', 'description' => 'Opérateur télécom'],
        ['name' => 'Attijariwafa Bank', 'logo' => 'attijariwafa.png', 'description' => 'Banque']
    ];
    
    foreach ($partners as $partner) {
        $db->insert('partners', $partner);
    }
    
    // Sample events
    $events = [
        [
            'title' => 'Nettoyage de la plage Ain Diab',
            'description' => 'Rejoignez-nous pour nettoyer la plage et protéger l\'environnement marin',
            'short_description' => 'Action environnementale à la plage Ain Diab',
            'event_date' => date('Y-m-d H:i:s', strtotime('+1 week')),
            'location' => 'Plage Ain Diab, Casablanca',
            'points_reward' => 50,
            'max_participants' => 30,
            'category' => 'environment'
        ],
        [
            'title' => 'Soutien scolaire pour enfants défavorisés',
            'description' => 'Aidez des enfants en difficulté scolaire dans leur apprentissage',
            'short_description' => 'Cours de soutien pour enfants',
            'event_date' => date('Y-m-d H:i:s', strtotime('+3 days')),
            'location' => 'Centre social Hay Mohammadi',
            'points_reward' => 75,
            'max_participants' => 15,
            'category' => 'education'
        ],
        [
            'title' => 'Distribution de repas aux sans-abri',
            'description' => 'Participez à la distribution de repas chauds aux personnes dans le besoin',
            'short_description' => 'Distribution de repas solidaires',
            'event_date' => date('Y-m-d H:i:s', strtotime('+5 days')),
            'location' => 'Centre-ville Casablanca',
            'points_reward' => 60,
            'max_participants' => 20,
            'category' => 'community'
        ]
    ];
    
    foreach ($events as $event) {
        $db->insert('events', $event);
    }
    
    // Sample rewards
    $rewards = [
        [
            'name' => 'Menu Big Mac',
            'description' => 'Un menu Big Mac gratuit chez McDonald\'s',
            'points_cost' => 100,
            'partner_id' => 1,
            'category' => 'food'
        ],
        [
            'name' => 'Bon d\'achat 50 DH',
            'description' => 'Bon d\'achat de 50 DH valable chez Carrefour',
            'points_cost' => 150,
            'partner_id' => 2,
            'category' => 'shopping'
        ],
        [
            'name' => 'Recharge 20 DH',
            'description' => 'Recharge téléphonique de 20 DH',
            'points_cost' => 80,
            'partner_id' => 3,
            'category' => 'telecom'
        ]
    ];
    
    foreach ($rewards as $reward) {
        $db->insert('rewards', $reward);
    }
    
    echo "Sample data inserted successfully!\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>