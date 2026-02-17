<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestProjectsWidget extends BaseWidget
{
    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 'full';

    protected static bool $isLazy = true; // Enable lazy loading

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Project::query()
                    ->latest('created_at')
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image')
                    ->label('Image')
                    ->circular()
                    ->size(50)
                    ->defaultImageUrl(url('/images/placeholders/project.jpg')),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->weight('bold')
                    ->color('primary'),

                Tables\Columns\TextColumn::make('client')
                    ->searchable()
                    ->sortable()
                    ->label('Client')
                    ->color('gray'),

                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color('success')
                    ->label('Category'),

                Tables\Columns\TextColumn::make('created_at')
                    ->date('M j, Y')
                    ->sortable()
                    ->label('Created')
                    ->color('gray'),
            ])
            ->defaultSort('created_at', 'desc');
    }

    protected function getTableHeading(): string
    {
        return 'Latest Projects';
    }
}
