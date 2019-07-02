<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notification;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','admin'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    public function  purchase(){
        return $this->belongsTo('App\Purchase');
    }

    public function  notification(){
        return $this->belongsTo('App\Notification');
    }


}
