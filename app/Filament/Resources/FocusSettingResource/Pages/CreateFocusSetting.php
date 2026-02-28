<?php

namespace App\Filament\Resources\FocusSettingResource\Pages;

use App\Filament\Resources\FocusSettingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFocusSetting extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = FocusSettingResource::class;
}
