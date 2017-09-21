@extends('admin.master')
@section('content')

<div class="col-lg-12">
    <h1 class="page-header">Cate
        <small>Add</small>
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
    <form action="{!! URL::route('admin.cate.getAdd') !!}" method="POST">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
        <div class="form-group">
            <label>Parent</label>

            <select class="form-control" name = "sltParent">
                <option value="0">Please Choose parent</option>
                 <?php cateParent($parent); ?> 
            </select>
                
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" placeholder="Please Enter Username" />
        </div>
        <div class="form-group">
            <label>Type</label>
            <select class="form-control" name = "sltType">
                <option value="0">Please Choose Type</option>
                
                    <option value="1">Add money</option>
                    <option value="2">Targets</option>
                
            </select>
        </div>
        <button type="submit" class="btn btn-default">Cate Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div> 
@endsection() 