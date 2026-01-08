<div class="container">
    <div class="form-container">
        <h2>Connexion</h2>
        
        <form method="POST" class="form">
            <input type="hidden" name="csrf_token" value="<?= generateCSRFToken() ?>">
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="mot_de_passe">Mot de passe</label>
                <input type="password" id="mot_de_passe" name="mot_de_passe" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
        
        <p class="form-footer">
            Pas encore inscrit ? <a href="/actTogether/public/register">Créer un compte</a>
        </p>
    </div>
</div>