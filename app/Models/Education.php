<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'course_name',
        'organization_name',
        'duration',
        'grade',
        'percentage',
        'description',
        'status',
    ];
}
