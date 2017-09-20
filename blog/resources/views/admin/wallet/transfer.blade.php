@extends('admin.master')
@section('content')
<div class="col-lg-12">
    <h1 class="page-header">Transfer
        <small>Money</small>
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
    <form action="{!! URL::route('admin.wallet.postTransfer') !!}" method="POST">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
        <div class="form-group">
            <label>Transfer_wallet</label>
            <select class="form-control" name = "sltTransfer">
                <option value="0">Please Choose Transfer wallet</option>
                @foreach($wallet as $item1)
                    <option value="{{ $item1['id'] }}">{!!$item1["name"]!!}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Receive_wallet</label>
            <select class="form-control" name="sltReceive">
                <option value="0">Please Choose Receive wallet</option>
                @foreach($wallet as $item2)
                    <option value="{{ $item2['id'] }}">{!!$item2["name"]!!}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>amount</label>
            <input class="form-control" name="txtAmount" placeholder="Please Enter Amount" />
        </div>
        <div class="form-group">
            <label>Describe</label>
            <textarea class="form-control" name="txtDescribe" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-default">Transfer</button>
        <button type="reset" class="btn btn-default">Reset</button>
        <!--<button type="button" class="btn btn-default">View</button>-->
    <form>
</div>
@endsection() 