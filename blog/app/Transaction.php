<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = ['category_id','wallet_id','amount','describe'];
    public function cate(){
    	return $this->belongTo('App\Category');
    }
    public function wallet(){
    	return $this->belongTo('App\Wallet');
    }
}
