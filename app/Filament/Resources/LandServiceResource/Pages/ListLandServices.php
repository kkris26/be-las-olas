<?php

namespace App\Filament\Resources\LandServiceResource\Pages;

use App\Filament\Resources\LandServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLandServices extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = LandServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
