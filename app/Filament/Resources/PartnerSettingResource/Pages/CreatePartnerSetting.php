<?php

namespace App\Filament\Resources\PartnerSettingResource\Pages;

use App\Filament\Resources\PartnerSettingResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePartnerSetting extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = PartnerSettingResource::class;
}
