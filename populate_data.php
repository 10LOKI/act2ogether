<?php
// Populate database with sample data
$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'acttogether';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Insert sample events
    $events = [
        ['Nettoyage de Plage', 'Rejoignez-nous pour nettoyer la plage et protéger notre environnement marin.', '2024-12-15', 'Plage de Nice', 20, 50],
        ['Aide aux Devoirs', 'Aidez des enfants avec leurs devoirs dans un centre communautaire.', '2024-12-18', 'Centre Communautaire', 15, 20],
        ['Distribution de Repas', 'Distribuez des repas chauds aux personnes dans le besoin.', '2024-12-22', 'Resto du Cœur', 25, 30]
    ];
    
    foreach ($events as $event) {
        $sql = "INSERT INTO evenements (titre, description, date_evenement, lieu, points_recompense, participants_max) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($event);
    }
    
    // Insert sample partners
    $partners = [
        ['EcoWorld', 'ecoworld-logo.jpg', 'Organisation environnementale'],
        ['Education Alliance', 'education-logo.jpg', 'Alliance pour l\'éducation'],
        ['Global Impact', 'global-logo.jpg', 'Fondation pour l\'impact social']
    ];
    
    foreach ($partners as $partner) {
        $sql = "INSERT INTO partenaires (nom_entreprise, logo, description) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($partner);
    }
    
    // Insert sample rewards
    $rewards = [
        ['Bon d\'achat 10€', 'Bon d\'achat de 10€ valable dans nos magasins partenaires', 100, 1],
        ['Livre numérique gratuit', 'Accès à notre bibliothèque numérique pendant 1 mois', 50, 2],
        ['T-shirt actTogether', 'T-shirt officiel de la plateforme actTogether', 150, 3]
    ];
    
    foreach ($rewards as $reward) {
        $sql = "INSERT INTO recompenses (nom, description, cout_en_points, partenaire_id) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($reward);
    }
    
    echo "Sample data inserted successfully!\n";
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}