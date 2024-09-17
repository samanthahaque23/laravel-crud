<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    // Display a listing of the food menu items
    public function index()
    {
        $foods = Food::all();
        return view('foods.index', compact('foods'));
    }

    // Show the form for creating a new food item
    public function create()
    {
        return view('foods.create');
    }

    // Store a newly created food item in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        Food::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'allergen' => $request->allergen,
            'image' => $imagePath,
        ]);

        return redirect()->route('foods.index');
    }

    // Display the specified food item
    public function show(Food $food)
    {
        return view('foods.show', compact('food'));
    }

    // Show the form for editing the specified food item
    public function edit(Food $food)
    {
        return view('foods.edit', compact('food'));
    }

    // Update the specified food item in storage
    public function update(Request $request, Food $food)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if a new one is uploaded
            if ($food->image) {
                Storage::delete('public/' . $food->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = $food->image;
        }

        $food->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'allergen' => $request->allergen,
            'image' => $imagePath,
        ]);

        return redirect()->route('foods.index');
    }

    // Remove the specified food item from storage
    public function destroy(Food $food)
    {
        if ($food->image) {
            Storage::delete('public/' . $food->image);
        }
        $food->delete();
        return redirect()->route('foods.index');
    }
}
