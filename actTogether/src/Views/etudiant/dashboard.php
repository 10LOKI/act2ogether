<div class="container">
    <div class="dashboard">
        <!-- Hero Section -->
        <div class="dashboard-hero">
            <div class="dashboard-hero-content">
                <div class="profile-avatar-large">🎓</div>
                <div class="profile-info">
                    <h1>Bienvenue, <?= sanitizeOutput($etudiant['nom']) ?>!</h1>
                    <div class="profile-stats">
                        <span class="stat-badge">🏆 Rang #<?= $rank ?></span>
                        <span class="stat-badge">📧 <?= sanitizeOutput($etudiant['email']) ?></span>
                    </div>
                </div>
                <div class="points-display">
                    <h3>Mes Points</h3>
                    <div class="points-number"><?= (int)$etudiant['total_points'] ?></div>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="dashboard-grid">
            <div class="stat-card">
                <div class="stat-icon primary">📅</div>
                <div class="stat-content">
                    <h3>Événements</h3>
                    <div class="stat-value"><?= count($inscriptions) ?></div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon accent">⭐</div>
                <div class="stat-content">
                    <h3>Points Totaux</h3>
                    <div class="stat-value"><?= (int)$etudiant['total_points'] ?></div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon secondary">✅</div>
                <div class="stat-content">
                    <h3>Complétés</h3>
                    <div class="stat-value"><?= count(array_filter($inscriptions, fn($i) => $i['statut'] === 'complete')) ?></div>
                </div>
            </div>
        </div>

        <!-- Mes Événements -->
        <div class="section-modern">
            <div class="section-header">
                <h2>📋 Mes Événements</h2>
                <a href="/actTogether/public/evenements" class="btn btn-primary">+ Nouveau</a>
            </div>
            
            <?php if (empty($inscriptions)): ?>
                <div class="empty-state-modern">
                    <div class="icon">🎯</div>
                    <h3>Aucune participation</h3>
                    <p>Commencez votre aventure solidaire en participant à un événement!</p>
                    <a href="/actTogether/public/evenements" class="btn btn-primary btn-large">Découvrir les événements</a>
                </div>
            <?php else: ?>
                <div class="events-timeline">
                    <?php foreach($inscriptions as $inscription): ?>
                        <div class="timeline-item <?= $inscription['statut'] ?>">
                            <div class="event-card-modern <?= $inscription['statut'] ?>">
                                <div class="event-card-header">
                                    <h3><?= sanitizeOutput($inscription['titre']) ?></h3>
                                    <span class="event-status <?= $inscription['statut'] ?>">
                                        <?= $inscription['statut'] === 'complete' ? '✅ Complété' : '⏳ En cours' ?>
                                    </span>
                                </div>
                                <div class="event-details-grid">
                                    <div class="event-detail">
                                        <span>📅</span>
                                        <span><?= date('d/m/Y', strtotime($inscription['date_evenement'])) ?></span>
                                    </div>
                                    <div class="event-detail">
                                        <span>📍</span>
                                        <span><?= sanitizeOutput($inscription['lieu']) ?></span>
                                    </div>
                                    <div class="event-detail">
                                        <span>⏰</span>
                                        <span><?= date('H:i', strtotime($inscription['date_evenement'])) ?></span>
                                    </div>
                                </div>
                                <?php if ($inscription['statut'] === 'complete'): ?>
                                    <span class="points-earned-badge">
                                        <span>🎁</span>
                                        <span>+<?= (int)$inscription['points_attribues'] ?> points gagnés</span>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Quick Actions -->
        <div class="section-modern">
            <div class="section-header">
                <h2>🚀 Actions Rapides</h2>
            </div>
            <div class="quick-actions-grid">
                <a href="/actTogether/public/evenements" class="action-card">
                    <div class="icon">🎯</div>
                    <h4>Événements</h4>
                    <p>Découvrir les prochains événements</p>
                </a>
                <a href="/actTogether/public/" class="action-card">
                    <div class="icon">🏆</div>
                    <h4>Classement</h4>
                    <p>Voir le top des étudiants</p>
                </a>
                <a href="/actTogether/public/contact" class="action-card">
                    <div class="icon">💬</div>
                    <h4>Contact</h4>
                    <p>Besoin d'aide? Contactez-nous</p>
                </a>
            </div>
        </div>
    </div>
</div>