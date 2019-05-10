<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function customer(){
    	return $this->belongsTo('App\Customer');
    }

    public function products()
  {
      return $this->belongsToMany('App\Product')->withPivot('quantity','pup','percentage','netPrice');
  }

}
