<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;
use App\Models\Food;

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route (requires authentication and email verification)
Route::get('/dashboard', function () {
    $foods = Food::all();
    return view('dashboard', compact('foods'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Authentication routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Food CRUD routes
    Route::resource('foods', FoodController::class);
});

// Include authentication routes (register, login, etc.)
require __DIR__.'/auth.php';
