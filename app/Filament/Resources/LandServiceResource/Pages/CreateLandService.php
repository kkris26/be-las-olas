<?php

namespace App\Filament\Resources\LandServiceResource\Pages;

use App\Filament\Resources\LandServiceResource;
use App\Services\FrontendCacheService;
use App\Services\PostCacheService;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateLandService extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = LandServiceResource::class;

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
        PostCacheService::invalidateSingle('land-services');

        $isRevalidated = FrontendCacheService::revalidate('land-services');

        if ($isRevalidated) {
            Notification::make()
                ->success()
                ->title('Creation Complete')
                ->body('The new land service is now live on the website.')
                ->send();
        } else {
            Notification::make()
                ->danger()
                ->title('Frontend Update Failed')
                ->body('The new entry could not be published. Please try again or contact the developer.')
                ->send();
        }
    }
}
