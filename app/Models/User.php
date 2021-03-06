<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'coupon_id'
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

    public function userProfile(){
        return $this->hasOne(UserProfile::class);
    }

    public function getNameAttribute($value){
        return $this->name = ucwords($value);
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function coupon(){
        return $this->belongsTo(Coupon::class);
    }

    public function isValidCoupon(){
        return $this->belongsTo(Coupon::class,'coupon_id')
            ->where('start_date','<=', now())
            ->where('expire_date','>', now());
    }
}
