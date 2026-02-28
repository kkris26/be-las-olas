<?php

namespace App\Filament\Resources\NewsPostResource\Pages;

use App\Filament\Resources\NewsPostResource;
use App\Services\FrontendCacheService;
use App\Services\PostCacheService;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateNewsPost extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = NewsPostResource::class;

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
        PostCacheService::invalidateAllForPost('news', $this->record);

        $isRevalidated = FrontendCacheService::revalidate('news');

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
