-- Migration script: Replace old database with new schema
DROP DATABASE IF EXISTS act2gether;
CREATE DATABASE act2gether;
USE act2gether;

-- Users table (replaces etudiants)
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    points INT DEFAULT 0,
    level INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Events table (replaces evenements)
CREATE TABLE events (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL,
    description TEXT NOT NULL,
    event_date DATETIME NOT NULL,
    location VARCHAR(200) NOT NULL,
    points_reward INT NOT NULL DEFAULT 0,
    max_participants INT NOT NULL,
    current_participants INT DEFAULT 0,
    status ENUM('published', 'cancelled', 'completed') DEFAULT 'published',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Registrations table (replaces inscriptions)
CREATE TABLE registrations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    event_id INT NOT NULL,
    status ENUM('registered', 'attended', 'cancelled') DEFAULT 'registered',
    points_earned INT DEFAULT 0,
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE,
    UNIQUE KEY unique_registration (user_id, event_id)
);

-- Partners table (replaces partenaires)
CREATE TABLE partners (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    logo VARCHAR(255),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Rewards table (replaces recompenses)
CREATE TABLE rewards (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    description TEXT,
    points_cost INT NOT NULL,
    partner_id INT NOT NULL,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (partner_id) REFERENCES partners(id) ON DELETE CASCADE
);

-- Insert sample data
INSERT INTO partners (name, description) VALUES
('McDonald\'s Maroc', 'Chaîne de restauration rapide'),
('Carrefour', 'Grande surface'),
('Inwi', 'Opérateur télécom');

INSERT INTO events (title, description, event_date, location, points_reward, max_participants) VALUES
('Nettoyage de plage', 'Action environnementale', '2024-12-25 09:00:00', 'Casablanca', 50, 30),
('Soutien scolaire', 'Aide aux enfants', '2024-12-22 14:00:00', 'Rabat', 75, 15),
('Distribution repas', 'Aide aux démunis', '2024-12-24 18:00:00', 'Casablanca', 60, 20);

INSERT INTO rewards (name, description, points_cost, partner_id) VALUES
('Menu Big Mac', 'Menu gratuit McDonald\'s', 100, 1),
('Bon 50 DH', 'Bon d\'achat Carrefour', 150, 2),
('Recharge 20 DH', 'Recharge téléphone', 80, 3);