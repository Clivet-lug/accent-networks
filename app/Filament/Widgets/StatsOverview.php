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

    protected static bool $isLazy = true; // Enable lazy loading for better performance

    protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {
        $servicesCount = Service::where('is_active', true)->count();
        $projectsCount = Project::count();
        $clientsCount = Client::count();
        $publishedPostsCount = BlogPost::where('is_published', true)->count();

        return [
            Stat::make('Active ICT services', $servicesCount)
                ->description('Services offered')
                ->descriptionIcon('heroicon-m-wrench-screwdriver')
                ->color('primary')
                ->chart([3, 5, 7, 10, 12, $servicesCount]),

            Stat::make('Completed projects', $projectsCount)
                ->description('Successfully delivered')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success')
                ->chart([2, 5, 10, 15, 20, $projectsCount]),

            Stat::make('Trusted partners', $clientsCount)
                ->description('Active clients')
                ->descriptionIcon('heroicon-m-building-office-2')
                ->color('warning')
                ->chart([5, 10, 15, 20, 25, $clientsCount]),

            Stat::make('Published articles', $publishedPostsCount)
                ->description('Blog posts live')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('info')
                ->chart([1, 3, 5, 8, 10, $publishedPostsCount]),
        ];
    }
}
