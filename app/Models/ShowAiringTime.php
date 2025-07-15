<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShowAiringTime extends Model
{
    use HasFactory;

    public $fillable = ['show_id', 'sat', 'sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'time'];

    /** Relationships */

    public function show(): BelongsTo
    {
        return $this->belongsTo(Show::class, 'show_id');
    }
}
