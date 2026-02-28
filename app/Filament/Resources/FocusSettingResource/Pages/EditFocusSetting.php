<?php

namespace App\Filament\Resources\FocusSettingResource\Pages;

use App\Filament\Resources\FocusSettingResource;
use App\Services\FrontendCacheService;
use App\Services\PostCacheService;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditFocusSetting extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = FocusSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            $this->getSaveFormAction()
                ->submit(null)
                ->action('save'),
        ];
    }

    protected function afterSave(): void
    {
        PostCacheService::invalidateSingle('focus-setting');

        $isRevalidated = FrontendCacheService::revalidate('focus');

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
