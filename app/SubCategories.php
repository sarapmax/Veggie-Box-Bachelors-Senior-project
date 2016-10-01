<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    //
    protected $fillable = [
      'id' , 'name' , 'slug'
    ];

    public function categories(){
      return $this->belongsTo('App\Categories');
    }

    public function farm_product(){
      return $this->hasMany('App\FarmProducts');
    }
}
