<?php

namespace App\Filament\Resources\ArticlePostResource\Pages;

use App\Filament\Resources\ArticlePostResource;
use App\Services\FrontendCacheService;
use App\Services\PostCacheService;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;
use Filament\Notifications\Notification;

class CreateArticlePost extends CreateRecord
{
    use Translatable;

    protected static string $resource = ArticlePostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
            $this->getCreateFormAction()
                ->submit(null)
                ->action('create'),
        ];
    }

    protected function afterCreate(): void
    {
        PostCacheService::invalidateAllForPost('articles', $this->record);

        $isRevalidated = FrontendCacheService::revalidate('articles');

        if ($isRevalidated) {
            Notification::make()
                ->success()
                ->title('Creation Complete')
                ->body('The new post is now live on the website.')
                ->send();
        } else {
            Notification::make()
                ->danger()
                ->title('Frontend Update Failed')
                ->body('The new post could not be published. Please try again or contact the developer.')
                ->send();
        }
    }
}
