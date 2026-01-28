<?php

namespace App\Filament\Widgets;

use App\Models\BlogPost;
use App\Models\Client;
use App\Models\Project;
use App\Models\Service;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Services', Service::count())
                ->description('Active ICT services')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('primary')
                ->chart([7, 12, 15, 18, 21, Service::count()]),

            Stat::make('Total Projects', Project::count())
                ->description('Completed projects')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success')
                ->chart([5, 10, 15, 20, 25, Project::count()]),

            Stat::make('Total Clients', Client::count())
                ->description('Trusted partners')
                ->descriptionIcon('heroicon-m-users')
                ->color('warning'),

            Stat::make('Blog Posts', BlogPost::where('is_published', true)->count())
                ->description('Published articles')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('info'),
        ];
    }
}
