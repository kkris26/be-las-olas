<?php

namespace App\Filament\Resources\NewsSettingResource\Pages;

use App\Filament\Resources\NewsSettingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateNewsSetting extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = NewsSettingResource::class;
}
