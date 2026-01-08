# actTogether - MVP Bénévolat Étudiant

## Description
Plateforme qui connecte les étudiants à des événements de bénévolat et récompense leur engagement par des points offerts par des entreprises partenaires.

## Installation

### 1. Base de données
1. Créer une base de données MySQL nommée `acttogether`
2. Importer `sql/schema.sql` pour créer les tables
3. Importer `sql/seed.sql` pour les données de test

### 2. Configuration
1. Modifier `config/database.php` avec vos paramètres MySQL
2. Vérifier que mod_rewrite est activé sur Apache

### 3. Accès
- URL : `http://localhost/actTogether/public/`
- Ou configurer un virtual host pointant vers le dossier `public/`

## Fonctionnalités MVP

### ✅ Implémenté
- Inscription/Connexion étudiant (simple)
- Liste des événements disponibles
- Inscription aux événements
- Système de points automatique
- Dashboard étudiant
- Liste des partenaires
- Catalogue des récompenses (vitrine)

### ❌ Non implémenté (hors MVP)
- Paiement réel
- Panel administrateur
- Upload d'images
- Échange points contre récompenses
- Notifications
- Reset mot de passe

## Structure MVC

```
actTogether/
├── config/          # Configuration base de données
├── models/          # Classes métier (Etudiant, Evenement, etc.)
├── controllers/     # Logique applicative
├── views/           # Templates HTML
├── assets/          # CSS, JS, images
├── includes/        # Fonctions utilitaires
├── public/          # Point d'entrée (index.php)
└── sql/             # Scripts base de données
```

## Technologies
- **Backend** : PHP 7.4+ natif (MVC)
- **Frontend** : HTML5, CSS3, JavaScript vanilla
- **Base de données** : MySQL 5.7+
- **Serveur** : Apache avec mod_rewrite

## Test rapide
1. Aller sur la page d'accueil
2. S'inscrire comme étudiant
3. Se connecter
4. Voir les événements disponibles
5. S'inscrire à un événement
6. Vérifier que les points ont été ajoutés
7. Consulter le dashboard
8. Voir les partenaires et récompenses

## Sécurité
- Mots de passe hashés (password_hash)
- Protection XSS (htmlspecialchars)
- Requêtes préparées (PDO)
- Sessions sécurisées
- Validation côté serveur

## Auteur
Développé selon le cahier des charges actTogether MVP.