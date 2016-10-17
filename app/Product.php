<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'farm_product_id', 'quantity', 'activated', 'price', 'discount_price',
    ];

    public function farm_product() {
    	return $this->belongsTo('App\FarmProduct', 'farm_product_id');
    }
}
