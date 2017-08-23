<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table = 'wallets';
    protected $fillable = ['name','	amount','user_id'];
    public function product (){
    	return $this->hasMany('App\Transaction');
    }
    public function user (){
    	return $this->hasMany('App\User');
    }
}

