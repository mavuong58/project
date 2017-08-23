<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WalletRequest;
use Auth;
use App\Http\Requests;
use App\Wallet;

class WalletController extends Controller
{
	public function getList(){
		return view('admin.wallet.list');
	}
    public function getAdd(){
    	return view('admin.wallet.add');
    }
    public function postAdd(WalletRequest $request){
    	$wallet = new Wallet;
    	$wallet->name = $request->txtName;
    	$wallet->amount = $request->txtAmount;
    	$wallet->user_id = Auth::user()->id;
    	$wallet->save();
    	return redirect()->route('admin.wallet.list');
    }
}
