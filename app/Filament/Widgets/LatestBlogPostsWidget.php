<?php

namespace App\Filament\Widgets;

use App\Models\BlogPost;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestBlogPostsWidget extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    protected static bool $isLazy = true; // Enable lazy loading

    public function table(Table $table): Table
    {
        return $table
            ->query(
                BlogPost::query()
                    ->latest('published_at')
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image')
                    ->label('Image')
                    ->circular()
                    ->size(50)
                    ->defaultImageUrl(url('/images/placeholders/blog.jpg')),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->weight('bold')
                    ->color('primary'),

                Tables\Columns\IconColumn::make('is_published')
                    ->boolean()
                    ->label('Status')
                    ->sortable()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),

                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->label('Date')
                    ->color('gray'),

                Tables\Columns\TextColumn::make('views')
                    ->sortable()
                    ->label('Views')
                    ->default(0)
                    ->badge()
                    ->color('info'),
            ])
            ->defaultSort('published_at', 'desc');
    }

    protected function getTableHeading(): string
    {
        return 'Latest Blog Posts';
    }
}
