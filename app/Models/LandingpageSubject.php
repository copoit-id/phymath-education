<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingpageSubject extends Model
{
    use HasFactory;

    protected $table = 'landingpage_subjects';

    protected $fillable = [
        'title',
        'description',
        'icon',
        'image',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
