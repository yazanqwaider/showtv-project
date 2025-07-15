<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episode extends Model
{
    use HasFactory;

    public $fillable = ['show_id', 'title', 'description', 'duration', 'airing_dt', 'thumbnail_url', 'video_url'];


    /** Accessors And Mutators */

    public function getFullThumbnailUrlAttribute()
    {
        if(str_starts_with($this->thumbnail_url, 'http')) {
            return $this->thumbnail_url;
        }
        else {
            return url('storage/' . $this->thumbnail_url);
        }
    }

    public function getFullVideoUrlAttribute()
    {
        if(str_starts_with($this->video_url, 'http')) {
            return $this->video_url;
        }
        else {
            return url('storage/' . $this->video_url);
        }
    }

    /** Relationships */

    public function show(): BelongsTo
    {
        return $this->belongsTo(Show::class, 'show_id');
    }
}
