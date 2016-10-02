<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    protected $fillable = [
      'id' , 'name' , 'slug'
    ];

    public function sub_categories(){
      return $this->hasMany('App\SubCategories');
    }

    public function farmer_products(){
      return $this->hasMany('App\FarmerProducts');  
    }
}
