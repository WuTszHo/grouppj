@extends('layouts.app')

@section('title', 'Reserve – Hea & Play Corner')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-black text-[#f5c842] mb-2 text-center">🎲 Reserve Your Session</h1>
    <p class="text-center text-gray-400 mb-6">Welcome, {{ session('member_name') }}! Pick your date, time, and table.</p>

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

    {{-- Step 1: Select date and time --}}
    <form action="{{ route('reservation') }}" method="GET" id="dateTimeForm" class="bg-[#1a1a2e] rounded-2xl shadow-lg p-8 border border-[#2a2a40] mb-6">
        <h2 class="text-xl font-black text-[#00e5ff] mb-4">Step 1: Choose Date &amp; Time</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
            {{-- Date picker --}}
            <div>
                <label for="date" class="block text-sm font-bold text-gray-300 mb-1">Date</label>
                <input type="date" id="date" name="date" value="{{ $selectedDate ?? '' }}" required
                       min="{{ date('Y-m-d') }}"
                       class="w-full px-4 py-2 bg-[#0f0f1a] border border-[#2a2a40] text-gray-100 rounded-lg focus:ring-2 focus:ring-[#00e5ff] focus:border-[#00e5ff] outline-none transition">
            </div>

            {{-- Time slot selector --}}
            <div>
                <label for="time_slot" class="block text-sm font-bold text-gray-300 mb-1">Time Slot</label>
                <select id="time_slot" name="time_slot" required
                        class="w-full px-4 py-2 bg-[#0f0f1a] border border-[#2a2a40] text-gray-100 rounded-lg focus:ring-2 focus:ring-[#00e5ff] focus:border-[#00e5ff] outline-none transition">
                    <option value="">-- Select --</option>
                    @foreach($timeSlots as $slot)
                        <option value="{{ $slot }}" {{ ($selectedTime ?? '') === $slot ? 'selected' : '' }}>{{ $slot }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="bg-[#00e5ff] hover:bg-[#00c4db] text-[#0f0f1a] font-black py-2 px-6 rounded-lg shadow transition">
            Check Availability
        </button>
    </form>

    {{-- Step 2: Select table/room (shown after date/time selection) --}}
    @if($selectedDate && $selectedTime)
    <form action="{{ route('reservation') }}" method="POST" id="reservationForm" class="bg-[#1a1a2e] rounded-2xl shadow-lg p-8 border border-[#2a2a40]">
        @csrf
        <h2 class="text-xl font-black text-[#f5c842] mb-4">Step 2: Choose Your Spot</h2>
        <p class="text-gray-400 mb-4">
            Availability for <strong class="text-[#00e5ff]">{{ $selectedDate }}</strong> at <strong class="text-[#00e5ff]">{{ $selectedTime }}</strong>
        </p>

        {{-- Hidden fields for date and time --}}
        <input type="hidden" name="reservation_date" value="{{ $selectedDate }}">
        <input type="hidden" name="time_slot" value="{{ $selectedTime }}">

        {{-- Table/room options --}}
        <div class="space-y-3 mb-6">
            @foreach($availableTables as $key => $label)
                @php $isBooked = in_array($key, $bookedTables); @endphp
                <label class="flex items-center gap-3 p-4 rounded-xl border-2 cursor-pointer transition
                    {{ $isBooked ? 'border-[#2a2a40] bg-[#0f0f1a] opacity-40 cursor-not-allowed' : 'border-[#2a2a40] hover:border-[#ff2d78] hover:bg-[#1f1f35]' }}">
                    <input type="radio" name="table_room" value="{{ $key }}"
                           {{ $isBooked ? 'disabled' : '' }}
                           class="accent-[#ff2d78] w-5 h-5" required>
                    <div>
                        <span class="font-bold text-gray-200">
                            @if(str_contains($label, 'Private'))
                                🚪
                            @elseif(str_contains($label, 'Lounge') || str_contains($label, 'Deck'))
                                ⭐
                            @else
                                🪑
                            @endif
                            {{ $label }}
                        </span>
                        @if($isBooked)
                            <span class="text-red-400 text-sm ml-2">(Booked)</span>
                        @else
                            <span class="text-green-400 text-sm ml-2">(Available)</span>
                        @endif
                        {{-- Recommended games based on table size --}}
                        <p class="text-xs text-gray-500 mt-1">
                            @if(str_contains($label, '4 players'))
                                Recommended: UNO, Catan, Splendor, Ticket to Ride
                            @elseif(str_contains($label, '6 players'))
                                Recommended: 三國殺, Monopoly, Cluedo, Dixit
                            @elseif(str_contains($label, '8 players'))
                                Recommended: Avalon, 狼人殺, Codenames, Cash'n Guns
                            @elseif(str_contains($label, '10 players'))
                                Recommended: 狼人殺, Avalon, Deception, Two Rooms and a Boom
                            @endif
                        </p>
                    </div>
                </label>
            @endforeach
        </div>

        {{-- Buttons --}}
        <div class="flex gap-4">
            <button type="submit" class="flex-1 bg-[#ff2d78] hover:bg-[#e0225f] text-white font-black py-3 rounded-xl shadow transition transform hover:scale-105">
                Reserve
            </button>
            <button type="reset" class="flex-1 bg-[#2a2a40] hover:bg-[#3a3a55] text-gray-300 font-bold py-3 rounded-xl shadow transition">
                Clear
            </button>
            <a href="{{ route('home') }}" class="flex-1 bg-red-800 hover:bg-red-900 text-white font-bold py-3 rounded-xl shadow transition text-center leading-relaxed">
                Cancel
            </a>
        </div>
    </form>
    @endif
</div>
@endsection
