<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>actTogether</title>
    <link rel="stylesheet" href="/actTogether/assets/css/style.css">
    <link rel="stylesheet" href="/actTogether/assets/css/accueil.css">
    <link rel="stylesheet" href="/actTogether/assets/css/chatbot.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <h1 class="logo">
                <a href="/actTogether/public/">
                    <img src="/logo.png" alt="actTogether" class="logo-img">
                </a>
            </h1>
            <nav class="nav">
                <a href="/actTogether/public/">Accueil</a>
                <a href="/actTogether/public/evenements">Événements</a>
                <a href="/actTogether/public/contact">Contact</a>
                <?php if (estConnecte()): ?>
                    <a href="/actTogether/public/dashboard">Mon Profil</a>
                    <span class="points-badge-nav">⭐ <?= getEtudiantConnecte()['total_points'] ?? 0 ?> pts</span>
                    <a href="/actTogether/public/logout" class="btn-logout">Déconnexion</a>
                <?php else: ?>
                    <a href="/actTogether/public/login">Connexion</a>
                    <a href="/actTogether/public/register" class="btn-register">Inscription</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    
    <main class="main">
        <?php if (isset($_SESSION['success'])): ?>
            <div class="container">
                <div class="alert alert-success"><?= htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?></div>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['error'])): ?>
            <div class="container">
                <div class="alert alert-error"><?= htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></div>
            </div>
        <?php endif; ?>
        
        <?= $content ?>
    </main>
    
    <footer class="footer-modern">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h3>🤝 actTogether</h3>
                    <p>La plateforme marocaine qui connecte les étudiants aux actions solidaires.</p>
                </div>
                <div class="footer-col">
                    <h4>Navigation</h4>
                    <ul>
                        <li><a href="/actTogether/public/">À propos</a></li>
                        <li><a href="/actTogether/public/evenements">Événements</a></li>
                        <li><a href="/actTogether/public/contact">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Légal</h4>
                    <ul>
                        <li><a href="#">Conditions d'utilisation</a></li>
                        <li><a href="#">Politique de confidentialité</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Contact</h4>
                    <ul>
                        <li>📧 contact@acttogether.ma</li>
                        <li>📞 +212 5 22 XX XX XX</li>
                        <li>📍 Casablanca, Maroc</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 actTogether - Tous droits réservés</p>
            </div>
        </div>
    </footer>
    
    <script src="/actTogether/assets/js/main.js"></script>
    <script src="/actTogether/assets/js/accueil.js"></script>
    <script src="/actTogether/assets/js/chatbot.js"></script>
</body>
</html>