<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    //

    protected $fillable = [
    	'email',
      'password',
      'fullname'
    ];

    public function AdminInformation(){
      return $this->hasMany('App\AdminInformation');
    }
}
