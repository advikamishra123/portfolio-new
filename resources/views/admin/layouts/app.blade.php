<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - Sagun Mishra</title>
    <!-- Tailwind CSS (Using CDN for simplicity in Admin) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#8b5cf6',
                        secondary: '#3b82f6',
                        dark: '#0f172a',
                        darker: '#05070d',
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-darker text-slate-300 antialiased">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 bg-dark border-r border-slate-800 flex flex-col">
            <div class="p-6 flex items-center gap-3 border-b border-slate-800">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white font-black">S</div>
                <h1 class="font-bold text-white tracking-wide">Admin Panel</h1>
            </div>
            <nav class="flex-1 p-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-primary/20 text-white' : 'hover:bg-slate-800' }}">
                    <i class="fas fa-chart-pie w-5"></i> Dashboard
                </a>
                <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.projects.*') ? 'bg-primary/20 text-white' : 'hover:bg-slate-800' }}">
                    <i class="fas fa-briefcase w-5"></i> Projects
                </a>
                <a href="{{ route('admin.contacts.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.contacts.*') ? 'bg-primary/20 text-white' : 'hover:bg-slate-800' }}">
                    <i class="fas fa-envelope w-5"></i> Messages
                </a>
            </nav>
            <div class="p-4 border-t border-slate-800">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-red-500/10 hover:text-red-400 w-full transition-colors text-left">
                        <i class="fas fa-sign-out-alt w-5"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="h-16 bg-dark/50 backdrop-blur border-b border-slate-800 flex items-center justify-between px-8">
                <h2 class="font-semibold text-white">
                    @yield('header')
                </h2>
                <div class="flex items-center gap-4">
                    <span class="text-xs uppercase tracking-widest text-slate-500">Welcome, {{ Auth::guard('admin')->user()->name ?? 'Admin' }}</span>
                </div>
            </header>

            <main class="flex-1 overflow-auto p-8">
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-green-500/10 border border-green-500/20 text-green-400 flex items-center gap-3">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
