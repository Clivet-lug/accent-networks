<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                // BASIC INFORMATION
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state)))
                    ->columnSpan(2),

                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->helperText('Auto-generated from name')
                    ->columnSpan(1),

                Textarea::make('short_description')
                    ->rows(2)
                    ->maxLength(200)
                    ->helperText('Brief description for cards (max 200 chars)')
                    ->columnSpanFull(),

                RichEditor::make('description')
                    ->required()
                    ->toolbarButtons([
                        'attachFiles',
                        'blockquote',
                        'bold',
                        'bulletList',
                        'codeBlock',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'table',
                        'underline',
                        'undo',
                    ])
                    ->helperText('Full service description — supports headings, bullets, tables, links')
                    ->columnSpanFull(),

                // FEATURED IMAGE
                FileUpload::make('featured_image')
                    ->label('Featured Image')
                    ->image()
                    ->directory('service-images')
                    ->maxSize(2048)
                    ->imageEditor()
                    ->helperText('Main service image (shown on cards and detail page)')
                    ->columnSpanFull(),

                // GALLERY IMAGES
                FileUpload::make('gallery_images')
                    ->label('Gallery Images')
                    ->image()
                    ->directory('service-images/gallery')
                    ->multiple()
                    ->maxFiles(10)
                    ->maxSize(2048)
                    ->imageEditor()
                    ->reorderable()
                    ->helperText('Additional images for the service gallery (optional, max 10)')
                    ->columnSpanFull(),

                // BEFORE/AFTER IMAGES
                FileUpload::make('before_image')
                    ->label('Before Image')
                    ->image()
                    ->directory('service-images')
                    ->maxSize(2048)
                    ->imageEditor()
                    ->helperText('Before implementation (optional)')
                    ->columnSpan(1),

                FileUpload::make('after_image')
                    ->label('After Image')
                    ->image()
                    ->directory('service-images')
                    ->maxSize(2048)
                    ->imageEditor()
                    ->helperText('After implementation (optional)')
                    ->columnSpan(1),

                // CTA SETTINGS
                TextInput::make('cta_text')
                    ->label('CTA Button Text')
                    ->default('Get a Quote')
                    ->required()
                    ->maxLength(50)
                    ->columnSpan(1),

                TextInput::make('cta_link')
                    ->label('CTA Button Link')
                    ->default('/contact')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(2),

                // DISPLAY SETTINGS
                TextInput::make('order')
                    ->label('Display Order')
                    ->numeric()
                    ->default(0)
                    ->required()
                    ->helperText('Lower numbers appear first')
                    ->columnSpan(1),

                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true)
                    ->required()
                    ->helperText('Make service visible on website')
                    ->columnSpan(1),
            ]);
    }
}
