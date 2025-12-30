<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ElectronicMedia extends Model
{
    use HasFactory;

    protected $table = 'electronic_media';

    protected $fillable = [
        'title_en',
        'title_kn',
        'slug',
        'short_description_en',
        'short_description_kn',
        'description_en',
        'description_kn',
        'youtube_url',
        'youtube_video_id',
        'thumbnail_media_id',
        'sort_order',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title_en);
            }
            $model->youtube_video_id = self::extractYouTubeId($model->youtube_url);
        });

        static::updating(function ($model) {
            if ($model->isDirty('youtube_url')) {
                $model->youtube_video_id = self::extractYouTubeId($model->youtube_url);
            }
        });
    }

    public static function extractYouTubeId($url)
    {
        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/';
        preg_match($pattern, $url, $matches);
        return $matches[1] ?? null;
    }

    public function thumbnailMedia()
    {
        return $this->belongsTo(Media::class, 'thumbnail_media_id');
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

    public function getDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'kn' && $this->description_kn ? $this->description_kn : $this->description_en;
    }

    public function getThumbnailUrlAttribute()
    {
        if ($this->thumbnailMedia) {
            return $this->thumbnailMedia->url;
        }
        return $this->youtube_video_id 
            ? "https://img.youtube.com/vi/{$this->youtube_video_id}/maxresdefault.jpg"
            : null;
    }

    public function getEmbedUrlAttribute()
    {
        return $this->youtube_video_id 
            ? "https://www.youtube.com/embed/{$this->youtube_video_id}"
            : null;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }
}
