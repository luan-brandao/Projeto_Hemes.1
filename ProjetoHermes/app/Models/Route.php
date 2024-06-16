<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = [
        'name', 'coordinates',
    ];

    protected $casts = [
        'coordinates' => 'array',
    ];
}
