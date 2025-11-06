<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingpageRating extends Model
{
    use HasFactory;

    protected $table = 'landingpage_ratings';

    protected $fillable = [
        'category',
        'rating_value',
        'total_reviews',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'rating_value' => 'decimal:1',
    ];
}
