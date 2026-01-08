<?php

function estConnecte() {
    return isset($_SESSION['etudiant_id']);
}

function getEtudiantConnecte() {
    return $_SESSION['etudiant'] ?? null;
}

function connexion($etudiant) {
    session_regenerate_id(true);
    $_SESSION['etudiant_id'] = $etudiant['id'];
    $_SESSION['etudiant'] = $etudiant;
    $_SESSION['LAST_ACTIVITY'] = time();
}

function deconnexion() {
    $_SESSION = [];
    session_destroy();
}

function protegerPage() {
    verifierSessionActive();
    if (!estConnecte()) {
        header('Location: /actTogether/public/login');
        exit;
    }
}

function verifierSessionActive() {
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
        session_destroy();
        header('Location: /actTogether/public/login');
        exit;
    }
    $_SESSION['LAST_ACTIVITY'] = time();
}

function verifierProprietaire($etudiantId) {
    if (!isset($_SESSION['etudiant_id']) || $_SESSION['etudiant_id'] != $etudiantId) {
        die('Accès refusé');
    }
}
