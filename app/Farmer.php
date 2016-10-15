<?php
 
namespace App;
 
use Illuminate\Foundation\Auth\User as Authenticatable;
 
class Farmer extends Authenticatable
{
    //
	// protected $guard = "farmer";

    protected $fillable = [
    	'email', 'password', 'firstname', 'lastname', 'farm_name', 'farm_desc', 'farm_img', 'phone', 'address', 'sub_district', 'district', 'province', 'zipcode', 'activated', 'vat_registration',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
