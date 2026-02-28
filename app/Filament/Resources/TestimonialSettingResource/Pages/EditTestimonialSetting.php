<?php

namespace App\Filament\Resources\TestimonialSettingResource\Pages;

use App\Filament\Resources\TestimonialSettingResource;
use App\Services\FrontendCacheService;
use App\Services\PostCacheService;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditTestimonialSetting extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = TestimonialSettingResource::class;

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
        PostCacheService::invalidateSingle('testimonial-setting');

        $isRevalidated = FrontendCacheService::revalidate('testimonial-setting');

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
