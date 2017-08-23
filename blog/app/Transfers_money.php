<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfers_money extends Model
{
    protected $table = 'transfers_moneys';
    protected $fillable = ['transfer_wallet','receive_wallet','amount','describe'];
}
