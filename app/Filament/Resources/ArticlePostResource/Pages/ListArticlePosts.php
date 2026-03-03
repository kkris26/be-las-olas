<?php

namespace App\Filament\Resources\ArticlePostResource\Pages;

use App\Filament\Resources\ArticlePostResource;
use Filament\Resources\Pages\ListRecords;

class ListArticlePosts extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = ArticlePostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
            \Filament\Actions\CreateAction::make(),
        ];
    }
}
