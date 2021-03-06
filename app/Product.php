<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $guarded = [];

   public function category()
   {
      return $this->belongsTo('App\Category');
    }

  public function user()
  {
     return $this->belongsTo('App\User', 'owner_id');
   }

   public function messages()
  {
      return $this->hasMany('App\Message');
  }

  public function rents()
 {
     return $this->hasMany('App\Rent');
 }
}
