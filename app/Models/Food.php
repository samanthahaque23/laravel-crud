<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    // Specify the correct table name
    protected $table = 'foods';

    // Allow mass assignment on these fields
    protected $fillable = ['name', 'price', 'description', 'allergen', 'image'];
}
