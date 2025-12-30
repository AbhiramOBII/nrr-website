<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintMedia extends Model
{
    use HasFactory;

    protected $table = 'print_media';

    protected $fillable = [
        'title_en',
        'title_kn',
        'description_en',
        'description_kn',
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
}
