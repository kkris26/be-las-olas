<?php

namespace App\Filament\Resources\LandServiceResource\Pages;

use App\Filament\Resources\LandServiceResource;
use App\Services\FrontendCacheService;
use App\Services\PostCacheService;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditLandService extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = LandServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            $this->getSaveFormAction()
                ->submit(null)
                ->action('save'),
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        PostCacheService::invalidateSingle('land-services');

        $isRevalidated = FrontendCacheService::revalidate('land-services');

        if ($isRevalidated) {
            Notification::make()
                ->success()
                ->title('Update Complete')
                ->body('Your changes are now live on the website.')
                ->send();
        } else {
            Notification::make()
                ->danger()
                ->title('Frontend Update Failed')
                ->body('The website could not be updated. Please try again or contact the developer.')
                ->send();
        }
    }
}
