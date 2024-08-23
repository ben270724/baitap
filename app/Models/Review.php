<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory; 
    
    protected $table = 'reviews';
    // Define the fillable attributes
    protected $fillable = [
        'product_id',
        'rating',
        'comment',
        'name',
        'description',
        'pricedecimal',
        // Add any other fields that should be mass assignable
    ];
}