<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                // LOGO UPLOAD
                FileUpload::make('logo')
                    ->image()
                    ->directory('clients')
                    ->maxSize(2048)
                    ->imageEditor()
                    ->columnSpanFull(),

                TextInput::make('website_url')
                    ->url()
                    ->maxLength(255),

                Textarea::make('description')
                    ->rows(3)
                    ->maxLength(500)
                    ->columnSpanFull(),

                TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->required(),

                Toggle::make('is_featured')
                    ->default(false)
                    ->required(),

                Toggle::make('is_active')
                    ->default(true)
                    ->required(),
            ]);
    }
}
