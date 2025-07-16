<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo_url',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'=> 'hashed',
    ];


    public function getFullPhotoUrlAttribute()
    {
        if(str_starts_with($this->photo_url, 'http')) {
            return $this->photo_url;
        }
        else {
            return url('storage/' . $this->photo_url);
        }
    }

    /** Relationships */

    public function show_followings(): BelongsToMany
    {
        return $this->belongsToMany(Show::class, 'user_show_followings', 'user_id', 'show_id');
    }

    public function episode_likes(): BelongsToMany
    {
        return $this->belongsToMany(Episode::class, 'user_episode_likes', 'user_id', 'episode_id');
    }
}
