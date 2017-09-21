<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;
use App\Http\Requests;
use App\Category;

class CateController extends Controller
{
    //
    public function getList(){
    	$data = Category::select('id','name')->orderBy('id','DESC')->get()->toArray();
		return view('admin.cate.list',compact('data'));
    }
     public function getAdd(){
     	$parent = Category::select('id','name','type','parent_id')->get()->toArray();
    	return view('admin.cate.add',compact('parent'));
    }
     public function postAdd(CateRequest $request){
    	$cate = new Category;
    	$cate->name = $request->txtName;
    	$cate->type = $request->sltType;
    	$cate->parent_id = $request->sltParent;
    	$cate->save();
    	return redirect()->route('admin.cate.getList');
    }
}
