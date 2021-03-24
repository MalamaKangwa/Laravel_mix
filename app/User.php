<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','photo_id','created_at','updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user_role(){
        return $this->belongsTo('App\Role','role_id','id');
    }

    public function user_photo() {
        return $this->belongsTo('App\Photo','photo_id','id');
    }

    public function user_posts() {
        return $this->hasMany('App\Post', 'user_id', 'id');
    }

    public function isAdmin() {
        if($this->user_role->name == 'Admin'){
        //if($this->user_role->name == 'Admin' && $this->is_active){
            return true;
        }
        return false;
    }
}
