<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WalletRequest;
use Auth;
use App\Http\Requests;
use App\Wallet;
use App\Transfers_money;

class WalletController extends Controller
{
	public function getList(){
        $data = Wallet::select('id','name','amount')->orderBy('id','DESC')->get()->toArray();
		return view('admin.wallet.list',compact('data'));
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
    public function getDelete($id){
            $wallet = Wallet::find($id);
            $wallet->delete($id);
            return redirect()->route('admin.wallet.list');
    }
    public function getEdit($id){
        $data = Wallet::findOrFail($id)->toArray();
        return view('admin.wallet.edit',compact('data','id'));
    }
    public function postEdit(Request $request,$id){
        $this->validate($request,
                ["txtName" => "required"],
                ["txtName.required" => "please enter name wallet"]
            );
        $wallet = Wallet::find($id);
        $wallet->name = $request->txtName;
        $wallet->amount = $request->txtAmount;
        $wallet->user_id = Auth::user()->id;
        $wallet->save();
        return redirect()->route('admin.wallet.list');
    }
    public function getTransfer(){
        $wallet = Wallet::select('id','name')->get()->toArray();
        return view('admin.wallet.transfer',compact('wallet'));
    }
    public function postTransfer(Request $request){
        $transfer = Wallet::find($request->sltTransfer);
        $receive = Wallet::find($request->sltReceive);
        $transfers_money = new Transfers_money;

        $this->validate($request,
                ["txtAmount" => "required"],
                ["txtAmount.required" => "please enter amount"]
                // [ $transfer->amount >= $request->txtAmount ]
            );

        // change info for transfer wallet
        $transfer->name = $transfer->name;
        $transfer->amount =$transfer->amount - $request->txtAmount;
        $transfer->user_id = $transfer->user_id;
        $transfer->save();
        // change info for receive wallet
        $receive = Wallet::find($request->sltReceive);
        $receive->name = $receive->name;
        $receive->amount =$receive->amount + $request->txtAmount;
        $receive->user_id = $receive->user_id;
        $receive->save();
        // update info for transfer_money
        $transfers_money = new Transfers_money;
        $transfers_money->transfer_wallet = $request->sltTransfer;
        $transfers_money->receive_wallet  = $request->sltReceive;
        $transfers_money->amount = $request->txtAmount;
        $transfers_money->describe = $request->txtDescribe;
        $transfers_money->save();

        return redirect()->route('admin.wallet.list');
   }



}
