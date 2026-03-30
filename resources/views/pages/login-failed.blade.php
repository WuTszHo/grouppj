@extends('layouts.app')

@section('title', 'Login Failed – Hea & Play Corner')

@section('content')
<div class="max-w-md mx-auto text-center">
    {{-- Themed error display --}}
    <div class="bg-[#1a1a2e] rounded-2xl shadow-lg p-10 border border-red-500 neon-border">
        <div class="text-7xl mb-4">🎲</div>
        <h1 class="text-3xl font-black text-[#ff2d78] neon-text mb-3">骰仔跌咗！Login Failed!</h1>
        <p class="text-lg text-gray-300 mb-2">Sorry, login failed.</p>
        <p class="text-gray-500 mb-8">The email or password you entered is incorrect. Maybe your luck ran out — grab a coffee and try again!</p>

        {{-- Return button --}}
        <a href="{{ route('home') }}" class="inline-block bg-[#ff2d78] hover:bg-[#e0225f] text-white font-black py-3 px-8 rounded-xl shadow transition transform hover:scale-105">
            🏠 Return to Home
        </a>
    </div>
</div>
@endsection
