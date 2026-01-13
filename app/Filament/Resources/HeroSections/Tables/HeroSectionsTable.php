<?php

namespace App\Filament\Resources\HeroSections\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HeroSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('page')
                    ->searchable(),
                TextColumn::make('headline')
                    ->searchable(),
                ImageColumn::make('background_image'),
                TextColumn::make('background_video')
                    ->searchable(),
                IconColumn::make('use_video')
                    ->boolean(),
                TextColumn::make('cta_text')
                    ->searchable(),
                TextColumn::make('cta_link')
                    ->searchable(),
                IconColumn::make('show_cta')
                    ->boolean(),
                TextColumn::make('text_alignment')
                    ->searchable(),
                TextColumn::make('text_color')
                    ->searchable(),
                TextColumn::make('overlay_color')
                    ->searchable(),
                IconColumn::make('is_active')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
