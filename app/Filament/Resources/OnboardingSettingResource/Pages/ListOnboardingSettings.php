<?php

namespace App\Filament\Resources\OnboardingSettingResource\Pages;

use App\Filament\Resources\OnboardingSettingResource;
use App\Models\OnboardingSetting;
use Filament\Resources\Pages\ListRecords;

class ListOnboardingSettings extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = OnboardingSettingResource::class;

    // Single-record: auto-redirect to edit page of record #1
    public function mount(): void
    {
        $record = OnboardingSetting::firstOrCreate([]);
        $this->redirect(OnboardingSettingResource::getUrl('edit', ['record' => $record]));
    }

    protected function getHeaderActions(): array
    {
        return []; // no Create button
    }
}
