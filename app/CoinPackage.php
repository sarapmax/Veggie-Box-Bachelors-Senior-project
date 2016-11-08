<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoinPackage extends Model
{
    //
    protected $table = 'coin_packages';

    protected $fillable =  [
                             'name' ,
                             'coin_amount' ,
                             'increase_percent',
                             'price' ,
                             'slug' ,
                           ];


}
