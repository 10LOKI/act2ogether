<div class="container">
    <div class="form-container">
        <h2>Inscription</h2>
        
        <form method="POST" class="form">
            <input type="hidden" name="csrf_token" value="<?= generateCSRFToken() ?>">
            
            <div class="form-group">
                <label for="nom">Nom complet</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="mot_de_passe">Mot de passe (min 8 caractères)</label>
                <input type="password" id="mot_de_passe" name="mot_de_passe" required minlength="8">
            </div>
            
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
        
        <p class="form-footer">
            Déjà inscrit ? <a href="/actTogether/public/login">Se connecter</a>
        </p>
    </div>
</div>