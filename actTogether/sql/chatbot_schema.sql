-- Schema Chatbot pour actTogether
USE acttogether;

-- Table conversations
CREATE TABLE IF NOT EXISTS conversations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    etudiant_id INT NULL,
    session_id VARCHAR(100) NOT NULL UNIQUE,
    nom_visiteur VARCHAR(100) NULL,
    email_visiteur VARCHAR(100) NULL,
    statut ENUM('active', 'terminee', 'en_attente') DEFAULT 'active',
    date_debut TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_fin TIMESTAMP NULL,
    FOREIGN KEY (etudiant_id) REFERENCES etudiants(id) ON DELETE SET NULL
);

-- Table messages
CREATE TABLE IF NOT EXISTS messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    conversation_id INT NOT NULL,
    expediteur ENUM('visiteur', 'bot', 'admin') NOT NULL,
    contenu TEXT NOT NULL,
    type_message ENUM('texte', 'suggestion', 'lien') DEFAULT 'texte',
    date_envoi TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    lu BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (conversation_id) REFERENCES conversations(id) ON DELETE CASCADE
);

-- Table reponses_automatiques
CREATE TABLE IF NOT EXISTS reponses_automatiques (
    id INT PRIMARY KEY AUTO_INCREMENT,
    mots_cles TEXT NOT NULL COMMENT 'JSON array de mots clés',
    reponse TEXT NOT NULL,
    suggestions TEXT NULL COMMENT 'JSON array de suggestions',
    categorie VARCHAR(50) NOT NULL,
    priorite INT DEFAULT 0,
    actif BOOLEAN DEFAULT TRUE,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);