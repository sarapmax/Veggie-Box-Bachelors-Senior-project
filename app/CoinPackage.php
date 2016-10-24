<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoinPackage extends Model
{
    //
    protected $fillable =  [
                             'id' ,
                             'name' ,
                             'coin_amount' ,
                             'price' ,
                             'slug' ,
                           ];

    
}
