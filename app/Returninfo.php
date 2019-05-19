<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Returninfo extends Model
{
     public function products()
  {
      return $this->hasMany('App\Product');
  }
  public function invoice(){
    	return $this->belongsTo('App\Invoice');
    }
}
