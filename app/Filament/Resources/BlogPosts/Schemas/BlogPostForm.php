<?php

namespace App\Filament\Resources\BlogPosts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BlogPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),

                TextInput::make('slug')
                    ->required()
                    ->helperText('Auto-generated from title'),

                Textarea::make('excerpt')
                    ->rows(3)
                    ->helperText('Short summary of the post (optional)')
                    ->columnSpanFull(),

                Textarea::make('content')
                    ->required()
                    ->rows(10)
                    ->columnSpanFull(),

                FileUpload::make('featured_image')
                    ->image()
                    ->directory('blog-images')
                    ->maxSize(2048)
                    ->helperText('Upload featured image (optional)'),

                Select::make('category')
                    ->options([
                        'Technology' => 'Technology',
                        'Networking' => 'Networking',
                        'Telecommunications' => 'Telecommunications',
                        'Security' => 'Security',
                        'Cloud Services' => 'Cloud Services',
                        'News' => 'News',
                        'Industry Updates' => 'Industry Updates',
                        'General' => 'General',
                    ])
                    ->required()
                    ->default('News')
                    ->searchable(),

                TextInput::make('tags')
                    ->helperText('Comma-separated tags (optional)'),

                // ⭐ CRITICAL FIX #1: user_id with proper relationship
                Select::make('user_id')
                    ->label('Author')
                    ->relationship('author', 'name')
                    ->default(fn() => auth()->id())
                    ->required()
                    ->searchable()
                    ->helperText('Post author'),

                // ⭐ CRITICAL FIX #2: published_at with default and required
                DateTimePicker::make('published_at')
                    ->label('Publish Date & Time')
                    ->default(now())
                    ->required()
                    ->helperText('When to publish this post'),

                Toggle::make('is_published')
                    ->label('Published')
                    ->default(true)
                    ->required()
                    ->helperText('Turn off to save as draft'),

                Toggle::make('is_featured')
                    ->label('Featured')
                    ->default(false)
                    ->required()
                    ->helperText('Show in featured posts'),

                TextInput::make('meta_title')
                    ->maxLength(60)
                    ->helperText('SEO title (optional, uses post title if empty)'),

                Textarea::make('meta_description')
                    ->rows(2)
                    ->maxLength(160)
                    ->helperText('SEO description (optional)')
                    ->columnSpanFull(),

                TextInput::make('views')
                    ->numeric()
                    ->default(0)
                    ->disabled()
                    ->dehydrated(true)
                    ->helperText('View count (auto-tracked)'),
            ]);
    }
}
