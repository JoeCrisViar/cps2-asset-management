<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'firstname', 'lastname', 'address', 'password',
    ];

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

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function items()
    {
        return $this->belongsToMany('App\Item');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function isAdmin()
    {
        if($this->role_id === 1)
            { 
                return true; 
            } 
        else 
            { 
                return false; 
            }
    }

    // public function isAdmin()
    // {
    //     if($this->role_id === 1)
    //         { 
    //             return true; 
    //         } 
    //     else 
    //         { 
    //             return false; 
    //         }
    // }

    // public function isSeller()
    // {
    //     if($this->role_id === 2)
    //         { 
    //             return true; 
    //         } 
    //     else 
    //         { 
    //             return false; 
    //         }
    // }

    // public function isBuyer()
    // {
    //     if($this->role_id === 3)
    //         { 
    //             return true; 
    //         } 
    //     else 
    //         { 
    //             return false; 
    //         }
    // }
}
