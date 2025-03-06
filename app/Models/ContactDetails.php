<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDetails extends Model
{
    protected $fillable = [
        'image',
        'title',
        'subtitle',
        'mobile',
        'email',
        'description',
        'status',
    ];
}
