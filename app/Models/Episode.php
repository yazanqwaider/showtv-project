<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episode extends Model
{
    use HasFactory;

    public $fillable = ['show_id', 'title', 'description', 'duration', 'airing_dt', 'thumbnail_url', 'video_url'];

    /** Relationships */

    public function show(): BelongsTo
    {
        return $this->belongsTo(Show::class, 'show_id');
    }
}
