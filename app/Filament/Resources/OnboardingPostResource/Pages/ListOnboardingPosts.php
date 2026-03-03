<?php

namespace App\Filament\Resources\OnboardingPostResource\Pages;

use App\Filament\Resources\OnboardingPostResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;

class ListOnboardingPosts extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = OnboardingPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
            \Filament\Actions\CreateAction::make(),
        ];
    }
}
