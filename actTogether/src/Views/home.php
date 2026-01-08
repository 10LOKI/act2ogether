<!-- Hero Section -->
<section class="hero-modern">
    <div class="hero-content">
        <h1 class="hero-title">
            <span class="ar">معاً من أجل الخير</span>
            <span class="fr">Ensemble pour le Bien</span>
        </h1>
        <p class="hero-subtitle">Rejoignez la plus grande communauté étudiante de bénévolat au Maroc</p>
        <div class="hero-actions">
            <?php if (!estConnecte()): ?>
                <a href="/actTogether/public/register" class="btn btn-hero-primary">Commencer maintenant</a>
                <a href="#comment-ca-marche" class="btn btn-hero-secondary">Comment ça marche ?</a>
            <?php else: ?>
                <a href="/actTogether/public/dashboard" class="btn btn-hero-primary">Mon Dashboard</a>
                <a href="/actTogether/public/evenements" class="btn btn-hero-secondary">Voir les événements</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="hero-stats">
        <div class="stat-item">
            <span class="stat-number" data-target="500">0</span>
            <span class="stat-label">Étudiants actifs</span>
        </div>
        <div class="stat-item">
            <span class="stat-number" data-target="150">0</span>
            <span class="stat-label">Événements réalisés</span>
        </div>
        <div class="stat-item">
            <span class="stat-number" data-target="25">0</span>
            <span class="stat-label">Partenaires</span>
        </div>
    </div>
</section>

<!-- Comment ça marche -->
<section id="comment-ca-marche" class="how-it-works">
    <div class="container">
        <h2 class="section-title">Comment ça marche ?</h2>
        <div class="steps-grid">
            <div class="step-card">
                <div class="step-icon">📝</div>
                <h3>1. Inscrivez-vous</h3>
                <p>Créez votre compte gratuitement en quelques secondes</p>
            </div>
            <div class="step-card">
                <div class="step-icon">🎯</div>
                <h3>2. Participez</h3>
                <p>Choisissez un événement solidaire et inscrivez-vous</p>
            </div>
            <div class="step-card">
                <div class="step-icon">⭐</div>
                <h3>3. Gagnez des points</h3>
                <p>Échangez vos points contre des récompenses</p>
            </div>
        </div>
    </div>
</section>

<!-- Événements à la une -->
<section class="featured-events">
    <div class="container">
        <h2 class="section-title">Événements à la une</h2>
        <div class="events-grid">
            <?php 
            require_once __DIR__ . '/../Models/Evenement.php';
            use App\Models\Evenement;
            $evenementModel = new Evenement();
            $events = array_slice($evenementModel->getDisponibles(), 0, 3);
            
            foreach($events as $index => $event): 
                $images = ['event-beach.svg', 'event-food.svg', 'event-education.svg'];
                $image = $images[$index % 3];
            ?>
                <div class="event-card-modern">
                    <div class="event-image">
                        <img src="/actTogether/assets/images/<?= $image ?>" alt="<?= sanitizeOutput($event['titre']) ?>">
                        <span class="event-badge">+<?= $event['points_recompense'] ?> pts</span>
                    </div>
                    <div class="event-content">
                        <h3><?= sanitizeOutput($event['titre']) ?></h3>
                        <p><?= sanitizeOutput(substr($event['description'], 0, 100)) ?>...</p>
                        <div class="event-meta">
                            <span>📅 <?= date('d/m/Y', strtotime($event['date_evenement'])) ?></span>
                            <span>📍 <?= sanitizeOutput($event['lieu']) ?></span>
                        </div>
                        <a href="/actTogether/public/evenement/<?= $event['id'] ?>" class="btn btn-event">Voir détails</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center">
            <a href="/actTogether/public/evenements" class="btn btn-primary">Voir tous les événements</a>
        </div>
    </div>
</section>

<!-- Sponsors -->
<section class="sponsors">
    <div class="container">
        <h2 class="section-title">Nos partenaires</h2>
        <div class="sponsors-carousel">
            <div class="sponsor-item"><img src="/actTogether/assets/images/mcdo-logo.svg" alt="McDonald's"></div>
            <div class="sponsor-item"><img src="/actTogether/assets/images/fnac-logo.svg" alt="Fnac"></div>
            <div class="sponsor-item"><img src="/actTogether/assets/images/marjane-logo.svg" alt="Marjane"></div>
            <div class="sponsor-item"><img src="/actTogether/assets/images/inwi-logo.svg" alt="inwi"></div>
            <div class="sponsor-item"><img src="/actTogether/assets/images/attijariwafa-logo.svg" alt="Attijariwafa Bank"></div>
            <div class="sponsor-item"><img src="/actTogether/assets/images/cocacola-logo.svg" alt="Coca-Cola"></div>
        </div>
    </div>
</section>

<!-- Témoignages -->
<section class="testimonials">
    <div class="container">
        <h2 class="section-title">Ils nous font confiance</h2>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-avatar">👨‍🎓</div>
                <p class="testimonial-text">"actTogether m'a permis de m'engager dans des actions solidaires tout en gagnant des récompenses. Une expérience enrichissante !"</p>
                <h4>Youssef El Amrani</h4>
                <span>Étudiant ENSAM Casablanca</span>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-avatar">👩‍🎓</div>
                <p class="testimonial-text">"Grâce à cette plateforme, j'ai découvert de nombreuses associations et j'ai pu aider ma communauté. Je recommande !"</p>
                <h4>Salma Bennani</h4>
                <span>Étudiante ISCAE Rabat</span>
            </div>
        </div>
    </div>
</section>

<!-- Top Étudiants -->
<section class="top-students">
    <div class="container">
        <h2 class="section-title">🏆 Top Étudiants</h2>
        <div class="leaderboard" id="leaderboard">
            <div class="loading">Chargement...</div>
        </div>
    </div>
</section>

<!-- CTA Final -->
<section class="cta-section">
    <div class="container">
        <h2>Prêt à faire la différence ?</h2>
        <p>Rejoignez des centaines d'étudiants engagés</p>
        <a href="/actTogether/public/register" class="btn btn-cta">Rejoindre actTogether</a>
    </div>
</section>