<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // create eloquent relationship with product type
    public function productType(){
        return $this->belongsTo('App\ProductType');
    }

    // create eloquent relationship with cart
    public function carts(){
        return $this->hasMany('App\Cart');
    }

    // create eloquent relationship with transaction detail
    public function transactionDetail(){
        return $this->hasMany('App\TransactionDetail');
    }
}
