<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ReservationController;

// Introduction page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Registration routes
Route::get('/register', [MemberController::class, 'showRegister'])->name('register');
Route::post('/register', [MemberController::class, 'register']);

// Login routes
Route::get('/login', [MemberController::class, 'showLogin'])->name('login');
Route::post('/login', [MemberController::class, 'login']);
Route::get('/login-failed', [MemberController::class, 'loginFailed'])->name('login.failed');
Route::post('/logout', [MemberController::class, 'logout'])->name('logout');

// Reservation routes
Route::get('/reservation', [ReservationController::class, 'showForm'])->name('reservation');
Route::post('/reservation', [ReservationController::class, 'reserve']);

// Thank you page
Route::get('/thank-you', [ReservationController::class, 'thankYou'])->name('thankyou');
