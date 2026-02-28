<?php

namespace App\Filament\Resources\PartnerSettingResource\Pages;

use App\Filament\Resources\PartnerSettingResource;
use App\Models\PartnerSetting;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPartnerSettings extends ListRecords
{
    protected static string $resource = PartnerSettingResource::class;

    public function mount(): void
    {
        parent::mount();
        $record = PartnerSetting::first();
        if ($record) {
            $this->redirect(PartnerSettingResource::getUrl('edit', ['record' => $record->getKey()]));
        } else {
            $this->redirect(PartnerSettingResource::getUrl('create'));
        }
    }

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
