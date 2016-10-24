<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FarmerCertification extends Model
{
    //
    protected $fillable = [
      'id',
      'farmer_id' ,
      'name' ,
      'certification_file'
    ];

    public function farmer(){
      return $this->belongsTo('App\Farmer' , 'farmer_id');
    }

}
