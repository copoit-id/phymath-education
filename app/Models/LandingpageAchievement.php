<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingpageAchievement extends Model
{
    use HasFactory;

    protected $table = 'landingpage_achievements';

    protected $fillable = [
        'student_name',
        'school',
        'achievement',
        'before_score',
        'after_score',
        'improvement',
        'photo',
        'description',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
