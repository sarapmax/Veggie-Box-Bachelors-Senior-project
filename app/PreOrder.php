<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreOrder extends Model
{
    public function pre_order_detail() {
    	return $this->hasMany('App\PreOrderDetail', 'order_id');
    }

    public function product() {
      return $this->belongsToMany('App\Product', 'pre_order_details', 'order_id', 'product_id')->withPivot('quantity', 'sub_total');
   }
}
