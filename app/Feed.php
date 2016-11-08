<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    //
    protected $fillable =[
      'id',
      'admin_id',
      'topic',
      'detail',
      'activated',
      'slug'
    ];

    public function admin(){
      return $this->hasMany('App\Admin');
    }
}
