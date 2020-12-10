<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    // create eloquent relationship user
    public function user(){
        return $this->belongsTo('App\User');
    }

    // create eloquent relationship with transaction header
    public function transactionDetails(){
        return $this->hasMany('App\TransactionDetail');
    }
}
