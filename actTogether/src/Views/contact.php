<div class="contact-page">
    <h1>Contactez-nous</h1>
    <p class="contact-intro">Une question ? Une suggestion ? N'hésitez pas à nous contacter !</p>
    
    <div class="contact-grid">
        <div class="contact-form-section">
            <h2>Envoyez-nous un message</h2>
            <form method="POST" class="contact-form">
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
                    <label for="sujet">Sujet</label>
                    <select id="sujet" name="sujet" required>
                        <option value="">Choisissez un sujet</option>
                        <option value="question">Question générale</option>
                        <option value="partenariat">Partenariat</option>
                        <option value="technique">Problème technique</option>
                        <option value="autre">Autre</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
        
        <div class="contact-info-section">
            <h2>Nos coordonnées</h2>
            <div class="contact-info">
                <div class="info-item">
                    <span class="icon">📧</span>
                    <div>
                        <strong>Email</strong>
                        <p>contact@acttogether.ma</p>
                    </div>
                </div>
                <div class="info-item">
                    <span class="icon">📞</span>
                    <div>
                        <strong>Téléphone</strong>
                        <p>+212 5 22 XX XX XX</p>
                    </div>
                </div>
                <div class="info-item">
                    <span class="icon">📍</span>
                    <div>
                        <strong>Adresse</strong>
                        <p>Boulevard Mohammed V<br>Casablanca, Maroc</p>
                    </div>
                </div>
            </div>
            
            <div class="map-container">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d106364.21051469487!2d-7.6816!3d33.5731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7cd4778aa113b%3A0xb06c1d84f310fd3!2sCasablanca!5e0!3m2!1sfr!2sma!4v1234567890"
                    width="100%" 
                    height="300" 
                    style="border:0; border-radius: 10px;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</div>