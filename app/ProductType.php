<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    // create eloquent relationship
    public function products(){
        return $this->hasMany('App\Product');
    }
}
