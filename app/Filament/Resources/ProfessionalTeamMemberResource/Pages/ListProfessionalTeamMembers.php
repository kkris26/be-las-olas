<?php

namespace App\Filament\Resources\ProfessionalTeamMemberResource\Pages;

use App\Filament\Resources\ProfessionalTeamMemberResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProfessionalTeamMembers extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = ProfessionalTeamMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\LocaleSwitcher::make(), Actions\CreateAction::make()];
    }
}
