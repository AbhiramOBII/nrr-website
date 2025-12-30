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
        'button_text_en',
        'button_text_kn',
        'button_link_type',
        'button_link_id',
        'button_link_url',
        'image',
        'media_id',
        'sort_order',
        'status'
    ];

    public function media()
    {
        return $this->belongsTo(Media::class);
    }

    public function getButtonTextAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"button_text_$locale"} ?? $this->button_text_en;
    }

    public function getButtonLinkAttribute()
    {
        if ($this->button_link_url) {
            return $this->button_link_url;
        }

        if ($this->button_link_type && $this->button_link_id) {
            switch ($this->button_link_type) {
                case 'major_development':
                    $item = MajorDevelopment::find($this->button_link_id);
                    return $item ? route('major-development.show', $item->slug) : '#';
                case 'scam_exposed':
                    $item = ScamExposed::find($this->button_link_id);
                    return $item ? route('scam-exposed.show', $item->slug) : '#';
                case 'event':
                    $item = Event::find($this->button_link_id);
                    return $item ? route('event.show', $item->slug) : '#';
            }
        }

        return '#';
    }

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
