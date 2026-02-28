<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use App\Traits\HasImageCleanup;

class OnboardingSetting extends Model
{
    use HasFactory, HasTranslations, HasImageCleanup;

    protected $guarded = [];

    public $translatable = [
        'banner_title',
        'subheading',
        'heading',
        'short_description',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];
}
