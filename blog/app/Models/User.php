<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return mixed
     */
    public function timeline()
    {
        $friendIds = $this->follows()->pluck('id');

        return Tweet::whereIn('user_id', $friendIds)
            ->orWhere('user_id', $this->id)
            ->latest()
            ->get();
    }

    /**
     * @return HasMany
     */
    public function tweets(): HasMany
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    /**
     * @return string
     */
    public function avatar(): string
    {
        return 'https://eu.ui-avatars.com/api/?size=40&background=random&color=fff&name=' . $this->name;
    }

    /**
     * @return string
     */
    public function path(): string
    {
        return route('profile', $this->id);
    }
}
