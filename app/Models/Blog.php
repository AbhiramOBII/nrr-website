<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en',
        'title_kn',
        'slug',
        'short_description_en',
        'short_description_kn',
        'content_en',
        'content_kn',
        'featured_media_id',
        'author',
        'published_date',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'published_date' => 'date',
    ];

    public function featuredMedia()
    {
        return $this->belongsTo(Media::class, 'featured_media_id');
    }

    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'kn' && $this->title_kn ? $this->title_kn : $this->title_en;
    }

    public function getShortDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'kn' && $this->short_description_kn ? $this->short_description_kn : $this->short_description_en;
    }

    public function getContentAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'kn' && $this->content_kn ? $this->content_kn : $this->content_en;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('published_date', 'desc');
    }
}
