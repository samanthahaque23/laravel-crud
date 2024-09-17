<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch all food items
        $foods = Food::all();

        // Pass foods to the dashboard view
        return view('dashboard', compact('foods'));
    }
}
