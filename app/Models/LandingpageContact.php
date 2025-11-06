<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingpageContact extends Model
{
    use HasFactory;

    protected $table = 'landingpage_contacts';

    protected $fillable = [
        'type',
        'label',
        'value',
        'icon',
        'is_active',
    ];
}
