<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
      x-data="{ 
        darkMode: localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),
        primaryColor: localStorage.getItem('primaryColor') || '#8b5cf6',
        textColor: localStorage.getItem('textColor') || '#ffffff',
        mobileMenu: false,
        scrolled: false,
        toggleDarkMode() {
            this.darkMode = !this.darkMode;
            localStorage.setItem('theme', this.darkMode ? 'dark' : 'light');
        },
        setPrimaryColor(color) {
            this.primaryColor = color;
            localStorage.setItem('primaryColor', color);
            document.documentElement.style.setProperty('--primary', color);
            // Dynamic RGB for glow effects
            const hexToRgb = hex => hex.replace(/^#?([a-f\d])([a-f\d])([a-f\d])$/i,(m, r, g, b) => '#' + r + r + g + g + b + b).substring(1).match(/.{2}/g).map(x => parseInt(x, 16)).join(', ');
            document.documentElement.style.setProperty('--primary-rgb', hexToRgb(color));
        },
        init() {
            this.setPrimaryColor(this.primaryColor);
            
            // Wait for DOM to be ready for stars
            this.$nextTick(() => {
                const container = document.querySelector('.stars-container');
                if (container) {
                    for (let i = 0; i < 150; i++) {
                        const star = document.createElement('div');
                        star.className = 'star';
                        const size = Math.random() * 2;
                        star.style.width = size + 'px';
                        star.style.height = size + 'px';
                        star.style.left = Math.random() * 100 + '%';
                        star.style.top = Math.random() * 100 + '%';
                        star.style.setProperty('--duration', (Math.random() * 3 + 2) + 's');
                        star.style.animationDelay = Math.random() * 5 + 's';
                        container.appendChild(star);
                    }
                }
            });
        }
      }"
      :class="{ 'dark': darkMode }"
      @scroll.window="scrolled = (window.pageYOffset > 20)">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sagun Mishra - Portfolio</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Portfolio of Sagun Mishra, a passionate Software Developer specializing in PHP & Laravel.">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: 'var(--primary)',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        outfit: ['Outfit', 'sans-serif'],
                    },
                    animation: {
                        'bounce-slow': 'bounce 3s infinite',
                    }
                }
            }
        }
    </script>

    <style>
        :root {
            --primary: #8b5cf6;
            --primary-rgb: 139, 92, 246;
            --bg-main: #f8fafc;
            --text-heading: #0f172a;
            --text-body: #334155;
            --text-secondary: #64748b;
            --card-bg: #ffffff;
            --card-border: rgba(0, 0, 0, 0.05);
            --card-shadow: 0 10px 25px rgba(0,0,0,0.08);
            --icon-bg: linear-gradient(135deg, #eef2ff, #e0f2fe);
            --input-bg: #ffffff;
            --input-placeholder: #94a3b8;
        }
        .dark {
            --bg-main: #05070d;
            --text-heading: #ffffff;
            --text-body: #a0a8b8;
            --text-secondary: #64748b;
            --card-bg: rgba(255, 255, 255, 0.03);
            --card-border: rgba(255, 255, 255, 0.08);
            --card-shadow: 0 8px 32px 0 rgba(0,0,0,0.8);
            --icon-bg: rgba(255, 255, 255, 0.05);
            --input-bg: #0f172a;
            --input-placeholder: #64748b;
        }
        body {
            background-color: var(--bg-main);
            color: var(--text-body);
            transition: background-color 0.5s ease, color 0.5s ease;
            font-family: 'Inter', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            color: var(--text-heading);
            font-family: 'Outfit', sans-serif;
        }
        [x-cloak] { display: none !important; }
        
        .glass {
            background-color: var(--card-bg);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid var(--card-border);
            box-shadow: var(--card-shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }
        .glass:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
            border-color: var(--primary);
        }
        .dark .glass:hover {
            box-shadow: 0 0 30px rgba(var(--primary-rgb), 0.2);
        }
        
        .icon-box {
            background: var(--icon-bg);
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
            transition: all 0.3s ease;
        }
        .group:hover .icon-box {
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(var(--primary-rgb), 0.3);
        }
        .nav-scrolled {
            background-color: var(--bg-main);
            opacity: 0.95;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--card-border);
        }
        .btn-primary {
            background: linear-gradient(to right, #9333ea, #2563eb);
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 0.75rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-size: 10px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            box-shadow: 0 0 20px rgba(var(--primary-rgb), 0.2);
        }
        .btn-primary:hover {
            transform: scale(1.05);
            box-shadow: 0 0 30px rgba(var(--primary-rgb), 0.4);
        }
        .section-title {
            font-size: clamp(2rem, 5vw, 3rem);
            font-weight: 800;
            margin-bottom: 3rem;
            display: block;
            width: 100%;
            text-align: center;
            letter-spacing: -0.02em;
            background: linear-gradient(90deg, #8b5cf6, #3b82f6, #06b6d4);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            transition: all 0.5s ease;
        }
        .dark .section-title {
            filter: drop-shadow(0 0 10px rgba(139, 92, 246, 0.3));
        }
        .gradient-text {
            background: linear-gradient(to bottom right, var(--text-heading), var(--text-heading) 60%, rgba(var(--primary-rgb), 0.4));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            padding-right: 0.1em;
            display: inline-block;
        }
        .accent-title-gradient {
            background: linear-gradient(90deg, #8b5cf6, #3b82f6, #06b6d4);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            padding-right: 0.15em;
            display: inline-block;
        }
        .accent-gradient {
            background: linear-gradient(to right, #a855f7, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Stars */
        .stars-container {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: -1;
            overflow: hidden;
            transition: opacity 1s ease;
        }
        .dark .stars-container { background: #05070d; opacity: 1; }
        .light .stars-container { background: var(--bg-main); opacity: 0.5; }
        
        .star {
            position: absolute;
            background: white;
            border-radius: 50%;
            opacity: 0.3;
            animation: twinkle var(--duration) infinite ease-in-out;
        }
        @keyframes twinkle {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.2); }
        }

        /* Nebula */
        .nebula {
            position: fixed;
            width: 60vw;
            height: 60vw;
            border-radius: 50%;
            filter: blur(120px);
            opacity: 0.15;
            z-index: -1;
            pointer-events: none;
            animation: drift 20s infinite alternate ease-in-out;
            transition: opacity 1s ease;
        }
        .light .nebula { opacity: 0.05; }
        @keyframes drift {
            from { transform: translate(-10%, -10%); }
            to { transform: translate(10%, 10%); }
        }
    </style>
</head>
<body class="antialiased overflow-x-hidden">

    <!-- Preloader -->
    <div id="preloader" class="fixed inset-0 z-[100] bg-[#05070d] flex flex-col items-center justify-center transition-opacity duration-700">
        <div class="loader-content text-center relative px-4">
            <div class="w-16 h-16 md:w-20 md:h-20 border-4 border-primary/20 border-t-primary rounded-full animate-spin mx-auto mb-6"></div>
            <h2 class="text-xl md:text-3xl font-black text-white tracking-widest md:tracking-[0.2em] animate-pulse">SAGUN MISHRA</h2>
            <p class="text-primary/60 text-[10px] md:text-xs font-mono mt-2 uppercase tracking-widest">Loading Portfolio...</p>
        </div>
    </div>

    <!-- Futuristic Background Elements -->
    <div class="stars-container"></div>
    <div class="nebula bg-purple-600 top-[-10%] left-[-10%]"></div>
    <div class="nebula bg-blue-600 bottom-[-10%] right-[-10%]" style="animation-delay: -10s;"></div>

    <!-- Sticky Navbar -->
    <nav class="fixed top-0 w-full z-50 transition-all duration-500" 
         :class="scrolled ? 'nav-scrolled py-4 border-b border-[var(--card-border)]' : 'py-8 bg-transparent'">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="#" class="text-3xl font-black font-outfit tracking-tighter group">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-blue-500 uppercase">S</span>agun<span class="text-blue-500"></span> <span class="bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-blue-500 uppercase">M</span>ishra<span class="text-blue-500">.</span>
            </a>
            
            <div class="hidden md:flex space-x-12 items-center font-bold text-[11px] uppercase tracking-[0.2em]">
                <a href="#home" class="hover:text-purple-400 transition-colors py-2 relative group">
                    Home
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-purple-400 to-blue-400 transition-all group-hover:w-full"></span>
                </a>
                <a href="#about" class="hover:text-purple-400 transition-colors py-2 relative group">
                    About
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-purple-400 to-blue-400 transition-all group-hover:w-full"></span>
                </a>
                <a href="#skills" class="hover:text-purple-400 transition-colors py-2 relative group">
                    Skills
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-purple-400 to-blue-400 transition-all group-hover:w-full"></span>
                </a>
                <a href="#projects" class="hover:text-purple-400 transition-colors py-2 relative group">
                    Projects
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-purple-400 to-blue-400 transition-all group-hover:w-full"></span>
                </a>
                
                <a href="#experience" class="hover:text-purple-400 transition-colors py-2 relative group">
                   Education & Experience
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-purple-400 to-blue-400 transition-all group-hover:w-full"></span>
                </a>
                <a href="#contact" class="hover:text-purple-400 transition-colors py-2 relative group">
                    Contact
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-purple-400 to-blue-400 transition-all group-hover:w-full"></span>
                </a>

                <!-- Theme Toggle -->
                <button @click="toggleDarkMode()" 
                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-[var(--card-bg)] border border-[var(--card-border)] hover:scale-110 transition-all duration-300 shadow-sm"
                        aria-label="Toggle Theme">
                    <i class="fas text-primary transition-transform duration-500" :class="darkMode ? 'fa-sun rotate-180' : 'fa-moon'"></i>
                </button>
                
                <!-- Magic Customizer -->
                <div class="relative group ml-4">
                    <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-[var(--card-bg)] border border-[var(--card-border)] hover:bg-primary/10 transition-all shadow-sm">
                        <i class="fas fa-wand-magic-sparkles text-primary"></i>
                    </button>
                    <div class="absolute right-0 top-full mt-4 invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-all duration-300 translate-y-2 group-hover:translate-y-0 min-w-[220px]">
                        <div class="glass p-6 rounded-2xl shadow-2xl space-y-6">
                            <div>
                                <p class="text-[9px] uppercase font-black mb-4 tracking-[0.2em] text-slate-400">Core Accent</p>
                                <div class="grid grid-cols-4 gap-3">
                                    <template x-for="color in ['#8b5cf6', '#3b82f6', '#ec4899', '#10b981', '#f59e0b', '#ef4444', '#06b6d4', '#ffffff']">
                                        <button @click="setPrimaryColor(color)" 
                                                class="w-8 h-8 rounded-lg transition-all hover:scale-125 border-2 border-white/5 shadow-lg"
                                                :class="primaryColor === color ? 'scale-125 border-white ring-4 ring-white/10' : ''"
                                                :style="`background-color: ${color}`"></button>
                                    </template>
                                </div>
                            </div>
                            
                            <!-- Text Color Option -->
                            <div class="pt-4 border-t border-[var(--card-border)]">
                                <p class="text-[9px] uppercase font-black mb-4 tracking-[0.2em] text-slate-400">UI Text Contrast</p>
                                <div class="flex gap-4">
                                    <button @click="darkMode = true; localStorage.setItem('theme', 'dark')" 
                                            class="flex-1 py-3 text-[9px] font-black uppercase rounded-lg border border-[var(--card-border)] bg-slate-900 text-white hover:bg-slate-800 transition-all flex flex-col items-center gap-1">
                                        <i class="fas fa-moon text-blue-400"></i>
                                        <span>High Dark</span>
                                    </button>
                                    <button @click="darkMode = false; localStorage.setItem('theme', 'light')" 
                                            class="flex-1 py-3 text-[9px] font-black uppercase rounded-lg border border-[var(--card-border)] bg-white text-slate-900 hover:bg-slate-50 transition-all flex flex-col items-center gap-1">
                                        <i class="fas fa-sun text-amber-500"></i>
                                        <span>Soft Light</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="md:hidden w-10 h-10 flex items-center justify-center rounded-xl glass" @click="mobileMenu = !mobileMenu">
                <i class="fas fa-bars transform transition-transform" :class="mobileMenu ? 'rotate-90' : ''"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenu" 
             x-cloak
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             class="md:hidden glass mt-2 mx-4 rounded-3xl overflow-hidden shadow-2xl">
            <div class="flex flex-col p-6 space-y-4 text-center font-bold">
                <a href="#home" @click="mobileMenu = false" class="hover:text-primary">Home</a>
                <a href="#about" @click="mobileMenu = false" class="hover:text-primary">About</a>
                <a href="#skills" @click="mobileMenu = false" class="hover:text-primary">Skills</a>
                <a href="#projects" @click="mobileMenu = false" class="hover:text-primary">Projects</a>
                <a href="#education" @click="mobileMenu = false" class="hover:text-primary">Education</a>
                <a href="#experience" @click="mobileMenu = false" class="hover:text-primary">Experience</a>
                <a href="#contact" @click="mobileMenu = false" class="hover:text-primary">Contact</a>
                <div class="flex justify-center space-x-6 pt-4 border-t border-[var(--card-border)]">
                    <button @click="toggleDarkMode()" class="w-12 h-12 flex items-center justify-center rounded-2xl glass text-xl">
                        <i class="fas transition-transform duration-500" :class="darkMode ? 'fa-sun rotate-180' : 'fa-moon'"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/918423414885?text=Hi%20Sagun,%20I%20visited%20your%20portfolio%20and%20interested%20in%20work." 
       target="_blank"
       class="fixed bottom-8 right-8 z-[60] flex items-center gap-3 transition-transform hover:scale-110 group">
        <span class="bg-white text-slate-900 px-4 py-2 rounded-full font-bold text-xs shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none origin-right">
            Get in Touch
        </span>
        <div class="w-14 h-14 bg-[#25D366] rounded-full flex items-center justify-center text-white text-3xl shadow-[0_4px_14px_rgba(37,211,102,0.4)] animate-bounce-slow">
            <i class="fab fa-whatsapp"></i>
        </div>
    </a>

    <!-- Scroll to Top -->
    <button 
        x-data="{ show: false }" 
        @scroll.window="show = (window.pageYOffset > 500)"
        x-show="show"
        x-transition
        @click="window.scrollTo({top: 0, behavior: 'smooth'})"
        class="fixed bottom-28 right-9 z-50 w-10 h-10 glass rounded-full flex items-center justify-center text-primary shadow-xl hover:bg-primary hover:text-white transition-all scale-100 active:scale-90"
    >
        <i class="fas fa-chevron-up"></i>
    </button>

    <footer class="py-16 border-t border-[var(--card-border)] relative overflow-hidden">
        <div class="absolute inset-0 bg-primary/5 -skew-y-3 transform origin-right"></div>
        <div class="container mx-auto px-6 text-center relative z-10">
            <div class="flex justify-center gap-6 mb-10">
                <a href="https://www.linkedin.com/in/sagun-mishra-985089321" target="_blank" class="w-12 h-12 glass rounded-2xl flex items-center justify-center text-xl text-[var(--text-secondary)] hover:text-primary hover:scale-110 hover:shadow-[0_0_25px_rgba(var(--primary-rgb),0.3)] transition-all duration-300" aria-label="LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="https://github.com/" target="_blank" class="w-12 h-12 glass rounded-2xl flex items-center justify-center text-xl text-[var(--text-secondary)] hover:text-primary hover:scale-110 hover:shadow-[0_0_25px_rgba(var(--primary-rgb),0.3)] transition-all duration-300" aria-label="GitHub">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <p class="text-[10px] font-black uppercase tracking-[0.3em] text-[var(--text-secondary)]">
                &copy; {{ date('Y') }} Sagun Mishra. Built with <i class="fab fa-laravel text-[#ff2d20] mx-1"></i> & <i class="fas fa-heart text-[#ec4899] mx-1"></i>
            </p>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Typed.js -->
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 1200,
                once: true,
                offset: 100,
                easing: 'ease-out-cubic'
            });
        });
    </script>
    @stack('scripts')
    <!-- Preloader Logic -->
    <script>
        window.addEventListener('load', function() {
            setTimeout(function() {
                const preloader = document.getElementById('preloader');
                preloader.style.opacity = '0';
                setTimeout(function() {
                    preloader.style.display = 'none';
                }, 700);
            }, 1500);
        });
    </script>
</body>
</html>
