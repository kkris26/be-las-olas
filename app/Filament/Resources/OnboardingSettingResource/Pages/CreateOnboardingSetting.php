<?php

namespace App\Filament\Resources\OnboardingSettingResource\Pages;

use App\Filament\Resources\OnboardingSettingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOnboardingSetting extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = OnboardingSettingResource::class;
}
