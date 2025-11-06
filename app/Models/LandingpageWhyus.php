<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingpageWhyus extends Model
{
    use HasFactory;

    protected $table = 'landingpage_whyus';

    protected $fillable = [
        'title',
        'description',
        'icon',
        'card_title',
        'card_description',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
