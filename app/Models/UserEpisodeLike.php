<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserEpisodeLike extends Model
{
    use HasFactory;

    public $fillable = ['user_id', 'episode_id'];

    /** Relationships */

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function episode(): BelongsTo {
        return $this->belongsTo(Episode::class, 'episode_id');
    }
}
