<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Traits\HasImageCleanup;

class CruiseService extends Model
{
    use HasFactory, HasTranslations, HasImageCleanup;

    protected $guarded = [];

    public $translatable = [
        'heading',
        'description',
        'button_text',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];
}
