<?php

namespace App\Filament\Resources\CompanyIdentityResource\Pages;

use App\Filament\Resources\CompanyIdentityResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCompanyIdentity extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = CompanyIdentityResource::class;
}
