<?php

namespace App\Filament\Resources\FocusSettingResource\Pages;

use App\Filament\Resources\FocusSettingResource;
use App\Models\FocusSetting;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFocusSettings extends ListRecords
{
    protected static string $resource = FocusSettingResource::class;

    public function mount(): void
    {
        parent::mount();
        $record = FocusSetting::first();
        if ($record) {
            $this->redirect(FocusSettingResource::getUrl('edit', ['record' => $record->getKey()]));
        } else {
            $this->redirect(FocusSettingResource::getUrl('create'));
        }
    }

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
