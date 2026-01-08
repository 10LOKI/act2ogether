-- Données de test pour actTogether
USE acttogether;

-- Insertion des événements
INSERT INTO evenements (titre, description, date_evenement, lieu, points_recompense, participants_max) VALUES
('Nettoyage de plage', 'Journée de nettoyage à Ain Diab', '2026-02-15', 'Plage Ain Diab, Casablanca', 50, 20),
('Distribution alimentaire', 'Aide aux familles dans le besoin', '2026-02-20', 'Quartier Sidi Moumen', 75, 15),
('Aide aux devoirs', 'Soutien scolaire pour enfants', '2026-02-25', 'Association Al Amal, Derb Sultan', 40, 10);

-- Insertion des partenaires
INSERT INTO partenaires (nom_entreprise, logo, description) VALUES
('McDonald\'s Maroc', 'mcdo-logo.svg', 'Chaîne de restauration rapide'),
('Fnac Maroc', 'fnac-logo.svg', 'Magasin de produits culturels');

-- Insertion des récompenses
INSERT INTO recompenses (nom, description, cout_en_points, partenaire_id) VALUES
('Menu Big Mac', 'Menu complet avec frites et boisson', 100, 1),
('Dessert McFlurry', 'Glace McFlurry au choix', 50, 1),
('Bon d\'achat 100 DH', 'Valable sur tout le magasin', 200, 2),
('Bon d\'achat 50 DH', 'Valable sur tout le magasin', 100, 2);