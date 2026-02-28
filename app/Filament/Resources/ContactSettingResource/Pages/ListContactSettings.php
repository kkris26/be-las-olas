<?php

namespace App\Filament\Resources\ContactSettingResource\Pages;

use App\Filament\Resources\ContactSettingResource;
use App\Models\ContactSetting;
use Filament\Resources\Pages\ListRecords;

class ListContactSettings extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = ContactSettingResource::class;

    // Single-record: auto-redirect to edit page of record #1
    public function mount(): void
    {
        $record = ContactSetting::firstOrCreate([]);
        $this->redirect(ContactSettingResource::getUrl('edit', ['record' => $record]));
    }

    protected function getHeaderActions(): array
    {
        return []; // no Create button
    }
}
