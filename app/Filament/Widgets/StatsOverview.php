<?php

namespace App\Filament\Widgets;

use App\Models\ArticlePost;
use App\Models\NewsPost;
use App\Models\OnboardingPost;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        return [
            Stat::make('News Posts', NewsPost::count())
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success')
                ->url(url('/admin/news-posts')),
            Stat::make('Articles', ArticlePost::count())
                ->chart([15, 4, 6, 12, 8, 14, 10])
                ->color('info')
                ->url(url('/admin/article-posts')),
            Stat::make('Onboarding', OnboardingPost::count())
                ->chart([10, 12, 8, 15, 12, 18, 14])
                ->color('warning')
                ->url(url('/admin/onboarding-posts')),
        ];
    }
}
