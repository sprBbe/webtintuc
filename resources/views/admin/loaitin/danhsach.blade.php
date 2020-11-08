@extends('admin.layout.index')
@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại Tin
                    <small>Danh sách</small>
                </h1>
            </div>
            <div class="col-lg-12">
                @if (session('thongbao'))
                    <div class="alert alert-success">
                    {{session('thongbao')}} 
                    </div>
                @endif
                @if (session('Exception'))
                     <div class="alert alert-danger">
                        {{session('Exception')}}
                     </div>
                @endif
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tên Loại tin</th>
                            <th>Tên không dấu</th>
                            <th>Thể Loại</th>
                            <th>Xoá</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loaitin as $lt)
                        <tr class="odd gradeX" align="center">
                            <td>{{$lt->id}}</td>
                            <td>{{$lt->Ten}}</td>
                            <td>{{$lt->TenKhongDau}}</td>
                            <td>{{$lt->theloai->Ten}}</td>
                            <td class="center">
                                <form action="admin/loaitin/{{$lt->id}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
                                </form>
                            </td>
                            <td class="center">
                                <form action="admin/loaitin/{{$lt->id}}/edit">
                                    <button type="submit" style="display: inline;" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-pencil"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
    
@endsection