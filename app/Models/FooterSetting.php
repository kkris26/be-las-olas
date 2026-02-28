<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use App\Traits\HasImageCleanup;

class FooterSetting extends Model
{
    use HasFactory, HasTranslations, HasImageCleanup;

    protected $guarded = [];

    /**
     * All headings, copyright text, and the footer_services repeater
     * (which contains a translatable title per item) are stored per locale.
     */
    public $translatable = [
        'footer_link_heading',
        'footer_service_heading',
        'footer_location_heading',
        'footer_services',         // repeater — title is translatable
        'footer_left_description',
        'footer_copyright_text',   // contains :year placeholder
    ];

    /**
     * footer_brand_logos contains only image paths — no translation.
     */
    protected $casts = [
        'footer_brand_logos' => 'array',
    ];
}
