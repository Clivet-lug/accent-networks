<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Project extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia, HasSlug;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'client_name',
        'year',
        'category_id',
        'featured_image',
        'before_image',
        'after_image',
        'scope',
        'technologies',
        'is_featured',
        'is_published',
        'order',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'year' => 'integer',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Relationship: A project belongs to a category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Register media collections for Spatie Media Library
     */
    public function registerMediaCollections(): void
    {
        // Project gallery images
        $this->addMediaCollection('gallery')
            ->useFallbackUrl('/images/placeholder-project.jpg')
            ->useFallbackPath(public_path('/images/placeholder-project.jpg'));

        // Featured image
        $this->addMediaCollection('featured')
            ->singleFile()
            ->useFallbackUrl('/images/placeholder-project.jpg')
            ->useFallbackPath(public_path('/images/placeholder-project.jpg'));
    }

    /**
     * Scope: Get only published projects
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope: Get only featured projects
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope: Order projects by custom order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
