<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserShowFollowing extends Model
{
    use HasFactory;

    public $fillable = ['user_id', 'show_id'];

    /** Relationships */

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function show(): BelongsTo {
        return $this->belongsTo(Show::class, 'show_id');
    }
}
