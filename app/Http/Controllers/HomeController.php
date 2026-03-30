<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Display the introduction page
    public function index()
    {
        return view('pages.introduction');
    }
}
