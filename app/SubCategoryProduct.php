<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategoryProduct extends Model
{
    //
    protected $fillable = [
    	'farm_product_id', 'sub_category_id',
    ];
}
