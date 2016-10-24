<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminInformation extends Model
{
    //
    protected $fillable = [
      'id' ,
      'admin_id' ,
      'topic' ,
      'text'
    ];

    public function Admin(){
      return $this->belongsTo('App\Admin' , 'admin_id');
    }
}
