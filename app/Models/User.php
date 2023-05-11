<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'membership_id',
        'role_id',
        'is_active',
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
    ];

    public function role(){
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function membership(){
        return $this->belongsTo(Membership::class, 'membership_id', 'id');
    }

    public function most_viewed_book(){
        return $this->hasMany(MostViewedBook::class, 'user_id', 'id');
    }

    public function user_session(){
        return $this->hasMany(UserSession::class, 'user_id', 'id');
    }

    public function most_viewed_review(){
        return $this->hasMany(MostViewedReview::class, 'user_id', 'id');
    }


    public function book_rating(){
        return $this->hasMany(BookRating::class, 'user_id', 'id');
    }

    public function banner(){
        return $this->hasMany(Banner::class, 'user_id', 'id');
    }
}
