@extends('layouts.app')

@section('title', 'Thank You – Hea & Play Corner')

@section('content')
<div class="max-w-lg mx-auto text-center">
    <div class="bg-[#1a1a2e] rounded-2xl shadow-lg p-10 border border-[#ff2d78] neon-border">
        {{-- Themed thank you message --}}
        <div class="text-7xl mb-4">🎉</div>
        <h1 class="text-3xl font-black text-[#ff2d78] neon-text mb-3">多謝你！Thank You!</h1>
        <p class="text-xl text-[#00e5ff] italic mb-6">Your game session is confirmed — see you soon!</p>

        {{-- Reservation details --}}
        <div class="bg-[#0f0f1a] rounded-xl p-6 text-left mb-8 border border-[#2a2a40]">
            <h2 class="text-lg font-black text-[#f5c842] mb-3">📋 Reservation Details</h2>
            <table class="w-full text-gray-300">
                <tr class="border-b border-[#2a2a40]">
                    <td class="py-2 font-bold text-gray-400">Email:</td>
                    <td class="py-2">{{ session('email') }}</td>
                </tr>
                <tr class="border-b border-[#2a2a40]">
                    <td class="py-2 font-bold text-gray-400">Date:</td>
                    <td class="py-2">{{ session('reservation_date') }}</td>
                </tr>
                <tr class="border-b border-[#2a2a40]">
                    <td class="py-2 font-bold text-gray-400">Time Slot:</td>
                    <td class="py-2">{{ session('time_slot') }}</td>
                </tr>
                <tr>
                    <td class="py-2 font-bold text-gray-400">Table/Room:</td>
                    <td class="py-2">{{ session('table_room') }}</td>
                </tr>
            </table>
        </div>

        {{-- OK button --}}
        <a href="{{ route('home') }}" class="inline-block bg-[#00e5ff] hover:bg-[#00c4db] text-[#0f0f1a] font-black py-3 px-10 rounded-xl shadow-lg transition transform hover:scale-105">
            OK
        </a>

        <p class="text-gray-500 text-sm mt-6">到時見！See you at Hea &amp; Play Corner! 🎲</p>
    </div>
</div>
@endsection
