<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FarmProduct extends Model
{
    protected $fillable = [
    	'farmer_id', 'sub_category_id', 'name', 'status', 'price', 'discount_price', 'quantity', 'grow_estimate', 'plant_date', 'images', 'thumb_image', 'description', 'unit', 'slug',
    ];

    public function sub_category() {
    	return $this->belongsTo('App\Subcategory', 'sub_category_id');
    }

    public function farmer() {
    	return $this->belongsTo('App\Farmer', 'farmer_id');
    }

    public function product() {
    	return $this->hasOne('App\Product');
    }
}
