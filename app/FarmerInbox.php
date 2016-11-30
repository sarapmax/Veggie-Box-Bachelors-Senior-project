<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FarmerInbox extends Model
{
    public function farmer() {
    	return $this->belongsTo('App\Farmer');
    }
}
