<?php
namespace App\Core;

class Auth
{
    public static function check()
    {
        // Simple auth check stub
        return isset($_SESSION['user_id']);
    }
}
