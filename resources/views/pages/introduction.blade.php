@extends('layouts.app')

@section('title', 'Hea & Play Corner – Welcome')

@section('content')
<!-- Hero Banner Image -->
<div class="relative rounded-2xl overflow-hidden mb-12 border border-[#2a2a40] neon-border">
    <img src="{{ asset('images/hero-banner.png') }}" alt="Hea & Play Corner – Hong Kong Boardgame Café"
         class="w-full h-72 sm:h-96 object-cover opacity-70">
    <div class="absolute inset-0 bg-gradient-to-t from-[#0f0f1a] via-transparent to-transparent"></div>
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4">
        <!-- Logo -->
        <img src="{{ asset('images/logo.png') }}" alt="Hea & Play Corner Logo" class="w-28 h-28 rounded-full border-2 border-[#ff2d78] neon-border mb-4 object-cover bg-[#1a1a2e]">
        <h1 class="text-5xl font-black text-[#ff2d78] neon-text mb-2">Hea & Play</h1>
        <p class="text-2xl font-bold text-[#00e5ff] neon-text-cyan">Corner</p>
        <p class="text-lg text-gray-300 italic mt-2">"Hea 住玩，一個屬於你嘅放鬆角落！"</p>
        <p class="text-sm text-gray-400 mt-1">Chill and play — a cozy corner that's all yours!</p>
    </div>
</div>

<!-- About Section -->
<div class="bg-[#1a1a2e] rounded-2xl shadow-lg p-8 mb-8 border border-[#2a2a40] neon-border">
    <h2 class="text-3xl font-black text-[#f5c842] mb-4">🏮 Welcome to Hea &amp; Play Corner!</h2>
    <p class="text-lg leading-relaxed text-gray-300 mb-4">
        Step into <strong class="text-[#ff2d78]">Hea &amp; Play Corner</strong>, a Hong Kong–style boardgame café inspired by the vibrant neon-lit streets of Mong Kok and the nostalgic warmth of a classic cha chaan teng. We bring together the best of two worlds — <strong class="text-[#00e5ff]">over 300 boardgames</strong> and quality coffee, light bites, and good vibes.
    </p>
    <p class="text-lg leading-relaxed text-gray-300 mb-4">
        Whether you fancy a fierce round of <strong class="text-[#00e5ff]">三國殺 (Legends of the Three Kingdoms)</strong>, a classic <strong class="text-[#00e5ff]">UNO</strong> showdown, or an epic <strong class="text-[#00e5ff]">Monopoly</strong> marathon, our café is your perfect hangout. Choose from <strong class="text-[#f5c842]">street-side tables</strong> for casual play, <strong class="text-[#f5c842]">premium booths</strong> for strategy sessions, or book our exclusive <strong class="text-[#ff2d78]">private rooms</strong> — the Victoria Peak Room or the Star Ferry Room — for the ultimate gaming party.
    </p>
    <p class="text-lg leading-relaxed text-gray-300">
        Grab a freshly brewed latte ☕, an iced Americano 🧊, or a mocha frappe 🍫 while you play. Our friendly staff are always ready to recommend the perfect game for your group. Come play lah!
    </p>
</div>

<!-- Popular Games Showcase -->
<div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">
    <div class="bg-[#1a1a2e] rounded-xl p-4 border border-[#2a2a40] text-center hover:border-[#ff2d78] transition">
        <div class="text-4xl mb-2">🃏</div>
        <p class="font-bold text-[#ff2d78] text-sm">UNO</p>
        <p class="text-gray-500 text-xs">2–10 Players</p>
    </div>
    <div class="bg-[#1a1a2e] rounded-xl p-4 border border-[#2a2a40] text-center hover:border-[#00e5ff] transition">
        <div class="text-4xl mb-2">🏠</div>
        <p class="font-bold text-[#00e5ff] text-sm">Monopoly</p>
        <p class="text-gray-500 text-xs">2–6 Players</p>
    </div>
    <div class="bg-[#1a1a2e] rounded-xl p-4 border border-[#2a2a40] text-center hover:border-[#f5c842] transition">
        <div class="text-4xl mb-2">⚔️</div>
        <p class="font-bold text-[#f5c842] text-sm">三國殺</p>
        <p class="text-gray-500 text-xs">2–10 Players</p>
    </div>
    <div class="bg-[#1a1a2e] rounded-xl p-4 border border-[#2a2a40] text-center hover:border-[#ff2d78] transition">
        <div class="text-4xl mb-2">🏝️</div>
        <p class="font-bold text-[#ff2d78] text-sm">Catan</p>
        <p class="text-gray-500 text-xs">3–4 Players</p>
    </div>
    <div class="bg-[#1a1a2e] rounded-xl p-4 border border-[#2a2a40] text-center hover:border-[#00e5ff] transition">
        <div class="text-4xl mb-2">🔍</div>
        <p class="font-bold text-[#00e5ff] text-sm">Avalon</p>
        <p class="text-gray-500 text-xs">5–10 Players</p>
    </div>
    <div class="bg-[#1a1a2e] rounded-xl p-4 border border-[#2a2a40] text-center hover:border-[#f5c842] transition">
        <div class="text-4xl mb-2">🐺</div>
        <p class="font-bold text-[#f5c842] text-sm">狼人殺</p>
        <p class="text-gray-500 text-xs">6–12 Players</p>
    </div>
</div>

<!-- Game of the Month -->
<div class="bg-gradient-to-r from-[#1a1a2e] to-[#2a1a30] rounded-2xl shadow-lg p-8 mb-8 border border-[#ff2d78] flex flex-col sm:flex-row gap-6 items-center">
    <img src="{{ asset('images/game-of-month.png') }}" alt="三國殺 – Game of the Month"
         class="w-full sm:w-48 h-48 object-cover rounded-xl border border-[#2a2a40] shrink-0">
    <div>
        <h2 class="text-2xl font-black text-[#f5c842] mb-3">🎲 Game of the Month: <span class="text-[#00e5ff]">三國殺 Legends of the Three Kingdoms</span></h2>
        <p class="text-gray-300 text-lg">
            This month we are featuring <strong class="text-[#00e5ff]">三國殺</strong> — the beloved Chinese strategy card game! Choose your hero from the Three Kingdoms era, bluff your enemies, and fight for survival. Perfect for 2–10 players. Ask our staff for a free tutorial every Saturday afternoon.
        </p>
    </div>
</div>

<!-- Café Gallery -->
<div class="mb-8">
    <h2 class="text-2xl font-black text-[#f5c842] mb-4 text-center">📸 Our Café</h2>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <img src="{{ asset('images/cafe-interior.png') }}" alt="Café interior with neon lights"
             class="w-full h-52 object-cover rounded-xl border border-[#2a2a40] hover:border-[#ff2d78] transition">
        <img src="{{ asset('images/cafe-games.png') }}" alt="Boardgame shelves"
             class="w-full h-52 object-cover rounded-xl border border-[#2a2a40] hover:border-[#00e5ff] transition">
        <img src="{{ asset('images/cafe-drinks.png') }}" alt="Coffee and light bites"
             class="w-full h-52 object-cover rounded-xl border border-[#2a2a40] hover:border-[#f5c842] transition">
    </div>
</div>

<!-- Our Story -->
<div class="bg-[#1a1a2e] rounded-2xl shadow-lg p-8 mb-8 border border-[#2a2a40]">
    <h2 class="text-2xl font-black text-[#00e5ff] mb-3">📖 Our Story</h2>
    <p class="text-gray-300 text-lg leading-relaxed">
        Founded in 2022 by a group of boardgame-loving friends in Sham Shui Po, Hea &amp; Play Corner started as a tiny shop above an old dai pai dong. What began with a few decks of UNO and a set of Monopoly quickly grew into a full-blown gaming paradise. Word spread across the MTR lines, and soon gamers from Tsim Sha Tsui to Tuen Mun were making the trip for our famous 三國殺 tournaments and Catan leagues. Today our café is a beloved neighbourhood spot where strangers become friends over a game and a cup of good coffee. Our mission: bring people together, one dice roll at a time.
    </p>
</div>

<!-- Call to Action Buttons -->
<div class="flex flex-col sm:flex-row gap-4 justify-center mt-10">
    <a href="{{ route('register') }}" class="bg-[#ff2d78] hover:bg-[#e0225f] text-white font-black py-4 px-8 rounded-xl text-lg shadow-lg transition transform hover:scale-105 text-center neon-border">
        📝 Register Now
    </a>
    <a href="{{ route('login') }}" class="bg-[#00e5ff] hover:bg-[#00c4db] text-[#0f0f1a] font-black py-4 px-8 rounded-xl text-lg shadow-lg transition transform hover:scale-105 text-center neon-border-cyan">
        🔑 Login to Reserve
    </a>
</div>
@endsection
