<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<!-- <h2>Home</h2>
<p>Welcome to the home page.</p> -->

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>



<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>actTogether | Impact the Future</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Plus+Jakarta+Sans', sans-serif;
        }

        .gradient-text {
            background: linear-gradient(135deg, #3b82f6 0%, #10b981 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .glass-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(229, 231, 235, 0.5);
        }

        /* Partners Slider Animation */
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-scroll {
            display: flex;
            width: calc(250px * 10);
            animation: scroll 30s linear infinite;
        }
        .animate-scroll:hover {
            animation-play-state: paused;
        }

        .hero-pattern {
            background-color: #ffffff;
            background-image: radial-gradient(#3b82f6 0.5px, transparent 0.5px), radial-gradient(#3b82f6 0.5px, #ffffff 0.5px);
            background-size: 20px 20px;
            background-position: 0 0, 10px 10px;
            opacity: 0.05;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900">

    <nav class="fixed top-0 w-full z-50 glass-nav">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center">
                    <i data-lucide="layers" class="text-white w-6 h-6"></i>
                </div>
                <span class="text-2xl font-bold tracking-tight text-slate-800">act<span class="text-blue-600">Together</span></span>
            </div>
            
            <div class="hidden md:flex items-center space-x-8">
                <a href="#about" class="text-sm font-medium hover:text-blue-600 transition-colors">About Us</a>
                <a href="#partners" class="text-sm font-medium hover:text-blue-600 transition-colors">Partners</a>
                <a href="#categories" class="text-sm font-medium hover:text-blue-600 transition-colors">Categories</a>
                <a href="#testimonials" class="text-sm font-medium hover:text-blue-600 transition-colors">Testimonials</a>
                <a href="#contact" class="text-sm font-medium hover:text-blue-600 transition-colors">Contact</a>
                <button onclick="handleLogin()" class="bg-slate-900 text-white px-6 py-2.5 rounded-full font-semibold text-sm hover:bg-blue-600 transition-all transform hover:scale-105 active:scale-95 shadow-lg shadow-blue-900/10">
                    Login
                </button>
            </div>
        </div>
    </nav>

    <header class="relative pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0 hero-pattern -z-10"></div>
        <div class="max-w-7xl mx-auto px-6 text-center">
            <span class="inline-block py-1 px-4 rounded-full bg-blue-50 text-blue-600 text-xs font-bold uppercase tracking-widest mb-6">Empowering Moroccan Youth</span>
            <h1 class="text-5xl md:text-7xl font-extrabold mb-6 leading-tight">
                Turn Kindness into <br><span class="gradient-text">Real World Impact.</span>
            </h1>
            <p class="text-slate-600 text-lg max-w-2xl mx-auto mb-10">
                The first Moroccan gamified volunteering platform where your time changes lives and your dedication earns you rewards.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <button onclick="handleLogin()" class="px-8 py-4 bg-blue-600 text-white rounded-2xl font-bold shadow-xl shadow-blue-200 hover:bg-blue-700 transition-all">Start Volunteering</button>
                <button class="px-8 py-4 bg-white border border-slate-200 text-slate-700 rounded-2xl font-bold hover:bg-slate-50 transition-all">How it works</button>
            </div>
        </div>
    </header>

    <section id="about" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-3xl font-bold mb-6">Rewriting the Story of <br>Social Impact</h2>
                    <p class="text-slate-600 text-lg leading-relaxed mb-6">
                        In Morocco, the spirit of "Touiza" and community help is in our DNA. **actTogether** modernizes this tradition for the digital age. We bridge the gap between enthusiastic young volunteers, impactful NGOs, and socially responsible companies.
                    </p>
                    <div class="space-y-4 mb-8">
                        <div class="flex items-start space-x-4">
                            <div class="mt-1 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                                <i data-lucide="check" class="text-green-600 w-4 h-4"></i>
                            </div>
                            <p class="text-slate-700 font-medium">Earn <span class="text-blue-600">ImpactPoints</span> for every hour you volunteer.</p>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="mt-1 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                                <i data-lucide="check" class="text-green-600 w-4 h-4"></i>
                            </div>
                            <p class="text-slate-700 font-medium">Redeem points for rewards from our corporate sponsors.</p>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="mt-1 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                                <i data-lucide="check" class="text-green-600 w-4 h-4"></i>
                            </div>
                            <p class="text-slate-700 font-medium">Build a verified portfolio of your social contributions.</p>
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <div class="h-48 bg-slate-100 rounded-3xl overflow-hidden relative group">
                            <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?auto=format&fit=crop&q=80&w=400" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-500" alt="Orphanage">
                            <div class="absolute bottom-4 left-4 bg-white/90 px-3 py-1 rounded-full text-xs font-bold">Dar Al Aytam</div>
                        </div>
                        <div class="h-64 bg-slate-100 rounded-3xl overflow-hidden relative group">
                            <img src="https://images.unsplash.com/photo-1617155093730-a8bf47be792d?auto=format&fit=crop&q=80&w=400" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-500" alt="Beach Cleaning">
                            <div class="absolute bottom-4 left-4 bg-white/90 px-3 py-1 rounded-full text-xs font-bold">Beach Cleaning</div>
                        </div>
                    </div>
                    <div class="space-y-4 pt-12">
                        <div class="h-64 bg-slate-100 rounded-3xl overflow-hidden relative group">
                            <img src="https://images.unsplash.com/photo-1516627145497-ae6968895b74?auto=format&fit=crop&q=80&w=400" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-500" alt="Elderly Care">
                            <div class="absolute bottom-4 left-4 bg-white/90 px-3 py-1 rounded-full text-xs font-bold">Dar Al Moussinine</div>
                        </div>
                        <div class="h-48 bg-slate-100 rounded-3xl overflow-hidden relative group">
                            <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&q=80&w=400" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-500" alt="Environment">
                            <div class="absolute bottom-4 left-4 bg-white/90 px-3 py-1 rounded-full text-xs font-bold">Green Actions</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="partners" class="py-16 bg-slate-50 border-y border-slate-100 overflow-hidden">
        <div class="text-center mb-10">
            <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest">Our partners support social impact & youth engagement</h3>
        </div>
        <div class="relative">
            <div class="animate-scroll">
                <div class="flex items-center space-x-12 px-6">
                    <div class="flex items-center space-x-3 grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all">
                        <div class="w-12 h-12 bg-slate-200 rounded-lg"></div><span class="font-bold text-xl text-slate-400">MarocTelecom</span>
                    </div>
                    <div class="flex items-center space-x-3 grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all">
                        <div class="w-12 h-12 bg-slate-200 rounded-lg"></div><span class="font-bold text-xl text-slate-400">OCP Group</span>
                    </div>
                    <div class="flex items-center space-x-3 grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all">
                        <div class="w-12 h-12 bg-slate-200 rounded-lg"></div><span class="font-bold text-xl text-slate-400">AttijariWafa</span>
                    </div>
                    <div class="flex items-center space-x-3 grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all">
                        <div class="w-12 h-12 bg-slate-200 rounded-lg"></div><span class="font-bold text-xl text-slate-400">CMA CGM</span>
                    </div>
                    <div class="flex items-center space-x-3 grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all">
                        <div class="w-12 h-12 bg-slate-200 rounded-lg"></div><span class="font-bold text-xl text-slate-400">BankAlMaghrib</span>
                    </div>
                </div>
                <div class="flex items-center space-x-12 px-6">
                    <div class="flex items-center space-x-3 grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all">
                        <div class="w-12 h-12 bg-slate-200 rounded-lg"></div><span class="font-bold text-xl text-slate-400">MarocTelecom</span>
                    </div>
                    <div class="flex items-center space-x-3 grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all">
                        <div class="w-12 h-12 bg-slate-200 rounded-lg"></div><span class="font-bold text-xl text-slate-400">OCP Group</span>
                    </div>
                    <div class="flex items-center space-x-3 grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all">
                        <div class="w-12 h-12 bg-slate-200 rounded-lg"></div><span class="font-bold text-xl text-slate-400">AttijariWafa</span>
                    </div>
                    <div class="flex items-center space-x-3 grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all">
                        <div class="w-12 h-12 bg-slate-200 rounded-lg"></div><span class="font-bold text-xl text-slate-400">CMA CGM</span>
                    </div>
                    <div class="flex items-center space-x-3 grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all">
                        <div class="w-12 h-12 bg-slate-200 rounded-lg"></div><span class="font-bold text-xl text-slate-400">BankAlMaghrib</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="categories" class="py-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold mb-4">Choose Your Cause</h2>
                <p class="text-slate-500">Find the impact area that resonates with you most.</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div onclick="handleLogin()" class="group bg-white p-8 rounded-3xl border border-slate-100 hover:border-blue-200 transition-all hover:shadow-2xl hover:shadow-blue-900/5 cursor-pointer">
                    <div class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i data-lucide="leaf" class="text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Environment</h3>
                    <p class="text-slate-500 mb-6">From reforestation to beach cleanups, protect Morocco's natural beauty.</p>
                    <button class="text-blue-600 font-bold text-sm flex items-center space-x-2">
                        <span>View Events</span> <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </button>
                </div>

                <div onclick="handleLogin()" class="group bg-white p-8 rounded-3xl border border-slate-100 hover:border-blue-200 transition-all hover:shadow-2xl hover:shadow-blue-900/5 cursor-pointer">
                    <div class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i data-lucide="heart" class="text-orange-600"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Orphanages</h3>
                    <p class="text-slate-500 mb-6">Support children in need through tutoring, activities, and companionship.</p>
                    <button class="text-blue-600 font-bold text-sm flex items-center space-x-2">
                        <span>View Events</span> <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </button>
                </div>

                <div onclick="handleLogin()" class="group bg-white p-8 rounded-3xl border border-slate-100 hover:border-blue-200 transition-all hover:shadow-2xl hover:shadow-blue-900/5 cursor-pointer">
                    <div class="w-14 h-14 bg-purple-50 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i data-lucide="user-plus" class="text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Elderly Care</h3>
                    <p class="text-slate-500 mb-6">Spend time with our elders, share stories, and provide essential assistance.</p>
                    <button class="text-blue-600 font-bold text-sm flex items-center space-x-2">
                        <span>View Events</span> <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </button>
                </div>

                <div onclick="handleLogin()" class="group bg-white p-8 rounded-3xl border border-slate-100 hover:border-blue-200 transition-all hover:shadow-2xl hover:shadow-blue-900/5 cursor-pointer">
                    <div class="w-14 h-14 bg-red-50 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i data-lucide="dog" class="text-red-600"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Animals</h3>
                    <p class="text-slate-500 mb-6">Help local shelters care for abandoned animals and promote adoption.</p>
                    <button class="text-blue-600 font-bold text-sm flex items-center space-x-2">
                        <span>View Events</span> <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </button>
                </div>

                <div onclick="handleLogin()" class="group bg-white p-8 rounded-3xl border border-slate-100 hover:border-blue-200 transition-all hover:shadow-2xl hover:shadow-blue-900/5 cursor-pointer">
                    <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i data-lucide="book-open" class="text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Education</h3>
                    <p class="text-slate-500 mb-6">Empower the next generation through language labs and digital literacy.</p>
                    <button class="text-blue-600 font-bold text-sm flex items-center space-x-2">
                        <span>View Events</span> <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </button>
                </div>

                <div class="bg-blue-600 p-8 rounded-3xl text-white flex flex-col justify-center">
                    <h3 class="text-2xl font-bold mb-4">Win Points, Save Lives</h3>
                    <p class="text-blue-100 mb-6">Every contribution is rewarded. Join 2,000+ volunteers today.</p>
                    <button onclick="handleLogin()" class="w-full bg-white text-blue-600 py-3 rounded-xl font-bold hover:bg-blue-50 transition-colors">Join actTogether</button>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials" class="py-24 bg-slate-900 text-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-16">Community Voices</h2>
            
            <div class="relative max-w-4xl mx-auto h-[300px]" id="testimonial-container">
                <div class="testimonial-slide absolute inset-0 opacity-0 transition-all duration-700 transform translate-y-4">
                    <div class="bg-slate-800 p-10 rounded-3xl border border-slate-700">
                        <i data-lucide="quote" class="text-blue-500 w-10 h-10 mb-6"></i>
                        <p class="text-xl italic mb-8">"I started volunteering to help my community, but the points system actually helped me get my first laptop through the OCP reward program. It's a win-win!"</p>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">SY</div>
                            <div>
                                <h4 class="font-bold">Saad Yassine</h4>
                                <p class="text-slate-400 text-sm">Volunteer since 2024</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="testimonial-slide absolute inset-0 opacity-0 transition-all duration-700 transform translate-y-4">
                    <div class="bg-slate-800 p-10 rounded-3xl border border-slate-700">
                        <i data-lucide="quote" class="text-blue-500 w-10 h-10 mb-6"></i>
                        <p class="text-xl italic mb-8">"The community feeling on actTogether is amazing. We aren't just names on a list; we are a movement changing the face of Morocco."</p>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center font-bold">LB</div>
                            <div>
                                <h4 class="font-bold">Layla Bennani</h4>
                                <p class="text-slate-400 text-sm">NGO Coordinator</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="testimonial-slide absolute inset-0 opacity-0 transition-all duration-700 transform translate-y-4">
                    <div class="bg-slate-800 p-10 rounded-3xl border border-slate-700">
                        <i data-lucide="quote" class="text-blue-500 w-10 h-10 mb-6"></i>
                        <p class="text-xl italic mb-8">"Being able to verify my social impact hours helped me tremendously during my university applications abroad. It's more than just volunteering."</p>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 rounded-full bg-green-100 text-green-600 flex items-center justify-center font-bold">AK</div>
                            <div>
                                <h4 class="font-bold">Amine Karim</h4>
                                <p class="text-slate-400 text-sm">Student Volunteer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="contact" class="bg-white border-t border-slate-100 pt-20 pb-10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-12 mb-16">
                <div class="col-span-2">
                    <div class="flex items-center space-x-2 mb-6">
                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                            <i data-lucide="layers" class="text-white w-5 h-5"></i>
                        </div>
                        <span class="text-xl font-bold tracking-tight">actTogether</span>
                    </div>
                    <p class="text-slate-500 max-w-xs mb-8">
                        The leading Moroccan platform for youth-led social change. Connect, volunteer, and get rewarded.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-slate-50 rounded-full flex items-center justify-center text-slate-400 hover:text-blue-600 transition-colors"><i data-lucide="instagram"></i></a>
                        <a href="#" class="w-10 h-10 bg-slate-50 rounded-full flex items-center justify-center text-slate-400 hover:text-blue-600 transition-colors"><i data-lucide="linkedin"></i></a>
                        <a href="#" class="w-10 h-10 bg-slate-50 rounded-full flex items-center justify-center text-slate-400 hover:text-blue-600 transition-colors"><i data-lucide="twitter"></i></a>
                    </div>
                </div>
                
                <div>
                    <h4 class="font-bold mb-6">Quick Links</h4>
                    <ul class="space-y-4 text-slate-500 text-sm">
                        <li><a href="#about" class="hover:text-blue-600">Our Story</a></li>
                        <li><a href="#categories" class="hover:text-blue-600">Browse Events</a></li>
                        <li><a href="#" class="hover:text-blue-600">NGO Partnership</a></li>
                        <li><a href="#" class="hover:text-blue-600">Company Portal</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-6">Contact Us</h4>
                    <ul class="space-y-4 text-slate-500 text-sm">
                        <li class="flex items-center space-x-3">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                            <span>hello@acttogether.ma</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i data-lucide="phone" class="w-4 h-4"></i>
                            <span>+212 522 00 00 00</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i data-lucide="map-pin" class="w-4 h-4"></i>
                            <span>Casablanca, Morocco</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-slate-100 pt-8 flex flex-col md:row justify-between items-center text-slate-400 text-xs">
                <p>&copy; 2024 actTogether Platform. Built for Social Impact.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Initialize Lucide Icons
        lucide.createIcons();

        // Simulate Login/Redirect Behavior
        function handleLogin() {
            // Mock behavior: console log then redirect
            console.log("Redirecting to login...");
            // In a real hackathon environment, this page would exist:
            // window.location.href = 'login.html';
            alert("Redirecting to login.html (Mock)");
        }

        // Testimonial Slider Logic
        let currentSlide = 0;
        const slides = document.querySelectorAll('.testimonial-slide');

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.style.opacity = '0';
                slide.style.transform = 'translateY(20px)';
                slide.style.pointerEvents = 'none';
                if (i === index) {
                    slide.style.opacity = '1';
                    slide.style.transform = 'translateY(0)';
                    slide.style.pointerEvents = 'auto';
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        // Auto-animate testimonials
        showSlide(0);
        setInterval(nextSlide, 5000);

        // Smooth Scroll Enhancement (Native browser support is usually enough, 
        // but we can ensure offset for the fixed navbar)
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                const navHeight = 80;
                
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - navHeight,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('shadow-lg');
            } else {
                nav.classList.remove('shadow-lg');
            }
        });
    </script>
</body>
</html>
