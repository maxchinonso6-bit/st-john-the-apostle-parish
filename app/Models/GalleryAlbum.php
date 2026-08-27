<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryAlbum extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'cover_type', 'cover_image', 'cover_video_url', 'description', 'event_date'];

    public function items()
    {
        return $this->hasMany(GalleryItem::class, 'album_id');
    }
}