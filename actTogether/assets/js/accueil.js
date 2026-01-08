// Animation compteurs
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.stat-number');
    
    const animateCounter = (counter) => {
        const target = parseInt(counter.getAttribute('data-target'));
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;
        
        const updateCounter = () => {
            current += increment;
            if (current < target) {
                counter.textContent = Math.floor(current);
                requestAnimationFrame(updateCounter);
            } else {
                counter.textContent = target + '+';
            }
        };
        
        updateCounter();
    };
    
    // Observer pour démarrer l'animation quand visible
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    });
    
    counters.forEach(counter => observer.observe(counter));
    
    // Charger Top Étudiants avec AJAX
    loadTopEtudiants();
});

function loadTopEtudiants() {
    const leaderboard = document.getElementById('leaderboard');
    if (!leaderboard) return;
    
    fetch('/actTogether/public/api/top-etudiants.php')
        .then(response => {
            if (!response.ok) throw new Error('Network error');
            return response.json();
        })
        .then(data => {
            if (data.error) {
                leaderboard.innerHTML = '<p class="error">Erreur: ' + data.error + '</p>';
                return;
            }
            
            if (data.length === 0) {
                leaderboard.innerHTML = '<p class="empty-state">Aucun étudiant pour le moment</p>';
                return;
            }
            
            leaderboard.innerHTML = '<div class="leaderboard-list"></div>';
            const list = leaderboard.querySelector('.leaderboard-list');
            
            const avatars = ['🧑‍🎓', '👩‍🎓', '👨‍🎓', '👩‍💻', '👨‍💻', '🧑‍💼', '👩‍🔬', '👨‍🏫', '👩‍⚖️', '👨‍⚕️'];
            
            data.forEach((etudiant, index) => {
                setTimeout(() => {
                    const medal = index === 0 ? '🥇' : index === 1 ? '🥈' : index === 2 ? '🥉' : `#${index + 1}`;
                    const name = etudiant.nom || 'Anonyme';
                    const points = etudiant.total_points || 0;
                    const avatar = avatars[index % avatars.length];
                    
                    const item = document.createElement('div');
                    item.className = 'leaderboard-item';
                    item.style.opacity = '0';
                    item.style.transform = 'translateY(20px)';
                    item.innerHTML = `
                        <span class="rank">${medal}</span>
                        <span class="avatar">${avatar}</span>
                        <span class="name">${name}</span>
                        <span class="points">${points} pts</span>
                    `;
                    
                    list.appendChild(item);
                    
                    setTimeout(() => {
                        item.style.transition = 'all 0.5s ease';
                        item.style.opacity = '1';
                        item.style.transform = 'translateY(0)';
                    }, 50);
                }, index * 200);
            });
        })
        .catch(error => {
            console.error('Error:', error);
            leaderboard.innerHTML = '<p class="error">Erreur de chargement. Vérifiez la console.</p>';
        });
}


function initConseilsCarousel() {
    const track = document.getElementById('conseilsTrack');
    const prevBtn = document.getElementById('conseilPrev');
    const nextBtn = document.getElementById('conseilNext');
    const dotsContainer = document.getElementById('conseilDots');
    
    if (!track || !prevBtn || !nextBtn) return;
    
    const cards = track.querySelectorAll('.conseil-card');
    const cardWidth = 300 + 32;
    let currentIndex = 0;
    const totalCards = cards.length;
    
    for (let i = 0; i < totalCards; i++) {
        const dot = document.createElement('div');
        dot.className = 'carousel-dot' + (i === 0 ? ' active' : '');
        dot.addEventListener('click', () => goToSlide(i));
        dotsContainer.appendChild(dot);
    }
    
    const dots = dotsContainer.querySelectorAll('.carousel-dot');
    
    function updateCarousel() {
        track.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === currentIndex);
        });
    }
    
    function goToSlide(index) {
        currentIndex = Math.max(0, Math.min(index, totalCards - 1));
        updateCarousel();
    }
    
    prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });
    
    nextBtn.addEventListener('click', () => {
        if (currentIndex < totalCards - 1) {
            currentIndex++;
            updateCarousel();
        }
    });
    
    setInterval(() => {
        currentIndex = (currentIndex + 1) % totalCards;
        updateCarousel();
    }, 5000);
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initConseilsCarousel);
} else {
    initConseilsCarousel();
}
