@extends('admin.master')
@section('content')
<div class="col-lg-12">
    <h1 class="page-header">Wallet
        <small>List</small>
    </h1>
</div>
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 0 ?>
        @foreach ($data as $item)
        <?php $stt = $stt + 1 ?>
        <tr class="odd gradeX" align="center">
            <td>{!! $stt !!}</td>
            <td>{!! $item["name"] !!}</td>
            <td>{!! $item["amount"] !!}</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return cfdelete('delete this wallet')" href="{!! URL::route('admin.wallet.getDelete',$item['id']) !!}"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.wallet.getEdit',$item['id']) !!}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection()