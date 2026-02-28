<?php

namespace App\Filament\Resources\CompanyIdentityResource\Pages;

use App\Filament\Resources\CompanyIdentityResource;
use App\Services\FrontendCacheService;
use App\Services\PostCacheService;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditCompanyIdentity extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = CompanyIdentityResource::class;

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
        PostCacheService::invalidateSingle('company-identity');

        $isRevalidated = FrontendCacheService::revalidate('company-identity');

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
