<?php

namespace App\Filament\Resources\ProfessionalTeamMemberResource\Pages;

use App\Filament\Resources\ProfessionalTeamMemberResource;
use App\Services\FrontendCacheService;
use App\Services\PostCacheService;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditProfessionalTeamMember extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = ProfessionalTeamMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            $this->getSaveFormAction()
                ->submit(null)
                ->action('save'),
            Actions\DeleteAction::make()
                ->after(function () {
                    PostCacheService::invalidateSingle('professional-team');
                    $isRevalidated = FrontendCacheService::revalidate('professional-team');

                    if ($isRevalidated) {
                        Notification::make()
                            ->success()
                            ->title('Deletion Complete')
                            ->body('The member has been removed from the website.')
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

    protected function afterSave(): void
    {
        PostCacheService::invalidateSingle('professional-team');

        $isRevalidated = FrontendCacheService::revalidate('professional-team');

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
