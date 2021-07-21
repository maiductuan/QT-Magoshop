@extends('master')
@section('title','Danh sách danh mục')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Danh sách danh mục</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Mô tả</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($listWorkshop as $listWork)
                <tr>
                    <td>{{$listWork->work_name}}</td>
                    <td>{{$listWork->work_contents}}</td>
                    <td> 
                        <a onclick="return confirm('Bạn có chắc chắn xóa không ?')" href="{{url('category-delete',$listWork->id)}}">
                            <span class="fa fa-trash">
                            </span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tfoot>
        </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- AdminLTE for demo purposes -->
</div>
@endsection