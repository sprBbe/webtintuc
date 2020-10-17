@extends('admin.layout.index')
@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể Loại
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">
                @if (session('thongbao'))
                    <div class="alert alert-success">
                    {{session('thongbao')}} 
                    </div>
                @endif
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tên Thể Loại</th>
                            <th>Tên Không Dấu</th>
                            <th>Xoá</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($theloai as $tl)
                        <tr class="odd gradeX" align="center">
                            <td>{{$tl->id}}</td>
                            <td>{{$tl->Ten}}</td>
                            <td>{{$tl->TenKhongDau}}</td>
                            <td class="center">
                                <form action="admin/theloai/{{$tl->id}}" method="POST">
                                    @method('delete') 
                                    @csrf
                                    <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
                                </form>
                            </td>
                            <td class="center">
                                <form action="admin/theloai/{{$tl->id}}/edit">
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