<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use App\Traits\HasImageCleanup;

class HomePage extends Model
{
    use HasFactory, HasTranslations, HasImageCleanup;

    protected $guarded = [];

    /**
     * All bilingual fields — both simple text and repeater arrays.
     * Spatie stores each as {"en": ..., "id": ...} JSON.
     * Repeater fields store the entire array per locale:
     * {"en": [{"heading": "...", ...}], "id": [{"heading": "...", ...}]}
     */
    public $translatable = [
        'hero_subheading',
        'hero_heading',
        'hero_description',
        'hero_button_text',

        'highlight_subheading',
        'highlight_heading',
        'highlight_description',
        'highlight_button_text',

        'cruise_subheading',
        'cruise_heading',
        'cruise_short_description',

        'land_subheading',
        'land_heading',
        'land_short_description',

        'news_subheading',
        'news_heading',
        'news_short_description',
        'news_button_text',

        // SEO
        'seo_title',
        'seo_description',
        'seo_keywords',

        // Repeater arrays — entire array stored per locale
        'statistics_items',
    ];
}
