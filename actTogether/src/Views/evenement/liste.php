<div class="page-header">
    <h1>Événements Disponibles</h1>
    <p>Participez aux actions solidaires et gagnez des points !</p>
</div>

<?php if (empty($evenements)): ?>
    <div class="empty-state">
        <h2>Aucun événement disponible</h2>
    </div>
<?php else: ?>
    <div class="evenements-grid">
        <?php foreach($evenements as $event): ?>
            <div class="event-card">
                <div class="event-header">
                    <h3><?= htmlspecialchars($event['titre']) ?></h3>
                    <div class="points-badge">+<?= $event['points_recompense'] ?> pts</div>
                </div>
                
                <p class="event-description"><?= htmlspecialchars($event['description']) ?></p>
                
                <div class="event-meta">
                    <div class="meta-item">
                        <span class="icon">📅</span>
                        <span><?= date('d/m/Y', strtotime($event['date_evenement'])) ?></span>
                    </div>
                    <div class="meta-item">
                        <span class="icon">📍</span>
                        <span><?= htmlspecialchars($event['lieu']) ?></span>
                    </div>
                    <div class="meta-item">
                        <span class="icon">👥</span>
                        <span><?= $event['participants_actuels'] ?>/<?= $event['participants_max'] ?> places</span>
                    </div>
                </div>
                
                <div class="event-actions">
                    <a href="/actTogether/public/evenement/<?= $event['id'] ?>" class="btn btn-primary">
                        Voir détails
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>