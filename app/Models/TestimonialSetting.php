<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use App\Traits\HasImageCleanup;

class TestimonialSetting extends Model
{
    use HasFactory, HasTranslations, HasImageCleanup;

    protected $guarded = [];

    public $translatable = [
        'testimonial_heading',
        'testimonial_description',
        'testimonial_button_text',
    ];
}
