<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterControl extends Model
{
    protected $fillable = [
        'logo',
        'favicon',
        'resume',
        'pricing_status',
        'github_link',
        'linkedin_link',
        'portfolio_quote',
        'experience',
    ];
}
