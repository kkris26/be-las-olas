<?php

namespace App\Filament\Resources\FooterSettingResource\Pages;

use App\Filament\Resources\FooterSettingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFooterSetting extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = FooterSettingResource::class;
}
