<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // create eloquent relationship
    public function productType(){
        return $this->belongsTo('App\ProductType');
    }
}
