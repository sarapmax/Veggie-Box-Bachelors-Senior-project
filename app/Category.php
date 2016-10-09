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
}
