<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index($section = null) // Provide a default value here
    {
        return view('admin.dashboard', compact('section'));
    }
}
