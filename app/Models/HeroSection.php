<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'page',
        'headline',
        'subheadline',
        'background_image',
        'background_video',
        'use_video',
        'cta_text',
        'cta_link',
        'show_cta',
        'text_alignment',
        'text_color',
        'overlay_color',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'use_video' => 'boolean',
        'show_cta' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Scope: Get hero section by page
     */
    public function scopeForPage($query, $page)
    {
        return $query->where('page', $page)->where('is_active', true)->first();
    }

    /**
     * Scope: Get only active hero sections
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get the background URL (image or video)
     */
    public function getBackgroundUrlAttribute()
    {
        if ($this->use_video && $this->background_video) {
            return $this->background_video;
        }

        return $this->background_image;
    }

    /**
     * Check if hero has CTA button
     */
    public function hasCta(): bool
    {
        return $this->show_cta && $this->cta_text && $this->cta_link;
    }
}
