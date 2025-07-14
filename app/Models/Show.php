<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Show extends Model
{
    use HasFactory;

    public $fillable = ['title', 'description', 'type'];

    /** Relationships */

    public function airing_time_config(): HasOne {
        return $this->hasOne(ShowAiringTime::class, 'show_id');
    }

    public function episodes(): HasMany
    {
        return $this->hasMany(Episode::class, 'show_id');
    }
}
