<?php

namespace App\Core;

class View
{
    public static function render($view, $data = [])
    {
        extract($data);
        
        ob_start();
        require __DIR__ . "/../Views/{$view}.php";
        $content = ob_get_clean();
        
        require __DIR__ . "/../Views/layout.php";
    }
    
    public static function redirect($url)
    {
        header("Location: {$url}");
        exit;
    }
}