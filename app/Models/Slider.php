<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title_en',
        'title_kn',
        'paragraph_en',
        'paragraph_kn',
        'image',
        'sort_order',
        'status'
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    /**
     * Scope to get only active sliders
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope to order by sort_order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }

    /**
     * Get the image URL
     */
    public function getImageUrlAttribute()
    {
        return asset('storage/sliders/' . $this->image);
    }

    /**
     * Get title based on current locale
     */
    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"title_$locale"} ?? $this->title_en;
    }

    /**
     * Get paragraph based on current locale
     */
    public function getParagraphAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"paragraph_$locale"} ?? $this->paragraph_en;
    }
}
