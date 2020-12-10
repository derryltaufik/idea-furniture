<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // create eloquent relationship with product
    public function product(){
        return $this->belongsTo('App\Product');
    }

    // create eloquent relationship user
    public function user(){
        return $this->belongsTo('App\User');
    }

    public $timestamps = false;
}
