<?php

namespace App\Filament\Resources\TestimonialResource\Pages;

use App\Filament\Resources\TestimonialResource;
use App\Services\FrontendCacheService;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateTestimonial extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = TestimonialResource::class;

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
        // Revalidate frontend cache after creating
        $isRevalidated = FrontendCacheService::revalidate('testimonials');

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
