<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'designation',
        'company_name',
        'location',
        'duration',
        'description',
        'status',
    ];
}
