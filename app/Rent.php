<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function product()
    {
      return $this->belongsTo('App\Product', 'product_id');
    }

    public function renterModel()
    {
      return $this->belongsTo('App\User', 'renter');
    }
}
