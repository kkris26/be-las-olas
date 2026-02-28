<?php

namespace App\Filament\Resources\ArticlePostResource\Pages;

use App\Filament\Resources\ArticlePostResource;
use Filament\Resources\Pages\ListRecords;

class ListArticlePosts extends ListRecords
{
    protected static string $resource = ArticlePostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\CreateAction::make(),
        ];
    }
}
