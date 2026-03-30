<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    // Show the registration form
    public function showRegister()
    {
        return view('pages.register');
    }

    // Process registration form submission
    public function register(Request $request)
    {
        // Validate input fields
        $validated = $request->validate([
            'last_name'  => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'address'    => 'required|string|max:500',
            'phone'      => 'required|string|max:20',
            'email'      => 'required|email|unique:members,email',
            'password'   => 'required|string|min:6|confirmed',
        ]);

        // Hash the password before storing
        $validated['password'] = Hash::make($validated['password']);

        // Create the member record in the database
        Member::create($validated);

        // Redirect to login page with success message
        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }

    // Show the login form
    public function showLogin()
    {
        return view('pages.login');
    }

    // Process login form submission
    public function login(Request $request)
    {
        // Validate login fields
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        // Find member by email
        $member = Member::where('email', $request->email)->first();

        // Check credentials against the database
        if ($member && Hash::check($request->password, $member->password)) {
            // Store member info in session
            $request->session()->put('member_id', $member->id);
            $request->session()->put('member_email', $member->email);
            $request->session()->put('member_name', $member->first_name . ' ' . $member->last_name);
            return redirect()->route('reservation');
        }

        // Login failed — show themed error page
        return redirect()->route('login.failed');
    }

    // Show the login failed page
    public function loginFailed()
    {
        return view('pages.login-failed');
    }

    // Logout the member
    public function logout(Request $request)
    {
        $request->session()->forget(['member_id', 'member_email', 'member_name']);
        return redirect()->route('home');
    }
}
