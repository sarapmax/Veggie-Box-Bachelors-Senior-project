<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderCoin extends Model
{
    public function coin_package() {
    	return $this->belongsTo('App\CoinPackage');
    }

    public function customer() {
    	return $this->belongsTo('App\Customer');
    }
}
