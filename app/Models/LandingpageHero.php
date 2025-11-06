<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingpageHero extends Model
{
    use HasFactory;

    protected $table = 'landingpage_heroes';

    protected $fillable = [
        'title',
        'description',
        'highlight_text',
        'primary_button_text',
        'primary_button_url',
        'secondary_button_text',
        'secondary_button_url',
        'stat_1_number',
        'stat_1_label',
        'stat_2_number',
        'stat_2_label',
        'stat_3_number',
        'stat_3_label',
        'background_image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
