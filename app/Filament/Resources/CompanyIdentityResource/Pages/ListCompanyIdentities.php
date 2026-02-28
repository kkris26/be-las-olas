<?php

namespace App\Filament\Resources\CompanyIdentityResource\Pages;

use App\Filament\Resources\CompanyIdentityResource;
use App\Models\CompanyIdentity;
use Filament\Resources\Pages\ListRecords;

class ListCompanyIdentities extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = CompanyIdentityResource::class;

    public function mount(): void
    {
        $record = CompanyIdentity::firstOrCreate([]);
        $this->redirect(CompanyIdentityResource::getUrl('edit', ['record' => $record]));
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
