<?php

namespace App\Filament\Resources\TestimonialSettingResource\Pages;

use App\Filament\Resources\TestimonialSettingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTestimonialSetting extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = TestimonialSettingResource::class;
}
