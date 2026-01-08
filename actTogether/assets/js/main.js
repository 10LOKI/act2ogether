// JavaScript pour actTogether - MVP

document.addEventListener('DOMContentLoaded', function() {
    
    // Toggle menu mobile
    const navToggle = document.getElementById('navToggle');
    const navMenu = document.getElementById('navMenu');
    
    if (navToggle && navMenu) {
        navToggle.addEventListener('click', function() {
            navToggle.classList.toggle('active');
            navMenu.classList.toggle('active');
        });
        
        // Fermer menu au clic sur lien
        navMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                navToggle.classList.remove('active');
                navMenu.classList.remove('active');
            });
        });
    }
    
    // Validation formulaires côté client
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!validerFormulaire(this)) {
                e.preventDefault();
            }
        });
    });
    
    // Confirmation avant inscription événement
    const btnsInscrire = document.querySelectorAll('.btn-inscrire, button[type="submit"]');
    btnsInscrire.forEach(btn => {
        if (btn.textContent.includes('Participer')) {
            btn.addEventListener('click', function(e) {
                if (!confirm('Confirmer votre inscription à cet événement ?')) {
                    e.preventDefault();
                }
            });
        }
    });
    
    // Animation des points
    const pointsElements = document.querySelectorAll('.points-total');
    pointsElements.forEach(element => {
        animerPoints(element);
    });
    
    // Auto-hide alerts après 5 secondes
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            setTimeout(() => {
                alert.remove();
            }, 300);
        }, 5000);
    });
});

// Validation formulaire
function validerFormulaire(form) {
    const inputs = form.querySelectorAll('input[required]');
    let valide = true;
    
    inputs.forEach(input => {
        if (!input.value.trim()) {
            marquerErreur(input, 'Ce champ est requis');
            valide = false;
        } else if (input.type === 'email' && !validerEmail(input.value)) {
            marquerErreur(input, 'Email invalide');
            valide = false;
        } else {
            supprimerErreur(input);
        }
    });
    
    return valide;
}

// Valider email
function validerEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

// Marquer erreur sur input
function marquerErreur(input, message) {
    supprimerErreur(input);
    
    input.style.borderColor = '#e74c3c';
    
    const errorDiv = document.createElement('div');
    errorDiv.className = 'error-message';
    errorDiv.textContent = message;
    errorDiv.style.color = '#e74c3c';
    errorDiv.style.fontSize = '0.9rem';
    errorDiv.style.marginTop = '0.25rem';
    
    input.parentNode.appendChild(errorDiv);
}

// Supprimer erreur
function supprimerErreur(input) {
    input.style.borderColor = '#ddd';
    
    const errorMessage = input.parentNode.querySelector('.error-message');
    if (errorMessage) {
        errorMessage.remove();
    }
}

// Animation compteur points
function animerPoints(element) {
    const target = parseInt(element.textContent);
    let current = 0;
    const increment = target / 30;
    
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        element.textContent = Math.floor(current);
    }, 50);
}

// Smooth scroll pour les ancres
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});

// Confirmation générale pour actions importantes
function confirmerAction(message) {
    return confirm(message || 'Êtes-vous sûr de vouloir effectuer cette action ?');
}