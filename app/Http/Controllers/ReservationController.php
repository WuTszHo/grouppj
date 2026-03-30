<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // Available tables and rooms themed after Hong Kong landmarks
    private $tablesAndRooms = [
        'Table 1 – Mong Kok Corner (4 players)'             => 'Table 1 – Mong Kok Corner (4 players)',
        'Table 2 – Sham Shui Po Spot (4 players)'           => 'Table 2 – Sham Shui Po Spot (4 players)',
        'Table 3 – Central Market Table (4 players)'         => 'Table 3 – Central Market Table (4 players)',
        'Table 4 – Tsim Sha Tsui Deck (6 players)'          => 'Table 4 – Tsim Sha Tsui Deck (6 players)',
        'Table 5 – Lan Kwai Fong Lounge (6 players)'        => 'Table 5 – Lan Kwai Fong Lounge (6 players)',
        'Victoria Peak Room – Private (8 players)'           => 'Victoria Peak Room – Private (8 players)',
        'Star Ferry Room – Private (10 players)'             => 'Star Ferry Room – Private (10 players)',
    ];

    // Available time slots
    private $timeSlots = [
        '10:00 AM – 12:00 PM',
        '12:00 PM – 2:00 PM',
        '2:00 PM – 4:00 PM',
        '4:00 PM – 6:00 PM',
        '6:00 PM – 9:00 PM',
    ];

    // Show the reservation form
    public function showForm(Request $request)
    {
        // Require login to access reservation page
        if (!$request->session()->has('member_id')) {
            return redirect()->route('login');
        }

        $availableTables = $this->tablesAndRooms;
        $timeSlots = $this->timeSlots;

        // Check which tables are already booked for the selected date/time
        $selectedDate = $request->query('date');
        $selectedTime = $request->query('time_slot');
        $bookedTables = [];

        if ($selectedDate && $selectedTime) {
            $bookedTables = Reservation::where('reservation_date', $selectedDate)
                ->where('time_slot', $selectedTime)
                ->pluck('table_room')
                ->toArray();
        }

        return view('pages.reservation', compact(
            'availableTables', 'timeSlots', 'selectedDate', 'selectedTime', 'bookedTables'
        ));
    }

    // Process the reservation
    public function reserve(Request $request)
    {
        // Require login
        if (!$request->session()->has('member_id')) {
            return redirect()->route('login');
        }

        // Validate reservation fields
        $validated = $request->validate([
            'reservation_date' => 'required|date|after_or_equal:today',
            'time_slot'        => 'required|string',
            'table_room'       => 'required|string',
        ]);

        // Store the reservation in the database
        $reservation = Reservation::create([
            'member_id'        => $request->session()->get('member_id'),
            'reservation_date' => $validated['reservation_date'],
            'time_slot'        => $validated['time_slot'],
            'table_room'       => $validated['table_room'],
        ]);

        // Redirect to thank you page with reservation details
        return redirect()->route('thankyou')->with([
            'email'            => $request->session()->get('member_email'),
            'reservation_date' => $validated['reservation_date'],
            'time_slot'        => $validated['time_slot'],
            'table_room'       => $validated['table_room'],
        ]);
    }

    // Show the thank you page
    public function thankYou(Request $request)
    {
        // Ensure reservation data exists in session flash
        if (!$request->session()->has('email')) {
            return redirect()->route('home');
        }

        return view('pages.thankyou');
    }
}
