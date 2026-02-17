@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section id="home" class="min-h-screen flex items-center justify-center pt-24 md:pt-32 pb-12 md:pb-20 relative overflow-hidden">
    <div class="container mx-auto px-6 grid lg:grid-cols-2 gap-10 lg:gap-16 items-center relative z-10">
        <div class="text-center lg:text-left w-full" data-aos="fade-in" data-aos-delay="200">
            <div class="flex items-center justify-center lg:justify-start gap-3 mb-6">
                <span class="relative flex h-3 w-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-primary"></span>
                </span>
                <span class="text-sm font-black uppercase tracking-widest text-primary">Available for Projects</span>
            </div>
            
            <h1 class="font-black font-outfit mb-6 leading-[1.1] tracking-tight text-[var(--text-heading)]" style="font-size: clamp(2.5rem, 8vw, 6rem);">
                Hi, I'm <span class="accent-title-gradient italic">Sagun</span>
            </h1>
            
            <div class="min-h-[4rem] mb-7 flex justify-center lg:justify-start">
                <h2 class="font-bold text-slate-700 dark:text-slate-300" style="font-size: clamp(1.5rem, 4vw, 3rem);">
                    <span id="typed" class="accent-title-gradient border-r-4 border-primary/40 pr-2"></span>
                </h2>
            </div>
            
            <p class="text-xl text-slate-600 dark:text-slate-400 mb-12 max-w-xl mx-auto lg:mx-0 leading-relaxed text-center lg:text-left px-2 w-full">
                Passionate <span class="text-slate-900 dark:text-white font-semibold underline decoration-primary decoration-2 underline-offset-4">Software Developer</span> specializing in PHP & Laravel-based web applications. I turn complex problems into elegant digital solutions.
            </p>
            
            <div class="flex flex-wrap gap-6 items-center justify-center lg:justify-start">
                <a href="#projects" class="btn-primary">
                    <span>Explore My Work</span>
                    <i class="fas fa-arrow-right text-xs"></i>
                </a>
                <a href="{{ route('resume.download') }}" class="group flex items-center gap-3 font-bold hover:text-primary transition-all">
                    <span class="w-12 h-12 flex items-center justify-center rounded-full glass group-hover:bg-primary group-hover:text-white transition-all">
                        <i class="fas fa-download"></i>
                    </span>
                    <span>Get Resume</span>
                </a>
            </div>
            
            <div class="mt-16 flex items-center justify-center lg:justify-start gap-8">
                <div class="flex -space-x-3">
                    <div class="w-10 h-10 rounded-full border-2 border-white dark:border-slate-800 bg-slate-200 dark:bg-slate-700 flex items-center justify-center text-xs font-bold">SM</div>
                    <div class="w-10 h-10 rounded-full border-2 border-white dark:border-slate-800 bg-primary flex items-center justify-center text-xs text-white">
                        <i class="fas fa-check"></i>
                    </div>
                </div>
                <div class="text-sm font-medium opacity-60 text-center lg:text-left">
                    Trusted by local businesses<br>and tech agencies.
                </div>
            </div>
        </div>
        
        <div class="relative mt-12 lg:mt-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="w-64 md:w-80 lg:w-full max-w-[500px] aspect-square mx-auto relative group">
                <!-- Floating Glass Card -->
                <div class="absolute inset-0 glass rounded-[40px] rotate-6 group-hover:rotate-0 transition-transform duration-700"></div>
                <div class="absolute inset-0 glass rounded-[40px] -rotate-3 group-hover:rotate-0 transition-transform duration-700 delay-100 bg-primary/5"></div>
                
                <div class="absolute inset-4 glass rounded-[30px] overflow-hidden flex items-center justify-center group-hover:rotate-0 transition-transform duration-700 shadow-2xl">
                    <img src="{{ asset('images/image.png') }}" 
                         alt="Sagun Mishra" 
                         class="w-full h-full object-cover">
                    
                    <div class="hidden md:block absolute bottom-10 left-10 right-10 p-6 glass rounded-2xl shadow-xl">
                        <div class="flex justify-between items-end">
                            <div>
                                <p class="text-[10px] sm:text-xs uppercase font-black tracking-widest text-primary mb-1">Current Stack</p>
                                <h4 class="font-bold text-lg leading-tight text-[var(--text-heading)]">PHP Laravel Developer &<br>Web Developer</h4>
                            </div>
                            <div class="text-3xl text-primary"><i class="fab fa-laravel animate-pulse"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-12 md:py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-primary/5 -skew-y-3 transform origin-right"></div>
    <div class="container mx-auto px-6">
        <h2 class="section-title" data-aos="fade-up">About Me</h2>
        <div class="grid md:grid-cols-2 gap-10 md:gap-16 items-center">
            <div class="space-y-6" data-aos="fade-up">
                <p class="text-xl leading-relaxed">
                    I am a software developer with experience in both backend and frontend technologies, located in <span class="text-primary font-medium">Lucknow, India</span>.
                </p>
                <p class="text-[var(--text-body)]">
                    With a strong foundation in PHP and Laravel, I focus on creating robust, efficient, and scalable web applications. My journey in technology is driven by a constant curiosity to learn and implement the latest industry standards.
                </p>
            </div>
            
            <div class="grid grid-cols-2 gap-4" data-aos="fade-left">
                <div class="glass p-6 rounded-2xl text-center space-y-4">
                    <div class="icon-box w-12 h-12 rounded-xl flex items-center justify-center mx-auto">
                        <i class="fas fa-server text-xl text-primary"></i>
                    </div>
                    <h3 class="font-black text-[var(--text-heading)]">Backend</h3>
                    <p class="text-[10px] uppercase font-bold tracking-widest text-[var(--text-secondary)]">Laravel, PHP, MySQL</p>
                </div>
                <div class="glass p-6 rounded-2xl text-center space-y-4">
                    <div class="icon-box w-12 h-12 rounded-xl flex items-center justify-center mx-auto">
                        <i class="fas fa-laptop-code text-xl text-primary"></i>
                    </div>
                    <h3 class="font-black text-[var(--text-heading)]">Frontend</h3>
                    <p class="text-[10px] uppercase font-bold tracking-widest text-[var(--text-secondary)]">JS, Bootstrap, Tailwind, HTML/CSS</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="py-24 relative overflow-hidden">
    <div class="container mx-auto px-6 text-center">
        <h2 class="section-title" data-aos="fade-up">Technical Skills</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mt-12 max-w-6xl mx-auto">
            @foreach($skills as $category => $skillData)
            <div class="glass p-6 rounded-2xl group flex flex-col items-center justify-center space-y-3 min-h-[180px]" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="icon-box w-12 h-12 rounded-xl flex items-center justify-center border border-white/5">
                    <i class="{{ $skillData['icon'] }} text-xl text-primary drop-shadow-[0_0_8px_rgba(var(--primary-rgb),0.3)]"></i>
                </div>
                
                <h3 class="text-lg font-bold text-[var(--text-heading)]">{{ $category }}</h3>
                
                <p class="text-[10px] sm:text-xs uppercase font-bold tracking-[0.15em] text-[var(--text-secondary)] leading-relaxed text-center px-2">
                    {{ $skillData['items'] }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-primary/5 skew-y-3 transform origin-left"></div>
    <div class="container mx-auto px-6">
        <h2 class="section-title" data-aos="fade-up">Portfolio Projects</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 md:gap-8 mt-12 max-w-5xl mx-auto">
            @foreach($projects as $project)
            <div class="group glass rounded-2xl overflow-hidden hover:scale-[1.02] transition-all duration-500 border-none shadow-lg" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="h-48 relative overflow-hidden">
                    <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}" class="object-cover w-full h-full group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent opacity-90"></div>
                    <div class="absolute bottom-4 left-5 right-5">
                        <h3 class="text-xl font-black text-white tracking-tight">{{ $project['title'] }}</h3>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-sm text-[var(--text-body)] leading-relaxed mb-5 line-clamp-2">{{ $project['description'] }}</p>
                    <div class="flex items-center justify-between">
                        <a href="{{ $project['link'] }}" target="_blank" class="inline-flex items-center gap-2 text-primary text-xs font-black uppercase tracking-widest hover:gap-3 transition-all group/link">
                            View Live 
                            <span class="w-8 h-[1px] bg-primary group-hover/link:w-12 transition-all"></span>
                            <i class="fas fa-external-link-alt text-[10px]"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Education & Experience -->
<section class="py-24 relative overflow-hidden">
    <div class="container mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
        <!-- Education -->
        <div id="education">
            <h2 class="section-title" data-aos="fade-up">Education</h2>
            <div class="space-y-8 mt-8 border-l-2 border-primary/20 pl-8 ml-4">
                @foreach($education as $edu)
                <div class="relative pt-1" data-aos="fade-left">
                    <div class="absolute -left-[41px] top-1 w-4 h-4 rounded-full bg-primary shadow-[0_0_15px_rgba(var(--primary-rgb),0.5)]"></div>
                    <span class="text-xs font-black uppercase tracking-wider text-primary">{{ $edu['duration'] }}</span>
                    <h3 class="text-xl font-bold mt-1 text-[var(--text-heading)]">{{ $edu['degree'] }}</h3>
                    <p class="text-[var(--text-body)] font-medium">{{ $edu['institution'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
        
        <!-- Experience -->
        <div id="experience">
            <h2 class="section-title" data-aos="fade-up">Experience</h2>
            <div class="space-y-8 mt-8">
                @foreach($experience as $exp)
                <div class="glass p-6 rounded-2xl relative overflow-hidden group" data-aos="fade-right">
                    <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-20 transition-opacity">
                        <i class="fas fa-briefcase text-6xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-black text-[var(--text-heading)] mb-1">{{ $exp['role'] }}</h3>
                    <p class="text-primary font-bold mb-4 text-sm uppercase tracking-wider">{{ $exp['company'] }}</p>
                    <p class="text-[var(--text-body)] leading-relaxed">{{ $exp['description'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-12 md:py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-primary/5 -skew-y-6 transform origin-center"></div>
    <div class="container mx-auto px-6 text-center max-w-4xl">
        <h2 class="section-title" data-aos="fade-up">Get In Touch</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 md:gap-8 mt-12 mb-12 md:mb-16 px-4">
            <a href="https://www.google.com/maps/search/?api=1&query=Lucknow,+Uttar+Pradesh" target="_blank" class="glass p-8 rounded-2xl flex flex-col items-center group cursor-pointer" data-aos="zoom-in">
                <div class="icon-box w-14 h-14 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-location-dot text-2xl text-primary drop-shadow-[0_0_8px_rgba(var(--primary-rgb),0.3)]"></i>
                </div>
                <h4 class="text-lg font-black text-[var(--text-heading)] mb-2">Location</h4>
                <p class="text-sm font-medium text-[var(--text-secondary)]">Lucknow, Uttar Pradesh</p>
                <div class="mt-4 text-xs font-black uppercase tracking-widest text-primary opacity-0 group-hover:opacity-100 transition-opacity">View on Map</div>
            </a>

            <a href="mailto:mishrasagun122@gmail.com" class="glass p-8 rounded-2xl flex flex-col items-center group cursor-pointer" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box w-14 h-14 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-envelope text-2xl text-primary drop-shadow-[0_0_8px_rgba(var(--primary-rgb),0.3)]"></i>
                </div>
                <h4 class="text-lg font-black text-[var(--text-heading)] mb-2">Email</h4>
                <p class="text-sm font-medium text-[var(--text-secondary)]">mishrasagun122@gmail.com</p>
                <div class="mt-4 text-xs font-black uppercase tracking-widest text-primary opacity-0 group-hover:opacity-100 transition-opacity">Send Email</div>
            </a>

            <a href="tel:8423414885" class="glass p-8 rounded-2xl flex flex-col items-center group cursor-pointer" data-aos="zoom-in" data-aos-delay="200">
                <div class="icon-box w-14 h-14 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-phone text-2xl text-primary drop-shadow-[0_0_8px_rgba(var(--primary-rgb),0.3)]"></i>
                </div>
                <h4 class="text-lg font-black text-[var(--text-heading)] mb-2">Phone</h4>
                <p class="text-sm font-medium text-[var(--text-secondary)]">8423414885</p>
                <div class="mt-4 text-xs font-black uppercase tracking-widest text-primary opacity-0 group-hover:opacity-100 transition-opacity">Call Now</div>
            </a>
        </div>
        
        @if(session('success'))
        <div class="mb-8 p-4 bg-green-500/20 border border-green-500/50 text-green-500 rounded-2xl animate-bounce">
            {{ session('success') }}
        </div>
        @endif
        
        <form action="{{ route('contact.store') }}" method="POST" class="glass p-8 md:p-12 rounded-[2rem] text-left bg-transparent shadow-2xl relative overflow-hidden" data-aos="fade-up">
            <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full blur-3xl -mr-16 -mt-16"></div>
            @csrf
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block mb-2 font-black text-xs uppercase tracking-widest text-[var(--text-secondary)]">Your Name</label>
                    <input type="text" name="name" required class="w-full px-5 py-4 rounded-2xl bg-[var(--input-bg)] border border-[var(--card-border)] text-[var(--text-heading)] placeholder:text-[var(--input-placeholder)] focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all duration-300 shadow-sm" placeholder="e.g. John Doe" value="{{ old('name') }}">
                    @error('name') <span class="text-red-500 text-xs font-bold mt-2 block">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block mb-2 font-black text-xs uppercase tracking-widest text-[var(--text-secondary)]">Email Address</label>
                    <input type="email" name="email" required class="w-full px-5 py-4 rounded-2xl bg-[var(--input-bg)] border border-[var(--card-border)] text-[var(--text-heading)] placeholder:text-[var(--input-placeholder)] focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all duration-300 shadow-sm" placeholder="name@example.com" value="{{ old('email') }}">
                    @error('email') <span class="text-red-500 text-xs font-bold mt-2 block">{{ $message }}</span> @enderror
                </div>
            </div>
            
            <div class="mb-6">
                <label class="block mb-2 font-black text-xs uppercase tracking-widest text-[var(--text-secondary)]">Subject</label>
                <input type="text" name="subject" required class="w-full px-5 py-4 rounded-2xl bg-[var(--input-bg)] border border-[var(--card-border)] text-[var(--text-heading)] placeholder:text-[var(--input-placeholder)] focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all duration-300 shadow-sm" placeholder="What is this about?" value="{{ old('subject') }}">
                @error('subject') <span class="text-red-500 text-xs font-bold mt-2 block">{{ $message }}</span> @enderror
            </div>

            <div class="mb-8">
                <label class="block mb-2 font-black text-xs uppercase tracking-widest text-[var(--text-secondary)]">Message</label>
                <textarea name="message" required rows="5" class="w-full px-5 py-4 rounded-2xl bg-[var(--input-bg)] border border-[var(--card-border)] text-[var(--text-heading)] placeholder:text-[var(--input-placeholder)] focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all duration-300 shadow-sm resize-none" placeholder="Tell me more about your project...">{{ old('message') }}</textarea>
                @error('message') <span class="text-red-500 text-xs font-bold mt-2 block">{{ $message }}</span> @enderror
            </div>
            
            <button type="submit" class="btn-primary w-full py-5 rounded-2xl text-xs font-black tracking-[0.3em] uppercase group overflow-hidden relative">
                <span class="relative z-10 flex items-center justify-center gap-3">
                    Send Message
                    <i class="fas fa-paper-plane group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                </span>
            </button>
        </form>
    </div>
</section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var typed = new Typed('#typed', {
            strings: ['Software Developer', 'Laravel Developer', 'Backend Engineer', 'Full Stack Developer'],
            typeSpeed: 50,
            backSpeed: 30,
            loop: true
        });
    });
</script>
@endpush
