@extends('admin.master')

@section('content')
<div class="col-lg-12">
    <h1 class="page-header">Cate
        <small>Edit</small>
    </h1>
</div>
@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="col-lg-7" style="padding-bottom:120px">
    <form action="" method="POST">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
        <!-- <div class="form-group">
            <label>Parent</label>

            <select class="form-control">
                <option value="0">Please Choose parent</option>
                 <?php cateParent($parent,0,"--",$data["parent_id"]) ?> 
            </select>
                
        </div> -->
        <div class="form-group">
            <label>Parent</label>
            @if ($data["parent_id"] == 0)
                {!! "none" !!}
            @else 
                <?php 
                    $parent = DB::table('categories')->where('id',$data["parent_id"])->first();
                    echo $parent->name;
                 ?>
            @endif
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!! old('txtName',isset($data) ? $data['name'] : null) !!}" />
        </div>
        <div class="form-group">
            <label>Type</label>
            @if ($data["type"] == 1)
                <?php echo "Add money"; ?>
            @else 
                <?php echo "Targets"; ?>
            @endif
        </div>
        <button type="submit" class="btn btn-default">Cate Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div> 
@endsection()               