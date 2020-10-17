@extends('admin.layout.index')
@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể Loại
                    <small>Sửa "{{$theloai->Ten}}"</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if (count($errors)>0)
                     <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                            {{$err}}<br>
<<<<<<< HEAD
                        @endforeach       
=======
                        @endforeach
>>>>>>> 0cd6c910b8b09a15031c3066d40f89f34170a090
                     </div>
                @endif
                @if (session('thongbao'))
                     <div class="alert alert-success">
<<<<<<< HEAD
                        {{session('thongbao')}} 
                     </div>
                @endif
                <form action="admin/theloai/sua/{{$theloai->id}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
=======
                        {{session('thongbao')}}
                     </div>
                @endif
                <form action="admin/theloai/{{$theloai->id}}" method="POST">
                    @method('PATCH') 
                    @csrf
>>>>>>> 0cd6c910b8b09a15031c3066d40f89f34170a090
                    <div class="form-group">
                        <label>Tên Thể Loại</label>
                    <input class="form-control" name="Ten" placeholder="Điền tên Thể Loại" value="{{$theloai->Ten}}"/>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa Thể Loại</button>
                    <button type="reset" class="btn btn-default">Làm lại</button>
<<<<<<< HEAD
                <form>
=======
                </form>
>>>>>>> 0cd6c910b8b09a15031c3066d40f89f34170a090
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<<<<<<< HEAD
    
@endsection
=======

@endsection
>>>>>>> 0cd6c910b8b09a15031c3066d40f89f34170a090
