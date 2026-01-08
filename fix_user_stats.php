<?php
require_once __DIR__ . '/act2ogether/app/Core/Database.php';

use App\Core\Database;

try {
    $db = Database::getInstance();
    
    // Get all users to see who exists
    $users = $db->fetchAll('SELECT id, first_name, last_name, email, points, level FROM users');
    
    echo "All users in database:\n";
    foreach ($users as $user) {
        echo "ID: {$user['id']}, Name: {$user['first_name']} {$user['last_name']}, Email: {$user['email']}, Points: {$user['points']}, Level: {$user['level']}\n";
    }
    
    // Update the user with the highest ID (most recent)
    $latestUser = $db->fetch('SELECT * FROM users ORDER BY id DESC LIMIT 1');
    
    if ($latestUser) {
        $userId = $latestUser['id'];
        echo "\nUpdating user ID: $userId ({$latestUser['first_name']} {$latestUser['last_name']})\n";
        
        // Clear existing registrations for this user
        $db->query('DELETE FROM registrations WHERE user_id = ?', [$userId]);
        
        // Get events
        $events = $db->fetchAll('SELECT * FROM events LIMIT 3');
        
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
            
            echo "Added: {$event['title']} - Status: $status - Points: $pointsEarned\n";
        }
        
        // Update user with points and level
        $level = max(1, floor($totalPoints / 100) + 1);
        
        $db->query('UPDATE users SET points = ?, level = ? WHERE id = ?', [$totalPoints, $level, $userId]);
        
        echo "\nFinal stats:\n";
        echo "Total Points: $totalPoints\n";
        echo "Level: $level\n";
        echo "Total Events: " . count($events) . "\n";
        echo "Completed Events: 2\n";
        
    } else {
        echo "No users found!\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>