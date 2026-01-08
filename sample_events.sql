-- Sample events for actTogether
USE act2gether;

-- Insert sample events
INSERT INTO events (title, description, short_description, event_date, location, points_reward, max_participants, category, status) VALUES
('Nettoyage de Plage Rabat', 'Rejoignez-nous pour nettoyer la plage de Rabat et protéger notre environnement marin. Une journée enrichissante pour toute la famille.', 'Nettoyage environnemental à la plage de Rabat', '2024-12-30 09:00:00', 'Plage de Rabat, Maroc', 250, 50, 'environment', 'published'),

('Distribution de Repas aux Sans-Abri', 'Aidez-nous à distribuer des repas chauds aux personnes dans le besoin dans le centre-ville de Casablanca.', 'Distribution de repas solidaires à Casablanca', '2024-12-28 18:00:00', 'Centre-ville Casablanca, Maroc', 300, 30, 'community', 'published'),

('Atelier d\'Alphabétisation pour Enfants', 'Enseignez la lecture et l\'écriture aux enfants défavorisés dans notre centre éducatif. Votre aide peut changer leur avenir.', 'Cours d\'alphabétisation pour enfants', '2025-01-05 14:00:00', 'Centre Éducatif Marrakech, Maroc', 400, 20, 'education', 'published');

-- Insert sample partners
INSERT INTO partners (name, description, contact_email, status) VALUES
('Association Verte Maroc', 'Organisation environnementale dédiée à la protection de la nature', 'contact@vertemaroc.org', 'active'),
('Solidarité Casablanca', 'Association d\'aide aux personnes démunies', 'info@solidaritecasa.ma', 'active'),
('Éducation Pour Tous', 'ONG focalisée sur l\'éducation des enfants défavorisés', 'contact@educationpourtous.ma', 'active');

-- Insert sample rewards
INSERT INTO rewards (name, description, points_cost, partner_id, category, status) VALUES
('Bon d\'achat Carrefour 50 DH', 'Bon d\'achat valable dans tous les magasins Carrefour du Maroc', 500, 1, 'shopping', 'active'),
('Entrée gratuite Cinéma', 'Ticket gratuit pour une séance de cinéma dans les salles partenaires', 300, 2, 'entertainment', 'active'),
('Kit écologique', 'Kit contenant des produits écologiques pour la maison', 400, 1, 'environment', 'active'),
('Cours de langue gratuit', 'Accès à un cours de langue en ligne pendant 1 mois', 600, 3, 'education', 'active');