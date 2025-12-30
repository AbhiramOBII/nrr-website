<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ScamExposed extends Model
{
    use HasFactory;

    protected $table = 'scams_exposed';

    protected $fillable = [
        'title_en',
        'title_kn',
        'slug',
        'short_description_en',
        'short_description_kn',
        'description_en',
        'description_kn',
        'featured_media_id',
        'sort_order',
        'status',
    ];

    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title_en);
            }
        });
    }

    /**
     * Get the featured media
     */
    public function featuredMedia()
    {
        return $this->belongsTo(Media::class, 'featured_media_id');
    }

    /**
     * Get all attached media
     */
    public function media()
    {
        return $this->belongsToMany(Media::class, 'scam_exposed_media')
            ->withPivot('sort_order')
            ->orderBy('pivot_sort_order');
    }

    /**
     * Get title based on locale
     */
    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'kn' && $this->title_kn ? $this->title_kn : $this->title_en;
    }

    /**
     * Get short description based on locale
     */
    public function getShortDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'kn' && $this->short_description_kn ? $this->short_description_kn : $this->short_description_en;
    }

    /**
     * Get description based on locale
     */
    public function getDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'kn' && $this->description_kn ? $this->description_kn : $this->description_en;
    }

    /**
     * Scope for active items
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope for ordered items
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }
}
