<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'youtube_id',
        'thumbnail_url',
        'category_id',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    protected $appends = ['embed_url'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // URL buat <iframe> (embed)
    public function getEmbedUrlAttribute(): string
    {
        return 'https://www.youtube.com/embed/' . $this->youtube_id;
    }
}
