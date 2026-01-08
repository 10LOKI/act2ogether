<?php
require_once __DIR__ . '/act2ogether/app/Core/Database.php';

use App\Core\Database;

try {
    $db = Database::getInstance();
    
    // Get the first user
    $user = $db->fetch('SELECT * FROM users ORDER BY id ASC LIMIT 1');
    if (!$user) {
        echo "No user found!\n";
        exit;
    }
    
    $userId = $user['id'];
    echo "Updating data for user: " . $user['first_name'] . " " . $user['last_name'] . "\n";
    
    // Get some events
    $events = $db->fetchAll('SELECT * FROM events LIMIT 3');
    
    // Add sample registrations
    foreach ($events as $index => $event) {
        $status = $index < 2 ? 'attended' : 'registered'; // First 2 are completed
        $pointsEarned = $status === 'attended' ? $event['points_reward'] : 0;
        
        // Check if registration already exists
        $existing = $db->fetch('SELECT * FROM registrations WHERE user_id = ? AND event_id = ?', [$userId, $event['id']]);
        
        if (!$existing) {
            $db->insert('registrations', [
                'user_id' => $userId,
                'event_id' => $event['id'],
                'status' => $status,
                'points_earned' => $pointsEarned
            ]);
            echo "Added registration for: " . $event['title'] . " (Status: $status)\n";
        }
    }
    
    // Calculate total points earned
    $totalPoints = $db->fetch('SELECT SUM(points_earned) as total FROM registrations WHERE user_id = ?', [$userId])['total'] ?? 0;
    
    // Update user points and level
    $level = floor($totalPoints / 500) + 1; // 500 points per level
    
    $db->query('UPDATE users SET points = ?, level = ? WHERE id = ?', [$totalPoints, $level, $userId]);
    
    echo "Updated user points: $totalPoints\n";
    echo "Updated user level: $level\n";
    echo "Dashboard stats should now show real data!\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>