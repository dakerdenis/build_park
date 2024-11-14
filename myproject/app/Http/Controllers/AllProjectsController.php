<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AllProjectsController extends Controller
{
    // Show the Projects page
    public function index()
    {
        return view('projects'); // Ensure you create the projects.blade.php view
    }
}
