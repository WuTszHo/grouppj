@extends('layouts.app')

@section('title', 'Login – Hea & Play Corner')

@section('content')
<div class="max-w-md mx-auto">
    <h1 class="text-3xl font-black text-[#00e5ff] neon-text-cyan mb-2 text-center">🔑 Login</h1>
    <p class="text-center text-gray-400 mb-6">Enter your credentials to reserve a session.</p>

    {{-- Success message after registration --}}
    @if(session('success'))
        <div class="bg-green-900/40 border border-green-500 text-green-300 px-4 py-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Validation errors --}}
    @if($errors->any())
        <div class="bg-red-900/40 border border-red-500 text-red-300 px-4 py-3 rounded-lg mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Login form --}}
    <form action="{{ route('login') }}" method="POST" class="bg-[#1a1a2e] rounded-2xl shadow-lg p-8 border border-[#2a2a40]">
        @csrf

        {{-- Email --}}
        <div class="mb-4">
            <label for="email" class="block text-sm font-bold text-gray-300 mb-1">Email Address</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                   class="w-full px-4 py-2 bg-[#0f0f1a] border border-[#2a2a40] text-gray-100 rounded-lg focus:ring-2 focus:ring-[#00e5ff] focus:border-[#00e5ff] outline-none transition">
        </div>

        {{-- Password --}}
        <div class="mb-6">
            <label for="password" class="block text-sm font-bold text-gray-300 mb-1">Password</label>
            <input type="password" id="password" name="password" required
                   class="w-full px-4 py-2 bg-[#0f0f1a] border border-[#2a2a40] text-gray-100 rounded-lg focus:ring-2 focus:ring-[#00e5ff] focus:border-[#00e5ff] outline-none transition">
        </div>

        {{-- Submit button --}}
        <button type="submit" class="w-full bg-[#00e5ff] hover:bg-[#00c4db] text-[#0f0f1a] font-black py-3 rounded-xl shadow transition transform hover:scale-105">
            Login
        </button>
    </form>

    {{-- Navigation links --}}
    <div class="text-center mt-6 text-sm text-gray-500">
        <a href="{{ route('home') }}" class="text-[#00e5ff] hover:underline">← Back to Home</a>
        &nbsp;|&nbsp;
        <a href="{{ route('register') }}" class="text-[#ff2d78] hover:underline">Not a member? Register →</a>
    </div>
</div>
@endsection
