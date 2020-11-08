@extends('admin.layout.index')
@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
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
                @if (session('Exception'))
                     <div class="alert alert-danger">
                        {{session('Exception')}}
                     </div>
                @endif
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tiêu Đề</th>
                            <th>Hình Ảnh</th>
                            <th>Tóm Tắt</th>
                            <th>Thể Loại</th>
                            <th>Loại Tin</th>
                            <th>Lượt Xem</th>
                            <th>Nổi Bật</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tintuc as $tt)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tt->id}}</td>
                                <td>{{$tt->TieuDe}}</td>
                                <td>
                                    <img src="upload/tintuc/{{$tt->Hinh}}" width="100px"/>
                                </td>
                                <td>{{$tt->TomTat}}</td>
                                <td>{{$tt->loaitin->theloai->Ten}}</td>
                                <td>{{$tt->loaitin->Ten}}</td>
                                <td>{{$tt->SoLuotXem}}</td>
                                <td>
                                    @if ($tt->NoiBat==0)
                                        {{'Không'}}
                                    @else {{'Có'}}
                                    @endif
                                </td>
                                <td class="center">
                                    <form action="admin/tintuc/{{$tt->id}}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
                                    </form>
                                </td>
                                <td class="center">
                                    <form action="admin/tintuc/{{$tt->id}}/edit">
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