<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use App\Traits\HasImageCleanup;

class ContactSetting extends Model
{
    use HasFactory, HasTranslations, HasImageCleanup;

    protected $guarded = [];

    public $translatable = [
        'banner_title',
        'contact_heading',
        'contact_description',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];
}
