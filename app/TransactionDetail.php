<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    // create eloquent relationship with transaction header
    public function transactionHeader(){
        return $this->belongsTo('App\TransactionHeader');
    }

    // create eloquent relationship with product
    public function product(){
        return $this->belongsTo('App\Product');
    }

    public $timestamps = false;
}
