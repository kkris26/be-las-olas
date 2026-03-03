<?php

namespace App\Filament\Resources\CruiseServiceResource\Pages;

use App\Filament\Resources\CruiseServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCruiseServices extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = CruiseServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
