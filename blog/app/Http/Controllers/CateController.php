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
    	$data = Category::select('id','name','parent_id')->orderBy('id','DESC')->get()->toArray();
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
    public function getDelete($id){
		$parent = Category::where('parent_id',$id)->count();
		if($parent == 0){
			$cate = Category::find($id);
        $cate->delete($id);
        return redirect()->route('admin.cate.getList');
	    }else {
	    	echo "<script type='text/javascript'>
				alert('Sorry ! You can not DELETE this category');
				window.location = '";
				echo route('admin.cate.getList');
			echo"'
	    	</script>";
	    }
		
    }
    public function getEdit($id) {
    	$data = Category::findOrFail($id)->toArray();
    	$parent = Category::select('id','name','type','parent_id')->get()->toArray();
    	return view('admin.cate.edit',compact('parent','data','id','cate'));
    }
    public function postEdit(Request $request,$id) {
    	 $this->validate($request,
                ["txtName" => "required"],
                ["txtName.required" => "please enter name wallet"]
            );
    	 $cate = Category::find($id);
    	 $cate->name = $request->txtName;
    	 $cate->type = $cate->type;
    	 $cate->parent_id = $cate->parent_id;
    	 $cate->save();
    	 return redirect()->route('admin.cate.getList');
    }

}
