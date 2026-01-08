-- Création de la base de données actTogether
CREATE DATABASE IF NOT EXISTS acttogether;
USE acttogether;

-- Table des étudiants
CREATE TABLE etudiants (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    total_points INT DEFAULT 0,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des événements
CREATE TABLE evenements (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(200) NOT NULL,
    description TEXT NOT NULL,
    date_evenement DATE NOT NULL,
    lieu VARCHAR(200) NOT NULL,
    points_recompense INT NOT NULL,
    participants_max INT NOT NULL,
    participants_actuels INT DEFAULT 0,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des inscriptions
CREATE TABLE inscriptions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    etudiant_id INT NOT NULL,
    evenement_id INT NOT NULL,
    statut ENUM('inscrit', 'complete') DEFAULT 'inscrit',
    points_attribues INT DEFAULT 0,
    date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (etudiant_id) REFERENCES etudiants(id) ON DELETE CASCADE,
    FOREIGN KEY (evenement_id) REFERENCES evenements(id) ON DELETE CASCADE,
    UNIQUE KEY unique_inscription (etudiant_id, evenement_id)
);

-- Table des partenaires
CREATE TABLE partenaires (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom_entreprise VARCHAR(100) NOT NULL,
    logo VARCHAR(255),
    description TEXT,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des récompenses
CREATE TABLE recompenses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(200) NOT NULL,
    description TEXT,
    cout_en_points INT NOT NULL,
    partenaire_id INT NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (partenaire_id) REFERENCES partenaires(id) ON DELETE CASCADE
);