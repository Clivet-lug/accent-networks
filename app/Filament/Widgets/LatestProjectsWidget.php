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

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Project::query()
                    ->latest()
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image')
                    ->label('Image')
                    ->circular()
                    ->defaultImageUrl(url('/images/placeholders/project.jpg')),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('client')
                    ->searchable()
                    ->sortable()
                    ->label('Client'),

                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color('primary')
                    ->label('Category'),

                Tables\Columns\TextColumn::make('completion_date')
                    ->date('M j, Y')
                    ->sortable()
                    ->label('Completed'),
            ]);
    }

    protected function getTableHeading(): string
    {
        return 'Latest Projects';
    }
}
