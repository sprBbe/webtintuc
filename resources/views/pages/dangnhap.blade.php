@extends('pages.layout.index')
@section('content')
    <div height="1500px">&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;</div>
    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
    		<div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                      <div class="panel-heading lead">ĐĂNG NHẬP</div>
                      <div height="100px">&nbsp;<br>&nbsp;</div>
				  	<div class="panel-body">
                        @if (count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                        @endif
                        @if (session('canhbao'))
                            <div class="alert alert-warning">
                                {{session('canhbao')}}
                            </div>
                        @endif
                        @if (session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
				    	<form action="login" method="post" class="p-5 bg-light">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="Email"
							  	>
							</div>
							<br>
							<div>
				    			<label>Mật khẩu</label>
							  	<input type="password" class="form-control" name="Password">
							</div>
							<br>
							<button type="submit" class="btn btn-default">Đăng nhập
							</button>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
@endsection
