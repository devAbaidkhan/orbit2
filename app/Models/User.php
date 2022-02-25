<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends \TCG\Voyager\Models\User
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
        'avatar',
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

    public function getPictureAttribute($value){
        if ($value){
            return asset('users/images/'. $value);
        }else{
            return asset('users/images/no-image.png');
        }
    }

    public function contactPerson()
    {
        return $this->hasMany(ContactPerson::class,'user_id','id');
    }
    public function jobs()
    {
        return $this->hasMany(Job::class,'company_id','id');
    }

    public function bankDetail()
    {
        return $this->hasOne(UserBankDetail::class,'user_id','id');
    }
    public function passportDetail()
    {
        return $this->hasOne(UserPassportDetail::class,'user_id','id');
    }
    public function confidentialDetail()
    {
        return $this->hasOne(UserConfidentialDetail::class,'user_id','id');
    }

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class,'staff_id','id');
    }

}
