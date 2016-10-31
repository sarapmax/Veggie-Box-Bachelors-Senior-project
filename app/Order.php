<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
	public function order_detail() {
		return $this->hasMany('App\OrderDetail');
	}

	public function product() {
      return $this->belongsToMany('App\Product', 'order_details', 'order_id', 'product_id')->withPivot('quantity', 'sub_total');
   }
}
