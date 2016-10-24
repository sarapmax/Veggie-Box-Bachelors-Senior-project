<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //
    protected $fillable = [
      'id' , 'name' , 'slug'
    ];

    public function category(){
      return $this->belongsTo('App\Category', 'category_id');
    }

    public function farm_product() {
    	return $this->hasMany('App\FarmProduct');
    }
}
