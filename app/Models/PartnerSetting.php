<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use App\Traits\HasImageCleanup;

class PartnerSetting extends Model
{
    use HasFactory, HasTranslations, HasImageCleanup;

    protected $guarded = [];

    public $translatable = [
        'partner_heading',
        'partner_description',
    ];

    protected $casts = [
        'partner_logos' => 'array',
    ];
}
