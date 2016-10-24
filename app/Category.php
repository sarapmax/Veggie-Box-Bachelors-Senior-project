<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
      'id' , 'name' , 'slug'
    ];

    public function sub_category(){
      return $this->hasMany('App\SubCategory');
    }

    public function farm_product() {
    	return $this->hasManyThrough('App\SubCategory', 'App\FarmProduct', 'sub_category_id', 'category_id');
    }
}
