<?php
require_once __DIR__ . '/act2ogether/app/Core/Database.php';

use App\Core\Database;

try {
    $db = Database::getInstance();
    
    // Get all users
    $users = $db->fetchAll('SELECT * FROM users');
    $events = $db->fetchAll('SELECT * FROM events LIMIT 3');
    
    foreach ($users as $user) {
        $userId = $user['id'];
        echo "Updating user: {$user['first_name']} {$user['last_name']} (ID: $userId)\n";
        
        // Clear existing registrations
        $db->query('DELETE FROM registrations WHERE user_id = ?', [$userId]);
        
        $totalPoints = 0;
        foreach ($events as $index => $event) {
            $status = $index < 2 ? 'attended' : 'registered';
            $pointsEarned = $status === 'attended' ? $event['points_reward'] : 0;
            $totalPoints += $pointsEarned;
            
            $db->insert('registrations', [
                'user_id' => $userId,
                'event_id' => $event['id'],
                'status' => $status,
                'points_earned' => $pointsEarned
            ]);
        }
        
        // Update user points and level
        $level = max(1, floor($totalPoints / 100) + 1);
        $db->query('UPDATE users SET points = ?, level = ? WHERE id = ?', [$totalPoints, $level, $userId]);
        
        echo "  - Points: $totalPoints, Level: $level\n";
    }
    
    echo "\nAll users updated with sample data!\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>