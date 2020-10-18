@extends('pages.layout.index')
@section('content')
<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 single-content">

      <div height="1000px">
        &nbsp;<br>&nbsp;
      </div>
      <h1 class="mb-4 mt-2">
        {{$tintuc->TieuDe}}
      </h1>
      <p class="lead">
          by <a href="#">admin</a>
      </p>

      <img class="img-responsive" src="upload/tintuc/{{$tintuc->Hinh}}" alt="{{$tintuc->TieuDe}}">

      <div>
        {!!$tintuc->NoiDung!!}
      </div>
      <div class="pt-5">
        <div class="section-title">
          <h2 class="mb-1">Comments</h2>
        </div>

        <div class="well">
          <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
          @if (count($errors)>0)
                <div class="alert alert-danger">
                  @foreach ($errors->all() as $err)
                      {{$err}}<br>
                  @endforeach
                </div>
          @endif
          @if (session('thongbao'))
                <div class="alert alert-success">
                  {{session('thongbao')}}
                </div>
          @endif
          <form role="form" action="binhluan/{{$tintuc->id}}" method="post">
              <input type="hidden" name="_token" value="{{csrf_token()}}"/>
              <div class="form-group">
                  <textarea class="form-control" rows="3" name="Binhluan"
                      @if (!Auth::check())
                      {{ "disabled" }}
                      @endif>@if (!Auth::check()){{"Đăng nhập để bình luận..."}}@endif</textarea>
              </div>
              <button type="submit" class="btn btn-primary">Gửi</button>
          </form>
      </div>

      <hr>

      <!-- Posted Comments -->
      <ul class="comment-list">
        @foreach ($tintuc->comment as $cm)
        <!-- Comment -->
        <li class="comment">
          <div class="vcard bio">
            <img src="https://cdn.pixabay.com/photo/2018/11/13/21/43/instagram-3814049_960_720.png" alt="Image placeholder">
          </div>
          <div class="comment-body">
            <h3>{{$cm->user->name}}</h3>
            <div class="meta">{{$cm->user->created_at}}</div>
            <p>{{$cm->NoiDung}}</p>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
    <div class="col-lg-3 ml-auto">
      <div class="section-title">
        <h2>Tin Liên Quan</h2>
      </div>
      @foreach ($tinlienquan as $item)
      <div class="trend-entry d-flex">
        <div class="trend-contents">
          <h2><a href="blog-single.html">{{$item->TieuDe}}</a></h2>
          <div class="post-meta">
            {{$item->TomTat}}
          </div>
        </div>
      </div>
      @endforeach
      <p>
        <a href="#" class="more">Tất cả tin liên quan<span class="icon-keyboard_arrow_right"></span></a>
      </p>
    </div>
  </div>
</div>
<!-- end Page Content -->
@endsection
