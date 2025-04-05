<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'tagline',
        'name',
        'designation',
        'skill',
        'image',
        'description',
        'status',
    ];
}
