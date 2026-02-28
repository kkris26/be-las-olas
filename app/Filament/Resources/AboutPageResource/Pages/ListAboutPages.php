<?php

namespace App\Filament\Resources\AboutPageResource\Pages;

use App\Filament\Resources\AboutPageResource;
use App\Models\AboutPage;
use Filament\Resources\Pages\ListRecords;

class ListAboutPages extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = AboutPageResource::class;

    // Single-record: auto-redirect to edit page of record #1
    public function mount(): void
    {
        $record = AboutPage::firstOrCreate([]);
        $this->redirect(AboutPageResource::getUrl('edit', ['record' => $record]));
    }

    protected function getHeaderActions(): array
    {
        return []; // no Create button
    }
}
