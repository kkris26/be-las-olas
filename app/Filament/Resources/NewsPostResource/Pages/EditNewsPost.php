<?php

namespace App\Filament\Resources\NewsPostResource\Pages;

use App\Filament\Resources\NewsPostResource;
use App\Services\FrontendCacheService;
use App\Services\PostCacheService;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditNewsPost extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = NewsPostResource::class;

    protected ?string $oldSlugEn = null;
    protected ?string $oldSlugId = null;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            $this->getSaveFormAction()
                ->submit(null)
                ->action('save'),
            Actions\DeleteAction::make()
                ->after(function () {
                    PostCacheService::invalidateAllForPost('news', $this->record);
                    $isRevalidated = FrontendCacheService::revalidate('news');

                    if ($isRevalidated) {
                        Notification::make()
                            ->success()
                            ->title('Deletion Complete')
                            ->body('The post has been removed from the website.')
                            ->send();
                    } else {
                        Notification::make()
                            ->danger()
                            ->title('Frontend Update Failed')
                            ->body('The website could not be updated. Please try again or contact the developer.')
                            ->send();
                    }
                }),
        ];
    }

    protected function beforeSave(): void
    {
        $this->oldSlugEn = $this->record->getTranslation('slug', 'en', false);
        $this->oldSlugId = $this->record->getTranslation('slug', 'id', false);
    }

    protected function afterSave(): void
    {
        PostCacheService::invalidateAllForPost('news', $this->record, $this->oldSlugEn, $this->oldSlugId);

        $isRevalidated = FrontendCacheService::revalidate('news');

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
