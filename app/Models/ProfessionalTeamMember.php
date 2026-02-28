<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use App\Traits\HasImageCleanup;

class ProfessionalTeamMember extends Model
{
    use HasFactory, HasTranslations, HasImageCleanup;

    protected $table = 'professional_team_members';

    protected $guarded = [];

    public $translatable = [
        'role',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];
}
