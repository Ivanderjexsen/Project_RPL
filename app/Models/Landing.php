<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'info_cards',
        'features'
    ];

    protected $casts = [
        'info_cards' => 'array',
        'features' => 'array',
    ];
}
