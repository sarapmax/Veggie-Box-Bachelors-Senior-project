<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
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
                          ];


}
