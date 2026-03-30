<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hea & Play Corner')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+HK:wght@400;700;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#0f0f1a] text-gray-100 font-sans">
    <!-- Navigation Bar styled like a neon-lit HK street -->
    <nav class="bg-[#1a1a2e] border-b border-[#2a2a40] shadow-lg">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-2 text-xl font-black tracking-wide">
                <span class="text-2xl">🎲</span>
                <span class="text-[#ff2d78]">Hea &</span>
                <span class="text-[#00e5ff] text-sm font-bold">Play Corner</span>
            </a>
            <div class="flex items-center gap-5 text-sm font-bold">
                <a href="{{ route('home') }}" class="text-gray-300 hover:text-[#ff2d78] transition">Home</a>
                <a href="{{ route('register') }}" class="text-gray-300 hover:text-[#ff2d78] transition">Register</a>
                <a href="{{ route('login') }}" class="text-gray-300 hover:text-[#00e5ff] transition">Login</a>
                @if(session('member_id'))
                    <a href="{{ route('reservation') }}" class="text-gray-300 hover:text-[#f5c842] transition">Reserve</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-400 hover:text-red-400 transition">Logout</button>
                    </form>
                @endif
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- Footer styled like neon signage -->
    <footer class="bg-[#1a1a2e] border-t border-[#2a2a40] text-center py-5 mt-12">
        <p class="text-gray-400">&copy; 2026 Hea &amp; Play Corner. All rights reserved.</p>
        <p class="text-sm text-[#ff2d78] mt-1">"Hea 住玩，一個屬於你嘅放鬆角落！"</p>
    </footer>
</body>
</html>
