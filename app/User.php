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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function products()
   {
       return $this->hasMany('App\Product', 'owner_id');
   }

   public function messagesReceived()
  {
      return $this->hasMany('App\Message', 'receiver');
  }

  public function messagesSent()
 {
     return $this->hasMany('App\Message', 'sender');
 }
}
