<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VolunHero | Tableau de bord Impact Jeunesse</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .active-nav { background: #eff6ff; color: #2563eb; border-right: 4px solid #2563eb; }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #cbd5e1; }
        .spin-anim { animation: rotate 3s cubic-bezier(0.15, 0, 0.15, 1) forwards; }
        @keyframes rotate { from { transform: rotate(0deg); } to { transform: rotate(1440deg); } }
        
        /* Style Modal pour l'édition */
        #edit-modal.active { display: flex; }
    </style>
</head>
<body class="bg-[#F8FAFC] text-slate-900">

    <div id="edit-modal" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-[100] hidden items-center justify-center p-4">
        <div class="bg-white rounded-[2.5rem] p-8 w-full max-w-md shadow-2xl border border-slate-100">
            <h3 class="text-2xl font-bold mb-6">Mettre à jour vos infos</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase ml-1 mb-2">Nom d'affichage</label>
                    <input type="text" id="edit-name-input" class="w-full bg-slate-50 border border-slate-200 p-4 rounded-2xl outline-none focus:ring-2 ring-blue-500 transition">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase ml-1 mb-2">Ville</label>
                    <input type="text" id="edit-city-input" class="w-full bg-slate-50 border border-slate-200 p-4 rounded-2xl outline-none focus:ring-2 ring-blue-500 transition">
                </div>
            </div>
            <div class="flex gap-3 mt-8">
                <button onclick="toggleEditModal()" class="flex-1 bg-slate-100 py-4 rounded-2xl font-bold text-slate-600">Annuler</button>
                <button onclick="saveProfileChanges()" class="flex-1 bg-blue-600 py-4 rounded-2xl font-bold text-white shadow-lg shadow-blue-200">Enregistrer</button>
            </div>
        </div>
    </div>

    <div class="flex min-h-screen">
        <aside class="w-64 bg-white border-r border-slate-200 flex flex-col sticky h-screen top-0 z-50">
            <div class="p-6 mb-4">
                <div class="flex items-center gap-2 text-blue-600 font-extrabold text-2xl tracking-tight">
                    <div class="bg-blue-600 p-1.5 rounded-lg text-white">
                        <i data-lucide="zap" class="w-6 h-6 fill-current"></i>
                    </div>
                    VolunHero
                </div>
            </div>
            
            <nav class="flex-1 px-3 space-y-1">
                <button onclick="showTab('home')" class="nav-link w-full flex items-center gap-3 p-3 rounded-xl font-semibold transition active-nav" id="nav-home">
                    <i data-lucide="layout-grid" class="w-5 h-5"></i> Tableau de bord
                </button>
                <button onclick="showTab('events')" class="nav-link w-full flex items-center gap-3 p-3 text-slate-500 hover:bg-slate-50 rounded-xl transition" id="nav-events">
                    <i data-lucide="calendar-days" class="w-5 h-5"></i> Explorer Événements
                </button>
                <button onclick="showTab('rewards')" class="nav-link w-full flex items-center gap-3 p-3 text-slate-500 hover:bg-slate-50 rounded-xl transition" id="nav-rewards">
                    <i data-lucide="shopping-bag" class="w-5 h-5"></i> Place de marché
                </button>
                <button onclick="showTab('spin')" class="nav-link w-full flex items-center gap-3 p-3 text-slate-500 hover:bg-slate-50 rounded-xl transition" id="nav-spin">
                    <i data-lucide="box" class="w-5 h-5 text-amber-500"></i> Tirage Mystère
                </button>
                <button onclick="showTab('profile')" class="nav-link w-full flex items-center gap-3 p-3 text-slate-500 hover:bg-slate-50 rounded-xl transition" id="nav-profile">
                    <i data-lucide="user" class="w-5 h-5"></i> Mon Profil
                </button>
            </nav>

            <div class="p-4 border-t border-slate-100">
                <div class="bg-gradient-to-tr from-slate-900 to-slate-800 rounded-2xl p-4 text-white relative overflow-hidden">
                    <p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold mb-1">Palier Actuel</p>
                    <p class="font-bold text-amber-400 flex items-center gap-1 leading-none text-lg italic">
                        #6 Top Bénévole <i data-lucide="shield-check" class="w-4 h-4"></i>
                    </p>
                    <div class="w-full bg-slate-700 h-1.5 mt-3 rounded-full overflow-hidden">
                        <div class="bg-amber-400 h-full w-[85%]"></div>
                    </div>
                </div>
            </div>
        </aside>

        <main class="flex-1 p-8">
            <header class="flex justify-between items-center mb-10">
                <div>
                    <h2 id="tab-title" class="text-3xl font-extrabold text-slate-900 tracking-tight">Vue d'ensemble</h2>
                    <p class="text-slate-500 font-medium mt-1">Hé <span id="header-name">Yassine</span>, tu as complété <span class="text-blue-600 font-bold">18 événements</span> jusqu'à présent !</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="bg-white border border-slate-200 rounded-2xl px-4 py-2 flex items-center gap-3 shadow-sm">
                        <i data-lucide="coins" class="text-amber-500 w-5 h-5"></i>
                        <span class="font-bold text-slate-700">2,450 pts</span>
                    </div>
                    <button class="bg-white p-3 rounded-2xl border border-slate-200 text-slate-400 hover:text-blue-600 transition relative shadow-sm">
                        <i data-lucide="bell" class="w-6 h-6"></i>
                        <span class="absolute top-3 right-3 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>
                </div>
            </header>

            <div id="content-area">
                
                <section id="tab-home" class="tab-content block animate-in fade-in duration-500">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                            <div class="bg-blue-50 text-blue-600 w-12 h-12 rounded-2xl flex items-center justify-center mb-4"><i data-lucide="trophy"></i></div>
                            <p class="text-slate-500 text-sm font-semibold">Rang Global</p>
                            <h3 class="text-3xl font-extrabold mt-1 text-slate-800">#6</h3>
                        </div>
                        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                            <div class="bg-emerald-50 text-emerald-600 w-12 h-12 rounded-2xl flex items-center justify-center mb-4"><i data-lucide="heart"></i></div>
                            <p class="text-slate-500 text-sm font-semibold">Total Événements</p>
                            <h3 class="text-3xl font-extrabold mt-1 text-slate-800">18</h3>
                        </div>
                        
                        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm md:col-span-2 flex flex-col h-[500px]">
                            <h4 class="font-bold flex items-center justify-between mb-4">
                                <span class="flex items-center gap-2"><i data-lucide="crown" class="text-amber-500 w-5 h-5"></i> Classement (Maroc)</span>
                                <span class="text-xs text-slate-400 font-normal uppercase tracking-widest">Top 20 Bénévoles</span>
                            </h4>
                            <div class="space-y-2 overflow-y-auto pr-2 custom-scrollbar" id="leaderboard-container"></div>
                        </div>
                    </div>
                </section>

                <section id="tab-events" class="tab-content hidden animate-in slide-in-from-bottom-4 duration-500">
                    <div class="flex flex-wrap gap-4 mb-8">
                        <select id="cityFilter" onchange="filterEvents()" class="bg-white border border-slate-200 px-4 py-2.5 rounded-2xl text-sm font-semibold focus:outline-none focus:ring-2 ring-blue-500">
                            <option value="all">Toutes les villes</option>
                            <option value="Casablanca">Casablanca</option>
                            <option value="Rabat">Rabat</option>
                            <option value="Marrakech">Marrakech</option>
                            <option value="Tangier">Tanger</option>
                            <option value="Agadir">Agadir</option>
                        </select>
                        <select id="typeFilter" onchange="filterEvents()" class="bg-white border border-slate-200 px-4 py-2.5 rounded-2xl text-sm font-semibold focus:outline-none focus:ring-2 ring-blue-500">
                            <option value="all">Tous les types</option>
                            <option value="Education">Éducation</option>
                            <option value="Environment">Environnement</option>
                            <option value="Social Help">Aide Sociale</option>
                        </select>
                        <input type="date" class="bg-white border border-slate-200 px-4 py-2 rounded-2xl text-sm font-semibold">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" id="events-grid"></div>
                </section>

                <section id="tab-profile" class="tab-content hidden animate-in fade-in duration-500">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm h-fit">
                            <div class="text-center mb-8">
                                <img id="profile-display-img" src="https://ui-avatars.com/api/?name=Yassine&background=2563eb&color=fff" class="w-24 h-24 rounded-full mx-auto border-4 border-blue-50 mb-4 shadow-xl">
                                <h3 id="profile-display-name" class="text-2xl font-bold text-slate-900">Yassine</h3>
                                <p id="profile-display-city" class="text-slate-500 font-medium flex items-center justify-center gap-1 mt-1"><i data-lucide="map-pin" class="w-4 h-4"></i> Casablanca, Maroc</p>
                            </div>
                            
                            <div class="space-y-3 mb-6">
                                <div class="bg-slate-50 p-4 rounded-2xl flex justify-between items-center border border-slate-100">
                                    <span class="text-xs font-extrabold text-slate-400 uppercase tracking-widest">Rang Ville</span>
                                    <span class="font-black text-blue-600">#2 à <span id="city-rank-label">Casablanca</span></span>
                                </div>
                                <div class="bg-slate-50 p-4 rounded-2xl flex justify-between items-center border border-slate-100">
                                    <span class="text-xs font-extrabold text-slate-400 uppercase tracking-widest">Points</span>
                                    <span class="font-black text-emerald-600">2,450 Pts</span>
                                </div>
                            </div>

                            <button onclick="toggleEditModal()" class="w-full bg-slate-900 text-white py-4 rounded-2xl font-bold flex items-center justify-center gap-2 hover:bg-blue-600 transition shadow-lg shadow-slate-200">
                                <i data-lucide="pencil" class="w-4 h-4"></i> Modifier Profil
                            </button>
                        </div>

                        <div class="lg:col-span-2">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-xl font-bold text-slate-900">Mon historique d'activité</h3>
                                <span class="text-xs font-bold text-slate-400 bg-slate-100 px-3 py-1.5 rounded-full uppercase tracking-tighter">Mis à jour aujourd'hui</span>
                            </div>
                            <div class="space-y-4" id="profile-activities-list">
                                </div>
                        </div>
                    </div>
                </section>

                <section id="tab-activities" class="tab-content hidden">
                    <div class="bg-white p-8 rounded-3xl border border-slate-100 text-center">
                         <p class="text-slate-500">Les détails de l'activité sont gérés dans l'onglet Profil.</p>
                    </div>
                </section>

                <section id="tab-rewards" class="tab-content hidden animate-in fade-in duration-500">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" id="rewards-grid">
                        </div>
                </section>

                <section id="tab-spin" class="tab-content hidden flex flex-col items-center justify-center min-h-[50vh]">
                    <div class="max-w-md w-full bg-white p-10 rounded-[3rem] shadow-2xl border border-slate-100 text-center relative overflow-hidden">
                        <h2 class="text-3xl font-extrabold mb-2">Boîte Mystère Hebdomadaire</h2>
                        <p class="text-slate-500 mb-8 font-medium">Un tirage. Une mission. Points doublés.</p>
                        <div id="mystery-box" class="w-48 h-48 mx-auto mb-10 bg-gradient-to-tr from-amber-400 to-amber-600 rounded-[2.5rem] flex items-center justify-center shadow-xl shadow-amber-200 cursor-pointer hover:scale-105 transition-transform group relative">
                            <i data-lucide="gift" class="w-20 h-20 text-white animate-bounce"></i>
                        </div>
                        <button onclick="handleSpin()" id="spin-btn" class="w-full bg-slate-900 text-white py-4 rounded-2xl font-extrabold text-lg shadow-xl hover:shadow-2xl transition-all transform active:scale-95">Ouvrir la Boîte</button>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <script>
        lucide.createIcons();

        // 1. DONNÉES CLASSEMENT (Maroc Top 20)
        const leaderboardData = [
            { name: "Sara Lemrani", xp: "8.2k", events: 52 },
            { name: "Mehdi Benani", xp: "7.1k", events: 48 },
            { name: "Inès Mansouri", xp: "6.5k", events: 41 },
            { name: "Omar Tazi", xp: "5.9k", events: 39 },
            { name: "Laila Haddad", xp: "4.2k", events: 25 },
            { name: "Vous (Yassine)", xp: "2.4k", events: 18, isMe: true },
            { name: "Driss Alami", xp: "2.1k", events: 15 },
            { name: "Sami Jabbar", xp: "1.9k", events: 14 },
            { name: "Amine Chraibi", xp: "1.7k", events: 12 },
            { name: "Nadia Belkhayat", xp: "1.5k", events: 10 },
            { name: "Zaid Filali", xp: "1.3k", events: 9 },
            { name: "Hiba Slaoui", xp: "1.1k", events: 8 },
            { name: "Walid Guedira", xp: "950", events: 7 },
            { name: "Khadija Sadiki", xp: "880", events: 6 },
            { name: "Youssef Taleb", xp: "800", events: 6 },
            { name: "Mouna Amrani", xp: "720", events: 5 },
            { name: "Reda Naciri", xp: "650", events: 4 },
            { name: "Ghita Zeroual", xp: "510", events: 3 },
            { name: "Anas El Fassi", xp: "400", events: 3 },
            { name: "Sofia Kasmi", xp: "250", events: 2 }
        ];

        const lBoard = document.getElementById('leaderboard-container');
        leaderboardData.forEach((user, index) => {
            const div = document.createElement('div');
            div.className = `flex items-center justify-between p-3 rounded-xl transition cursor-default ${user.isMe ? 'bg-blue-600 text-white shadow-md' : 'hover:bg-slate-50'}`;
            div.innerHTML = `
                <div class="flex items-center gap-3">
                    <span class="text-sm font-bold w-5 ${user.isMe ? 'text-white' : 'text-slate-400'}">${index + 1}</span>
                    <img src="https://ui-avatars.com/api/?name=${user.name.split(' ').join('+')}&background=${user.isMe ? 'fff' : 'random'}&color=${user.isMe ? '2563eb' : 'fff'}" class="w-8 h-8 rounded-full border border-white/20">
                    <div>
                        <p class="text-sm font-bold">${user.name}</p>
                        <p class="text-[10px] ${user.isMe ? 'text-blue-100' : 'text-slate-400'} font-semibold tracking-wide uppercase">${user.events} Événements</p>
                    </div>
                </div>
                <span class="text-sm font-bold ${user.isMe ? 'text-white' : 'text-blue-600'}">${user.xp} XP</span>
            `;
            lBoard.appendChild(div);
        });

        // 2. DONNÉES ÉVÉNEMENTS 
        const eventsData = [
            { id: 1, title: "Tutorat Orphelins", city: "Casablanca", type: "Education", xp: 200, joined: 4, total: 10, img: "https://images.unsplash.com/photo-1542810634-71277d95dcbb?w=500&h=300&fit=crop" },
            { id: 2, title: "Nettoyage Plage", city: "Rabat", type: "Environment", xp: 150, joined: 8, total: 20, img: "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=500&h=300&fit=crop" },
            { id: 3, title: "Distribution Repas", city: "Marrakech", type: "Social Help", xp: 300, joined: 15, total: 15, img: "https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=500&h=300&fit=crop" },
            { id: 4, title: "Plantation d'Arbres", city: "Tangier", type: "Environment", xp: 250, joined: 2, total: 30, img: "https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?w=500&h=300&fit=crop" },
            { id: 5, title: "Aide Tech Seniors", city: "Agadir", type: "Social Help", xp: 180, joined: 3, total: 5, img: "https://images.unsplash.com/photo-1581579438747-1dc8d17bbce4?w=500&h=300&fit=crop" },
            { id: 6, title: "Organisation Bibliothèque", city: "Casablanca", type: "Education", xp: 120, joined: 1, total: 4, img: "https://images.unsplash.com/photo-1521587760476-6c12a4b040da?w=500&h=300&fit=crop" }
        ];

        // 3. CONTENU MARCHÉ
        const marketplaceItems = [
            { id: 1, name: "Ticket Cinéma", points: 500, img: "https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?w=400&h=300&fit=crop", cat: "Divertissement" },
            { id: 2, name: "Starbucks 50DH", points: 800, img: "https://images.unsplash.com/photo-1544787210-2827250c9ef0?w=400&h=300&fit=crop", cat: "Alimentation" },
            { id: 3, name: "Écouteurs sans fil", points: 4500, img: "https://images.unsplash.com/photo-1590658268037-6bf12165a8df?w=400&h=300&fit=crop", cat: "Tech" },
            { id: 4, name: "Bon Train ONCF", points: 1200, img: "https://images.unsplash.com/photo-1532105956626-af001797f147?w=400&h=300&fit=crop", cat: "Voyage" },
            { id: 5, name: "Souris Gamer", points: 3200, img: "https://images.unsplash.com/photo-1527814732934-9ad91a396efd?w=400&h=300&fit=crop", cat: "Tech" },
            { id: 6, name: "Carte Amazon 10$", points: 2500, img: "https://images.unsplash.com/photo-1622547748225-3fc4abd2cca0?w=400&h=300&fit=crop", cat: "Shopping" },
            { id: 7, name: "Pass City Foot Gym", points: 2000, img: "https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=400&h=300&fit=crop", cat: "Santé" },
            { id: 8, name: "Spotify Premium (1M)", points: 900, img: "https://images.unsplash.com/photo-1614680376593-902f74cf0d41?w=400&h=300&fit=crop", cat: "Divertissement" }
        ];

        function renderMarketplace() {
            const grid = document.getElementById('rewards-grid');
            grid.innerHTML = marketplaceItems.map(item => `
                <div class="bg-white border border-slate-100 rounded-[2.5rem] overflow-hidden group hover:shadow-2xl hover:shadow-blue-100 transition-all duration-300">
                    <div class="h-40 relative overflow-hidden">
                        <img src="${item.img}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute top-3 right-3 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-[10px] font-black text-slate-900 uppercase tracking-widest shadow-sm">
                            ${item.cat}
                        </div>
                    </div>
                    <div class="p-6">
                        <h4 class="font-bold text-slate-800 mb-1 truncate">${item.name}</h4>
                        <div class="flex items-center gap-1.5 text-amber-500 mb-4">
                            <i data-lucide="coins" class="w-4 h-4"></i>
                            <span class="font-black text-sm">${item.points.toLocaleString()} Points</span>
                        </div>
                        <button onclick="redeemItem('${item.name}', ${item.points})" class="w-full bg-slate-50 text-slate-900 py-3 rounded-2xl font-bold text-sm hover:bg-blue-600 hover:text-white transition-all border border-slate-100 transform active:scale-95">
                            Échanger
                        </button>
                    </div>
                </div>
            `).join('');
            lucide.createIcons();
        }

        function redeemItem(name, cost) {
            const userPoints = 2450; 
            if (cost > userPoints) {
                alert(`Points insuffisants !\nIl vous manque ${cost - userPoints} points pour le ${name}.`);
            } else {
                confetti({ particleCount: 150, spread: 70, origin: { y: 0.6 } });
                alert(`Succès ! Votre coupon pour ${name} a été envoyé à votre adresse e-mail.`);
            }
        }

        // 4. DONNÉES MON HISTORIQUE 
        const myActivityHistory = [
            { title: "Peinture Murale Ancienne Ville", status: "À venir", date: "15 Jan, 2026", points: 300, icon: "palette" },
            { title: "Distribution Paniers Repas", status: "Terminé", date: "20 Déc, 2025", points: 450, icon: "heart" },
            { title: "Atelier Recyclage", status: "Terminé", date: "05 Déc, 2025", points: 200, icon: "recycle" }
        ];

        function renderEvents(filteredData) {
            const grid = document.getElementById('events-grid');
            grid.innerHTML = '';
            filteredData.forEach(ev => {
                const card = document.createElement('div');
                card.className = "bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl transition-all group";
                card.innerHTML = `
                    <div class="h-48 relative overflow-hidden">
                        <img src="${ev.img}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-blue-600 shadow-sm uppercase tracking-wide">${ev.type}</div>
                        <div class="absolute bottom-4 left-4 flex gap-1"><span class="bg-emerald-500 text-white text-[10px] font-bold px-2 py-1 rounded-md">+${ev.xp} XP</span></div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-bold text-slate-800">${ev.title}</h3>
                            <div class="flex items-center gap-1 text-slate-400 text-sm"><i data-lucide="map-pin" class="w-4 h-4"></i> ${ev.city}</div>
                        </div>
                        <p class="text-slate-500 text-sm mb-6">Donnez de votre temps pour impacter les vies à ${ev.city}.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-400 flex items-center gap-1"><i data-lucide="users" class="w-3.5 h-3.5"></i> ${ev.joined}/${ev.total} inscrits</span>
                            <button onclick="handleJoin(this)" class="join-btn bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-2xl font-bold transition-all transform active:scale-95 shadow-md shadow-blue-100">Participer</button>
                        </div>
                    </div>
                `;
                grid.appendChild(card);
            });
            lucide.createIcons();
        }

        function filterEvents() {
            const city = document.getElementById('cityFilter').value;
            const type = document.getElementById('typeFilter').value;
            const filtered = eventsData.filter(ev => {
                const cityMatch = city === 'all' || ev.city === city;
                const typeMatch = type === 'all' || ev.type === type;
                return cityMatch && typeMatch;
            });
            renderEvents(filtered);
        }

        function handleJoin(btn) {
            if (btn.innerText === "Participer") {
                btn.innerText = "Annuler";
                btn.classList.replace('bg-blue-600', 'bg-red-500');
                btn.classList.replace('hover:bg-blue-700', 'hover:bg-red-600');
            } else {
                btn.innerText = "Participer";
                btn.classList.replace('bg-red-500', 'bg-blue-600');
                btn.classList.replace('hover:bg-red-600', 'hover:bg-blue-700');
            }
        }

        function renderProfileActivities() {
            const list = document.getElementById('profile-activities-list');
            list.innerHTML = myActivityHistory.map(act => `
                <div class="bg-white p-5 rounded-3xl border border-slate-100 flex items-center justify-between group hover:border-blue-200 transition-all">
                    <div class="flex items-center gap-4">
                        <div class="${act.status === 'Terminé' ? 'bg-emerald-50 text-emerald-600' : 'bg-blue-50 text-blue-600'} w-12 h-12 rounded-2xl flex items-center justify-center">
                            <i data-lucide="${act.status === 'Terminé' ? 'check-circle' : 'clock'}" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800">${act.title}</h4>
                            <p class="text-xs font-bold uppercase tracking-widest ${act.status === 'Terminé' ? 'text-emerald-500' : 'text-blue-500'}">
                                ${act.status} • ${act.date}
                            </p>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="text-lg font-black text-slate-700">+${act.points} Pts</span>
                    </div>
                </div>
            `).join('');
            lucide.createIcons();
        }

        function toggleEditModal() {
            const modal = document.getElementById('edit-modal');
            modal.classList.toggle('hidden');
            modal.classList.toggle('active');
            document.getElementById('edit-name-input').value = document.getElementById('profile-display-name').innerText;
        }

        function saveProfileChanges() {
            const newName = document.getElementById('edit-name-input').value;
            const newCity = document.getElementById('edit-city-input').value;
            
            if(newName) {
                document.getElementById('profile-display-name').innerText = newName;
                document.getElementById('header-name').innerText = newName;
                document.getElementById('profile-display-img').src = `https://ui-avatars.com/api/?name=${newName.replace(' ', '+')}&background=2563eb&color=fff`;
            }
            if(newCity) {
                document.getElementById('profile-display-city').innerHTML = `<i data-lucide="map-pin" class="w-4 h-4"></i> ${newCity}, Maroc`;
                document.getElementById('city-rank-label').innerText = newCity;
            }
            toggleEditModal();
            lucide.createIcons();
        }

        // Rendus Initiaux
        renderEvents(eventsData);
        renderProfileActivities();
        renderMarketplace();

        // ROUTAGE
        function showTab(tabName) {
            document.querySelectorAll('.tab-content').forEach(tab => tab.classList.add('hidden'));
            document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active-nav'));
            document.getElementById('tab-' + tabName).classList.remove('hidden');
            document.getElementById('nav-' + tabName).classList.add('active-nav');
            const titles = { 'home': 'Vue d\'ensemble', 'events': 'Opportunités de Bénévolat', 'activities': 'Mon Historique d\'Impact', 'rewards': 'Marché de l\'Impact', 'spin': 'Récompenses Ludiques', 'profile': 'Mon Profil' };
            document.getElementById('tab-title').innerText = titles[tabName];
        }

        function handleSpin() {
            const btn = document.getElementById('spin-btn');
            const box = document.getElementById('mystery-box');
            btn.disabled = true;
            btn.innerText = "Ouverture...";
            box.classList.add('scale-110', 'rotate-12');
            setTimeout(() => {
                confetti({ particleCount: 200, spread: 80, origin: { y: 0.6 }, colors: ['#3b82f6', '#10b981', '#fbbf24'] });
                box.innerHTML = `<div class='text-white text-center'><i data-lucide='zap' class='w-12 h-12 mx-auto mb-2'></i><p class='font-bold leading-tight'>Nettoyage Plage Rabat</p><p class='text-xs mt-1 text-amber-200'>XP X2 ACTIVÉ</p></div>`;
                lucide.createIcons();
                btn.innerText = "Accepté !";
                btn.classList.replace('bg-slate-900', 'bg-emerald-500');
            }, 1500);
        }
    </script>
</body>
</html>