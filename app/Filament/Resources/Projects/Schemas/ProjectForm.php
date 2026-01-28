<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('client_name'),
                TextInput::make('year')
                    ->numeric(),
                TextInput::make('category_id')
                    ->numeric(),
                FileUpload::make('featured_image')
                    ->image()
                    ->disk('public'),
                FileUpload::make('before_image')
                    ->image()
                    ->disk('public'),
                FileUpload::make('after_image')
                    ->image()
                    ->disk('public'),
                Textarea::make('scope')
                    ->columnSpanFull(),
                Textarea::make('technologies')
                    ->columnSpanFull(),
                Toggle::make('is_featured')
                    ->required(),
                Toggle::make('is_published')
                    ->required(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
