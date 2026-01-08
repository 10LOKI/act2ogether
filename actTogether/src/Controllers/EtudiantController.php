<?php

namespace App\Controllers;

use App\Models\Etudiant;
use App\Core\View;

class EtudiantController
{
    private $etudiantModel;
    
    public function __construct()
    {
        $this->etudiantModel = new Etudiant();
    }
    
    public function register()
    {
        if (estConnecte()) {
            View::redirect('/actTogether/public/dashboard');
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!validateCSRFToken($_POST['csrf_token'] ?? '')) {
                die('Requête invalide');
            }
            
            $nom = cleanInput($_POST['nom']);
            $email = cleanInput($_POST['email']);
            $motDePasse = $_POST['mot_de_passe'];
            
            if (empty($nom) || empty($email) || empty($motDePasse)) {
                $_SESSION['error'] = 'Tous les champs sont requis';
            } elseif (!validateEmail($email)) {
                $_SESSION['error'] = 'Email invalide';
            } elseif (!validateNom($nom)) {
                $_SESSION['error'] = 'Nom invalide';
            } elseif (!validatePassword($motDePasse)) {
                $_SESSION['error'] = 'Mot de passe trop court (min 8 caractères)';
            } else {
                try {
                    $this->etudiantModel->register($nom, $email, $motDePasse);
                    $_SESSION['success'] = 'Inscription réussie !';
                    View::redirect('/actTogether/public/login');
                } catch (\Exception $e) {
                    $_SESSION['error'] = 'Email déjà utilisé';
                }
            }
        }
        
        View::render('etudiant/register');
    }
    
    public function login()
    {
        if (estConnecte()) {
            View::redirect('/actTogether/public/dashboard');
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!validateCSRFToken($_POST['csrf_token'] ?? '')) {
                die('Requête invalide');
            }
            
            $email = cleanInput($_POST['email']);
            $motDePasse = $_POST['mot_de_passe'];
            
            $etudiant = $this->etudiantModel->login($email, $motDePasse);
            
            if ($etudiant) {
                connexion($etudiant);
                View::redirect('/actTogether/public/dashboard');
            } else {
                $_SESSION['error'] = 'Email ou mot de passe incorrect';
            }
        }
        
        View::render('etudiant/login');
    }
    
    public function dashboard()
    {
        protegerPage();
        
        $etudiant = $this->etudiantModel->getById($_SESSION['etudiant_id']);
        $inscriptions = $this->etudiantModel->getMesInscriptions($_SESSION['etudiant_id']);
        
        // Calculer le rang
        $rank = $this->etudiantModel->getRank($_SESSION['etudiant_id']);
        
        View::render('etudiant/dashboard', compact('etudiant', 'inscriptions', 'rank'));
    }
    
    public function logout()
    {
        deconnexion();
        View::redirect('/actTogether/public/');
    }
}