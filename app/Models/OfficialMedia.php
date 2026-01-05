<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficialMedia extends Model
{
    use HasFactory;

    protected $table = 'official_media';

    protected $fillable = [
        'title_en',
        'title_kn',
        'description_en',
        'description_kn',
        'media_type',
        'social_link',
        'media_id',
        'published_date',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'published_date' => 'date',
    ];

    public function media()
    {
        return $this->belongsTo(Media::class);
    }

    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'kn' && $this->title_kn ? $this->title_kn : $this->title_en;
    }

    public function getDescriptionTextAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'kn' && $this->description_kn ? $this->description_kn : $this->description_en;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }

    public function isSocialMedia()
    {
        return in_array($this->media_type, ['youtube', 'instagram', 'facebook', 'twitter']);
    }

    public function isUploadedMedia()
    {
        return in_array($this->media_type, ['image', 'video']);
    }

    public function getEmbedUrl()
    {
        if (!$this->isSocialMedia() || !$this->social_link) {
            return null;
        }

        switch ($this->media_type) {
            case 'youtube':
                if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i', $this->social_link, $match)) {
                    return 'https://www.youtube.com/embed/' . $match[1];
                }
                return null;
            case 'instagram':
                return $this->social_link . 'embed';
            default:
                return $this->social_link;
        }
    }

    public function getThumbnail()
    {
        if ($this->isUploadedMedia() && $this->media) {
            return $this->media->url;
        }

        if ($this->media_type === 'youtube' && $this->social_link) {
            if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i', $this->social_link, $match)) {
                return 'https://img.youtube.com/vi/' . $match[1] . '/maxresdefault.jpg';
            }
        }

        return asset('image/default-placeholder.jpg');
    }
}
