<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    // Specify the table associated with the model
    protected $table = 'feature';

    // Specify the primary key for the model
    protected $primaryKey = 'id';

    // Disable timestamps if your table doesn't use 'created_at' and 'updated_at'
    public $timestamps = true;

    // Define the attributes that are mass assignable
    protected $fillable = [
        'name',
        'description',
    ];

    // Optionally, you can define attributes that should be cast to specific types
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
