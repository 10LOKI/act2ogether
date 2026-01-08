<div class="container">
    <div class="dashboard">
    <div class="dashboard-header">
        <div class="profile-section">
            <div class="profile-avatar">🎓</div>
            <div>
                <h1>Bienvenue <?= sanitizeOutput($etudiant['nom']) ?></h1>
                <p class="rank-badge">🏆 Rang #<?= $rank ?></p>
            </div>
        </div>
        <div class="points-card">
            <h2>Mes Points</h2>
            <div class="points-total"><?= (int)$etudiant['total_points'] ?></div>
        </div>
    </div>
    
    <div class="section">
        <h2>Mes Événements</h2>
        
        <?php if (empty($inscriptions)): ?>
            <p class="empty-state">Aucune participation pour le moment.</p>
            <a href="/actTogether/public/evenements" class="btn btn-primary">Découvrir les événements</a>
        <?php else: ?>
            <div class="events-list">
                <?php foreach($inscriptions as $inscription): ?>
                    <div class="event-card">
                        <h3><?= sanitizeOutput($inscription['titre']) ?></h3>
                        <div class="event-meta">
                            <span>📅 <?= date('d/m/Y', strtotime($inscription['date_evenement'])) ?></span>
                            <span>📍 <?= sanitizeOutput($inscription['lieu']) ?></span>
                            <span class="statut statut-<?= $inscription['statut'] ?>">
                                <?= $inscription['statut'] === 'complete' ? '✅ Complété' : '⏳ Inscrit' ?>
                            </span>
                        </div>
                        <?php if ($inscription['statut'] === 'complete'): ?>
                            <div class="points-earned">+<?= (int)$inscription['points_attribues'] ?> points</div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
</div>