<?php

namespace App\Filament\Resources\ArticleSettingResource\Pages;

use App\Filament\Resources\ArticleSettingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateArticleSetting extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = ArticleSettingResource::class;
}
