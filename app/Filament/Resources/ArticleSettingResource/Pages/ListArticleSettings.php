<?php

namespace App\Filament\Resources\ArticleSettingResource\Pages;

use App\Filament\Resources\ArticleSettingResource;
use App\Models\ArticleSetting;
use Filament\Resources\Pages\ListRecords;

class ListArticleSettings extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = ArticleSettingResource::class;

    // Single-record: auto-redirect to edit page of record #1
    public function mount(): void
    {
        $record = ArticleSetting::firstOrCreate([]);
        $this->redirect(ArticleSettingResource::getUrl('edit', ['record' => $record]));
    }

    protected function getHeaderActions(): array
    {
        return []; // no Create button
    }
}
