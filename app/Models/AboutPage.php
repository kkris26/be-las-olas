<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use App\Traits\HasImageCleanup;

class AboutPage extends Model
{
    use HasFactory, HasTranslations, HasImageCleanup;

    protected $guarded = [];

    /**
     * All bilingual text/WYSIWYG fields resolved by Spatie per locale.
     * value_items is stored as a per-locale array:
     *   {"en": [{title, content}, ...], "id": [{title, content}, ...]}
     */
    public $translatable = [
        'banner_title',

        'owner_headline',
        'owner_message',
        'owner_name',
        'owner_position',

        'about_headline',
        'about_description',

        'value_subheading',
        'value_heading',
        'value_description',
        'value_items',           // Repeater — per-locale array

        'collaboration_heading',
        'collaboration_description',

        'certified_heading',
        'certified_description',

        'director_heading',
        'director_description',
        'team_heading',
        'team_description',

        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    /**
     * certified_logos contains only images — no translation needed.
     */
    protected $casts = [
        'certified_logos' => 'array',
    ];
}
