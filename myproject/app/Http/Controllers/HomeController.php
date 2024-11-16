<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all clients from the database
        $clients = Client::all();

        // Pass the clients to the home view
        return view('home', compact('clients'));
    }
}
