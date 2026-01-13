<?php

namespace App\Filament\Resources\HeroSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HeroSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('page')
                    ->required(),
                TextInput::make('headline')
                    ->required(),
                Textarea::make('subheadline')
                    ->columnSpanFull(),
                FileUpload::make('background_image')
                    ->image()
                    ->required(),
                TextInput::make('background_video'),
                Toggle::make('use_video')
                    ->required(),
                TextInput::make('cta_text'),
                TextInput::make('cta_link'),
                Toggle::make('show_cta')
                    ->required(),
                TextInput::make('text_alignment')
                    ->required()
                    ->default('center'),
                TextInput::make('text_color')
                    ->required()
                    ->default('light'),
                TextInput::make('overlay_color')
                    ->required()
                    ->default('rgba(0,62,126,0.5)'),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
