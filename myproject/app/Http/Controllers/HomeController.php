<?php

namespace App\Http\Controllers;
use function view;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home'); // This will return the 'home.blade.php' view
    }
}
