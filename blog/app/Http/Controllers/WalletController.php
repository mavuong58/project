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
            return redirect()->route('admin.wallet.list')->with(['flash_level'=>'success','flash_message'=>'success !! complate delete wallet']);
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
}
