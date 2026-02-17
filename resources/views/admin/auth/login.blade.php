<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Sagun Mishra</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap'); body { font-family: 'Outfit', sans-serif; }</style>
</head>
<body class="bg-[#05070d] h-screen flex items-center justify-center text-slate-300">
    <div class="w-full max-w-md p-8">
        <div class="text-center mb-10">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-purple-500 to-blue-500 flex items-center justify-center text-white text-3xl font-black mx-auto mb-6 shadow-2xl shadow-purple-500/20">S</div>
            <h1 class="text-2xl font-bold text-white">Admin Access</h1>
            <p class="text-slate-500 mt-2">Enter credentials to manage portfolio</p>
        </div>

        <form action="{{ route('admin.authenticate') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2">Email Address</label>
                <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl bg-[#0f172a] border border-slate-800 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/10 outline-none transition-all text-white placeholder-slate-700" placeholder="admin@example.com">
                @error('email') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-3 rounded-xl bg-[#0f172a] border border-slate-800 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/10 outline-none transition-all text-white placeholder-slate-700" placeholder="••••••••">
            </div>

            <button type="submit" class="w-full py-4 rounded-xl bg-gradient-to-r from-purple-500 to-blue-500 text-white font-bold shadow-lg shadow-purple-500/20 hover:scale-[1.02] transition-transform">
                Open Dashboard
            </button>
        </form>
    </div>
</body>
</html>
