<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                // MAIN CONTENT - Left Column (2/3 width)
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state)))
                    ->columnSpan(2),

                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->helperText('Auto-generated from title')
                    ->columnSpan(1),

                Textarea::make('description')
                    ->required()
                    ->rows(4)
                    ->helperText('Brief project description')
                    ->columnSpanFull(),

                Textarea::make('scope')
                    ->rows(3)
                    ->helperText('Project scope and deliverables (optional)')
                    ->columnSpanFull(),

                Textarea::make('technologies')
                    ->rows(3)
                    ->helperText('Technologies and tools used (optional)')
                    ->columnSpanFull(),

                // CLIENT & DETAILS - Row
                TextInput::make('client_name')
                    ->maxLength(255)
                    ->helperText('Client name (optional)')
                    ->columnSpan(1),

                TextInput::make('year')
                    ->numeric()
                    ->minValue(2000)
                    ->maxValue(2100)
                    ->helperText('Year completed')
                    ->columnSpan(1),

                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->helperText('Project category')
                    ->columnSpan(1),

                // IMAGES SECTION
                FileUpload::make('featured_image')
                    ->label('Featured Image')
                    ->image()
                    ->directory('project-images')
                    ->maxSize(2048)
                    ->imageEditor()
                    ->helperText('Main project image')
                    ->columnSpanFull(),

                FileUpload::make('before_image')
                    ->label('Before Image')
                    ->image()
                    ->directory('project-images')
                    ->maxSize(2048)
                    ->imageEditor()
                    ->helperText('Before implementation (optional)')
                    ->columnSpan(1),

                FileUpload::make('after_image')
                    ->label('After Image')
                    ->image()
                    ->directory('project-images')
                    ->maxSize(2048)
                    ->imageEditor()
                    ->helperText('After implementation (optional)')
                    ->columnSpan(1),

                // GALLERY - Will handle with Spatie Media Library separately
                // For now, keep it simple with single uploads

                // SETTINGS
                Toggle::make('is_published')
                    ->label('Published')
                    ->default(true)
                    ->required()
                    ->helperText('Make project visible on website')
                    ->columnSpan(1),

                Toggle::make('is_featured')
                    ->label('Featured')
                    ->default(false)
                    ->required()
                    ->helperText('Show on homepage')
                    ->columnSpan(1),

                TextInput::make('order')
                    ->label('Display Order')
                    ->numeric()
                    ->default(0)
                    ->required()
                    ->helperText('Lower numbers appear first')
                    ->columnSpan(1),
            ]);
    }
}
