<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use Sluggable;
    use SluggableScopeHelpers;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'nick_name', 'slug', 'contact_no', 'gender', 'date_of_birth', 'interesting_facts', 'email', 'password', 'profile_picture', 'new_profile_picture', 'profile_pic_status', 'email_verified_at', 'status', 'role_id'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'fname'
            ]
        ];
    }

    public function role()
    {
        return $this->hasOne('App\Role', 'id', 'role_id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }
    public function sendEmailVerificationNotification()
    {
    $this->notify(new \App\Notifications\UserEmailVerify);
    }
}
