<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;
use App\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','photo_id','is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function isAdmin(){
        if($this->role->name == 'admin'){
            return true;
        }
        return false;
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function post(){
        return $this->hasMany('App\Post');
    }

    public function projects() {
        return $this->belongsToMany('App\Project');
    }
}
