<?php

namespace App\Filament\Resources\FooterSettingResource\Pages;

use App\Filament\Resources\FooterSettingResource;
use App\Models\FooterSetting;
use Filament\Resources\Pages\ListRecords;

class ListFooterSettings extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = FooterSettingResource::class;

    public function mount(): void
    {
        $record = FooterSetting::firstOrCreate([]);
        $this->redirect(FooterSettingResource::getUrl('edit', ['record' => $record]));
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
