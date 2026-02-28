<?php

namespace App\Filament\Resources\NewsPostResource\Pages;

use App\Filament\Resources\NewsPostResource;
use Filament\Resources\Pages\ListRecords;

class ListNewsPosts extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = NewsPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\CreateAction::make(),
        ];
    }
}
