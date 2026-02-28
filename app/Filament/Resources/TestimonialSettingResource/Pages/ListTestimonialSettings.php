<?php

namespace App\Filament\Resources\TestimonialSettingResource\Pages;

use App\Filament\Resources\TestimonialSettingResource;
use App\Models\TestimonialSetting;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTestimonialSettings extends ListRecords
{
    protected static string $resource = TestimonialSettingResource::class;

    public function mount(): void
    {
        parent::mount();
        $record = TestimonialSetting::first();
        if ($record) {
            $this->redirect(TestimonialSettingResource::getUrl('edit', ['record' => $record->getKey()]));
        } else {
            $this->redirect(TestimonialSettingResource::getUrl('create'));
        }
    }

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
