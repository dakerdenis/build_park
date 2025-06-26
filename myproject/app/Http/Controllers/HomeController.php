<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Category;
class HomeController extends Controller
{
    public function index()
    {
        // Fetch all clients from the database
        $clients = Client::all();
        $categories = Category::orderBy('order')->get();
        // Pass the clients to the home view
        return view('home', compact('clients', 'categories'));
    }
}
