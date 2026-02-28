<?php

namespace App\Filament\Resources\AboutPageResource\Pages;

use App\Filament\Resources\AboutPageResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAboutPage extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = AboutPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
        ];
    }
}
