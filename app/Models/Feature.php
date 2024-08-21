<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    // Ensure this matches your table name
    protected $table = 'features';

    // Allow mass assignment for these fields
    protected $fillable = [
        'name',
        'description',
        'pricedecimal',
        'image',
    ];
}