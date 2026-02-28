<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use App\Traits\HasImageCleanup;

class CompanyIdentity extends Model
{
    use HasFactory, HasTranslations, HasImageCleanup;

    protected $guarded = [];

    /**
     * Fields stored as per-locale JSON via Spatie Translatable.
     *
     * contact_items and location_items are full repeater arrays stored
     * per locale so that translatable fields inside (label, title, address)
     * are editable via the Filament LocaleSwitcher.
     */
    public $translatable = [
        'tagline',
        'contact_items',   // repeater — label is translatable
        'location_items',  // repeater — title & address are translatable
    ];

    /**
     * social_items has no translatable fields — stored as plain JSON.
     */
    protected $casts = [
        'social_items' => 'array',
    ];
}
