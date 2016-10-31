<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    //
    protected $fillable = [
                            'id' ,
                            'email' ,
                            'password' ,
                            'firstname' ,
                            'lastname' ,
                            'coins' ,
                            'phone' ,
                            'address' ,
                            'sub_district' ,
                            'district' ,
                            'province' ,
                            'zipcode' ,
                            'activate' ,
                            'token' ,
                            'latLng',
                          ];

    protected $hidden = [
        'password', 'remember_token',
    ];


}
