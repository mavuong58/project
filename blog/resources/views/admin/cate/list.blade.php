@extends('admin.master')
@section('content')
<div class="col-lg-12">
    <h1 class="page-header">Cate
        <small>List</small>
    </h1>
</div>
<!-- /.col-lg-12 -->
<form action="" method="get" accept-charset="utf-8">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
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
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return cfdelete('delete this wallet')" href="#"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
</form>

@endsection()