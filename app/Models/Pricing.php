<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $fillable = [
        'plan',
        'title',
        'subtitle',
        'price',
        'serviceOne',
        'serviceTwo',
        'description',
        'recommended',
        'status',
    ];
}
