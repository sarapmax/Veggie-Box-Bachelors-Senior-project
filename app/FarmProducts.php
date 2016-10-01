<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FarmProducts extends Model
{
    //
    protected $fillable = [
      'id' , 'name' , 'status' , 'price' , 'discount_price' , 'quantity' , 'grow_estimate' , 'plant_date' , 'images' , 'thumb_image' , 'description' , 'unit' , 'slug'
    ];

    public function farmers(){
      return $this->belongsTo('App\Farmers' , 'farmer_id');
    }

    public function categories(){
      return $this->belongsTo('App\Categories' , 'category_id');
    }

    public function sub_categories(){
      return $this->belongsTo('App\SubCategories' , 'sub_category_id');
    }

    public function products(){
      return $this->hasMany('App\Products');
    }

    public function farmer_orders(){
      return $this->hasMany('App\FarmerOrders');
    }

}
