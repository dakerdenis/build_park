<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client; // Import the Client model

class AdminDashboardController extends Controller
{
    public function index($section = null) // Provide a default value here
    {
        // Fetch all clients from the database
        $clients = Client::all();

        // Pass the clients and section to the view
        return view('admin.dashboard', compact('section', 'clients'));
    }
}
