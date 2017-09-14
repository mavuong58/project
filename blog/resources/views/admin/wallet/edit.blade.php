


@extends('admin.master')
@section('content')
<div class="col-lg-12">
    <h1 class="page-header">Wallet
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

<!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
    <form action="" method="POST">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!! old('txtName',isset($data) ? $data['name'] : null) !!}" />
        </div>
        <div class="form-group">
            <label>Amount</label>
            <input class="form-control" name="txtAmount" placeholder="Please Enter Amount" value="{!! old('txtAmount',isset($data) ? $data['amount'] : null) !!}" />
        </div>
        <button type="submit" class="btn btn-default">Product Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
@endsection()               