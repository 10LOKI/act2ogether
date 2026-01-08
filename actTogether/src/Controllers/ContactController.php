<?php

namespace App\Controllers;

use App\Core\View;
use App\Config\Database;

class ContactController
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!validateCSRFToken($_POST['csrf_token'] ?? '')) {
                die('Requête invalide');
            }
            
            $nom = cleanInput($_POST['nom']);
            $email = cleanInput($_POST['email']);
            $sujet = cleanInput($_POST['sujet']);
            $message = cleanInput($_POST['message']);
            
            if (empty($nom) || empty($email) || empty($sujet) || empty($message)) {
                $_SESSION['error'] = 'Tous les champs sont requis';
            } elseif (!validateEmail($email)) {
                $_SESSION['error'] = 'Email invalide';
            } else {
                try {
                    $db = Database::getInstance()->getConnection();
                    $stmt = $db->prepare("INSERT INTO messages_contact (nom, email, sujet, message) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$nom, $email, $sujet, $message]);
                    
                    $_SESSION['success'] = 'Message envoyé avec succès ! Nous vous répondrons bientôt.';
                    View::redirect('/actTogether/public/contact');
                } catch (\Exception $e) {
                    $_SESSION['error'] = 'Erreur lors de l\'envoi du message';
                }
            }
        }
        
        View::render('contact');
    }
}