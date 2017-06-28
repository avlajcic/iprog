<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $guarded = [];

public function senderModel()
{
  return $this->belongsTo('App\User', 'sender');
  }
public function receiverModel()
{
   return $this->belongsTo('App\User', 'receiver');
 }

public function product()
 {
    return $this->belongsTo('App\Product', 'product_id');
  }
}
