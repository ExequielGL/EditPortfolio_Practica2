<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Interest;
use App\Models\Framework;
use App\Models\PersonalData;
use App\Models\SocialNetwork;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
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
        'password' => 'hashed',
    ];

    public function personal_data()
    {
        return $this->hasOne(PersonalData::class);
    }
    
    public function interest()
    {
        return $this->hasMany(Interest::class);
    }
    
    public function social_network()
    {
        return $this->hasMany(SocialNetwork::class);
    }
    
    public function framework()
    {
        return $this->hasMany(Framework::class);
    }   

}
