<?php

namespace App\Filament\Resources\NewsSettingResource\Pages;

use App\Filament\Resources\NewsSettingResource;
use App\Models\NewsSetting;
use Filament\Resources\Pages\ListRecords;

class ListNewsSettings extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = NewsSettingResource::class;

    // Single-record: auto-redirect to edit page of record #1
    public function mount(): void
    {
        $record = NewsSetting::firstOrCreate([]);
        $this->redirect(NewsSettingResource::getUrl('edit', ['record' => $record]));
    }

    protected function getHeaderActions(): array
    {
        return []; // no Create button
    }
}
