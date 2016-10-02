<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmers extends Model
{
    //
    protected $fillable = [
      'id' , 'email' , 'first_name' , 'lastname' , 'farm_name' , 'farm_desc' , 'farm_img' , 'phone' , 'address' , 'sub_district' , 'district' , 'province' , 'zipcode' , 'activated' , 'vat_registration'
     ];

     public function farmer_inbox(){
       return $this->hasMany('App\FarmerInbox');
     }

     public function farmer_ratings(){
       return $this->hasMany('App\FarmerRatings');
     }

     public function farmer_certifications(){
       return $this->hasMany('App\FarmerCertifications');
     }

     public function farm_products(){
       return $this->hasMany('App\FarmerProducts');
     }

     public function products(){
       return $this->hasMany('App\Products');
     }
}
