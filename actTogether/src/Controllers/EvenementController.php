<?php

namespace App\Controllers;

use App\Models\Evenement;
use App\Models\Inscription;
use App\Core\View;

class EvenementController
{
    private $evenementModel;
    private $inscriptionModel;
    
    public function __construct()
    {
        $this->evenementModel = new Evenement();
        $this->inscriptionModel = new Inscription();
    }
    
    public function liste()
    {
        $evenements = $this->evenementModel->getDisponibles();
        View::render('evenement/liste', compact('evenements'));
    }
    
    public function details($id)
    {
        $evenement = $this->evenementModel->getById($id);
        
        if (!$evenement) {
            $_SESSION['error'] = 'Événement introuvable';
            View::redirect('/actTogether/public/evenements');
        }
        
        $dejaInscrit = false;
        if (estConnecte()) {
            $dejaInscrit = $this->inscriptionModel->dejaInscrit($_SESSION['etudiant_id'], $id);
        }
        
        View::render('evenement/details', compact('evenement', 'dejaInscrit'));
    }
    
    public function inscrire()
    {
        protegerPage();
        
        if (!validateCSRFToken($_POST['csrf_token'] ?? '')) {
            die('Requête invalide');
        }
        
        $evenementId = (int)$_POST['evenement_id'];
        $etudiantId = $_SESSION['etudiant_id'];
        
        if ($this->inscriptionModel->inscrire($etudiantId, $evenementId)) {
            $_SESSION['success'] = 'Inscription réussie ! Points ajoutés';
        } else {
            $_SESSION['error'] = 'Erreur lors de l\'inscription';
        }
        
        View::redirect('/actTogether/public/evenement/' . $evenementId);
    }
}