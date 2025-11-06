<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingpageTestimony extends Model
{
    use HasFactory;

    protected $table = 'landingpage_testimonies';

    protected $fillable = [
        'name',
        'school',
        'message',
        'photo',
        'rating',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'rating' => 'integer',
    ];
}
