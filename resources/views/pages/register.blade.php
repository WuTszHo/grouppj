@extends('layouts.app')

@section('title', 'Register – Hea & Play Corner')

@section('content')
<div class="max-w-lg mx-auto">
    <h1 class="text-3xl font-black text-[#ff2d78] neon-text mb-2 text-center">📝 Join the Table</h1>
    <p class="text-center text-gray-400 mb-6">Create your account to start booking game sessions.</p>

    {{-- Display validation errors --}}
    @if($errors->any())
        <div class="bg-red-900/40 border border-red-500 text-red-300 px-4 py-3 rounded-lg mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Registration form --}}
    <form action="{{ route('register') }}" method="POST" id="registerForm" class="bg-[#1a1a2e] rounded-2xl shadow-lg p-8 border border-[#2a2a40]">
        @csrf

        {{-- Last Name --}}
        <div class="mb-4">
            <label for="last_name" class="block text-sm font-bold text-gray-300 mb-1">Last Name</label>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required
                   class="w-full px-4 py-2 bg-[#0f0f1a] border border-[#2a2a40] text-gray-100 rounded-lg focus:ring-2 focus:ring-[#ff2d78] focus:border-[#ff2d78] outline-none transition">
        </div>

        {{-- First Name --}}
        <div class="mb-4">
            <label for="first_name" class="block text-sm font-bold text-gray-300 mb-1">First Name</label>
            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required
                   class="w-full px-4 py-2 bg-[#0f0f1a] border border-[#2a2a40] text-gray-100 rounded-lg focus:ring-2 focus:ring-[#ff2d78] focus:border-[#ff2d78] outline-none transition">
        </div>

        {{-- Mailing Address --}}
        <div class="mb-4">
            <label for="address" class="block text-sm font-bold text-gray-300 mb-1">Mailing Address</label>
            <input type="text" id="address" name="address" value="{{ old('address') }}" required
                   class="w-full px-4 py-2 bg-[#0f0f1a] border border-[#2a2a40] text-gray-100 rounded-lg focus:ring-2 focus:ring-[#ff2d78] focus:border-[#ff2d78] outline-none transition">
        </div>

        {{-- Contact Phone --}}
        <div class="mb-4">
            <label for="phone" class="block text-sm font-bold text-gray-300 mb-1">Contact Phone Number</label>
            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required
                   class="w-full px-4 py-2 bg-[#0f0f1a] border border-[#2a2a40] text-gray-100 rounded-lg focus:ring-2 focus:ring-[#ff2d78] focus:border-[#ff2d78] outline-none transition">
        </div>

        {{-- Email Address --}}
        <div class="mb-4">
            <label for="email" class="block text-sm font-bold text-gray-300 mb-1">Email Address</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                   class="w-full px-4 py-2 bg-[#0f0f1a] border border-[#2a2a40] text-gray-100 rounded-lg focus:ring-2 focus:ring-[#ff2d78] focus:border-[#ff2d78] outline-none transition">
        </div>

        {{-- Password --}}
        <div class="mb-4">
            <label for="password" class="block text-sm font-bold text-gray-300 mb-1">Password</label>
            <input type="password" id="password" name="password" required minlength="6"
                   class="w-full px-4 py-2 bg-[#0f0f1a] border border-[#2a2a40] text-gray-100 rounded-lg focus:ring-2 focus:ring-[#ff2d78] focus:border-[#ff2d78] outline-none transition">
            {{-- Password strength indicator --}}
            <div id="passwordStrength" class="mt-1 text-sm"></div>
        </div>

        {{-- Confirm Password --}}
        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-bold text-gray-300 mb-1">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required minlength="6"
                   class="w-full px-4 py-2 bg-[#0f0f1a] border border-[#2a2a40] text-gray-100 rounded-lg focus:ring-2 focus:ring-[#ff2d78] focus:border-[#ff2d78] outline-none transition">
        </div>

        {{-- Buttons --}}
        <div class="flex gap-4">
            <button type="submit" class="flex-1 bg-[#ff2d78] hover:bg-[#e0225f] text-white font-black py-3 rounded-xl shadow transition transform hover:scale-105">
                Register
            </button>
            <button type="reset" class="flex-1 bg-[#2a2a40] hover:bg-[#3a3a55] text-gray-300 font-bold py-3 rounded-xl shadow transition">
                Clear
            </button>
        </div>
    </form>

    {{-- Navigation links --}}
    <div class="text-center mt-6 text-sm text-gray-500">
        <a href="{{ route('home') }}" class="text-[#00e5ff] hover:underline">← Back to Home</a>
        &nbsp;|&nbsp;
        <a href="{{ route('login') }}" class="text-[#ff2d78] hover:underline">Already a member? Login →</a>
    </div>
</div>
@endsection
