<?php

namespace App\Filament\Resources\BoardMemberResource\Pages;

use App\Filament\Resources\BoardMemberResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBoardMembers extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = BoardMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\LocaleSwitcher::make(), Actions\CreateAction::make()];
    }
}
