<?php

namespace App\Filament\Resources\HomePageResource\Pages;

use App\Filament\Resources\HomePageResource;
use App\Models\HomePage;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHomePages extends ListRecords
{
    protected static string $resource = HomePageResource::class;

    /**
     * Home Page is a singleton settings record.
     * Redirect straight to Edit if a record already exists,
     * or to Create if it has not been seeded yet.
     */
    public function mount(): void
    {
        parent::mount();

        $record = HomePage::first();

        if ($record) {
            $this->redirect(HomePageResource::getUrl('edit', ['record' => $record->getKey()]));
        } else {
            $this->redirect(HomePageResource::getUrl('create'));
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
