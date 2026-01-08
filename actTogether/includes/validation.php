<?php
// Validation des données

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validateNom($nom) {
    $nom = trim($nom);
    return strlen($nom) >= 2 && strlen($nom) <= 100 && preg_match('/^[a-zA-ZÀ-ÿ\s\-]+$/u', $nom);
}

function validatePassword($password) {
    return strlen($password) >= 8;
}
