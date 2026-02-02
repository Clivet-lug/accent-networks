<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Service extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia, HasSlug;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'content_sections',
        'icon',
        'featured_image',
        'gallery_images',      // NEW: Array of gallery images
        'before_image',        // NEW: Before image
        'after_image',         // NEW: After image
        'cta_text',
        'cta_link',
        'is_active',
        'order',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'content_sections' => 'array',
        'gallery_images' => 'array',   // NEW: Cast to array
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
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
     * Register media collections
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('featured')
            ->singleFile()
            ->useFallbackUrl('/images/placeholder-service.jpg')
            ->useFallbackPath(public_path('/images/placeholder-service.jpg'));
    }

    /**
     * Scope: Get only active services
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: Order services by custom order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
