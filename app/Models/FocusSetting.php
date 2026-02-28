<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use App\Traits\HasImageCleanup;

class FocusSetting extends Model
{
    use HasFactory, HasTranslations, HasImageCleanup;

    protected $guarded = [];

    public $translatable = [
        'focus_heading',
        'focus_description',
        'focus_items',          // per-locale repeater array
    ];

    protected $casts = [
        'use_focus_bg_mobile' => 'boolean',
    ];
}
