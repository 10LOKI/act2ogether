<div class="event-details">
    <div class="event-header">
        <h1><?= htmlspecialchars($evenement['titre']) ?></h1>
        <div class="points-badge large">+<?= $evenement['points_recompense'] ?> points</div>
    </div>
    
    <div class="event-content">
        <div class="event-info">
            <h2>Description</h2>
            <p><?= htmlspecialchars($evenement['description']) ?></p>
            
            <div class="event-details-grid">
                <div class="detail-item">
                    <strong>📅 Date</strong>
                    <span><?= date('d/m/Y', strtotime($evenement['date_evenement'])) ?></span>
                </div>
                <div class="detail-item">
                    <strong>📍 Lieu</strong>
                    <span><?= htmlspecialchars($evenement['lieu']) ?></span>
                </div>
                <div class="detail-item">
                    <strong>👥 Participants</strong>
                    <span><?= $evenement['participants_actuels'] ?>/<?= $evenement['participants_max'] ?></span>
                </div>
            </div>
        </div>
        
        <div class="event-actions">
            <?php if (!estConnecte()): ?>
                <p class="login-required">
                    <a href="/actTogether/public/login">Connectez-vous</a> pour participer
                </p>
            <?php elseif ($dejaInscrit): ?>
                <div class="already-registered">
                    <span class="success-icon">✅</span>
                    <span>Vous êtes déjà inscrit</span>
                </div>
            <?php else: ?>
                <form method="POST" action="/actTogether/public/evenement/inscrire" class="inscription-form">
                    <input type="hidden" name="csrf_token" value="<?= generateCSRFToken() ?>">
                    <input type="hidden" name="evenement_id" value="<?= $evenement['id'] ?>">
                    <button type="submit" class="btn btn-primary btn-large">
                        Participer à cet événement
                    </button>
                </form>
            <?php endif; ?>
            
            <a href="/actTogether/public/evenements" class="btn btn-secondary">Retour à la liste</a>
        </div>
    </div>
</div>