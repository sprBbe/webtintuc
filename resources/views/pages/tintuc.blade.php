@extends('pages.layout.index')
@section('content')
<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 single-content">
        <div height="1000px">&nbsp;<br>&nbsp;</div>
        <p class="mb-5">
          <img src="upload/tintuc/{{$tintuc->Hinh}}" alt="{{$tintuc->TieuDe}}" alt="Image" class="img-fluid">
        </p>
        <h1 class="mb-4">
          {{$tintuc->TieuDe}}
        </h1>
        <div class="post-meta d-flex mb-5">
          <div class="bio-pic mr-3">
            <img src="pages_asset/images/person_1.jpg" alt="Image" class="img-fluidid">
          </div>
          <div class="vcard">
            <span class="d-block"><a href="#">{{$tintuc->loaitin->Ten}}</a></span>
            <span class="date-read">{{$tintuc->updated_at}}<span class="mx-1">&bullet;</span>{{$tintuc->SoLuotXem}} lượt xem</span>
          </div>
        </div>
      <div>
        {!!$tintuc->NoiDung!!}
      </div>


              <div class="pt-5">
                <div class="section-title">
                  <h2 class="mb-5">{{$tintuc->comment->count()}} Comments</h2>
                </div>
                <ul class="comment-list">
                  @foreach ($tintuc->comment as $cm)
                    <li class="comment">
                      <div class="vcard bio">
                        <img src="pages_asset/images/person_1.jpg" alt="Image placeholder">
                      </div>
                      <div class="comment-body">
                        <h3>{{$cm->user->name}}</h3>
                        <div class="meta">{{$cm->user->created_at}}</div>
                        <p>{{$cm->NoiDung}}</p>
                      </div>
                    </li>
                    @endforeach
                </ul>
                <!-- END comment-list -->

                <div class="comment-form-wrap pt-5">
                  <div class="section-title">
                    <h2 class="mb-5">Viết bình luận ...</h2>
                  </div>
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
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="Binhluan"
                            @if (!Auth::check())
                            {{ "disabled" }}
                            @endif>@if (!Auth::check()){{"Đăng nhập để bình luận..."}}@endif</textarea>
                    </div>
                    <div class="form-group">
                      <input type="submit" value="Gửi" class="btn btn-primary py-3">
                    </div>
                </form>
                </div>
              </div>
      </div>


      <div class="col-lg-3 ml-auto">
      <div height="1000px">&nbsp;<br>&nbsp;</div>
        <div class="section-title">
          <h2>Tin Cùng Loại</h2>
        </div><?php $temp =1 ?>
        <div height="100px">&nbsp;<br>&nbsp;</div>
        @foreach ($tinlienquan as $item)
        <div class="trend-entry d-flex">
          <div class="number align-self-start">{{$temp}}<?php $temp++ ?></div>
          <div class="trend-contents">
            <h2><a href="blog-single.html">{{$item->TieuDe}}</a></h2>
            <div class="post-meta">
              <span class="d-block"><a href="#">@if ($item->NoiBat==0)
                  {{'Tin không được đánh dấu nổi bật!'}}
              @else {{'Tin được đánh dấu nổi bật!'}}
              @endif</a></span>
              <span class="date-read">{{$item->updated_at}}<span class="mx-1">&bullet;</span>{{$item->SoLuotXem}} lượt xem</span>
          </div>
          </div>
        </div>
        @endforeach
        <p>
          <a href="#" class="more">Xem thêm tin cùng loại<span class="icon-keyboard_arrow_right"></span></a>
        </p>
      </div>


    </div>

  </div>
</div>

<div class="site-section subscribe bg-light">
  <div class="container">
    <form action="#" class="row align-items-center">
      <div class="col-md-5 mr-auto">
        <h2>Newsletter Subcribe</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis aspernatur ut at quae omnis pariatur obcaecati possimus nisi ea iste!</p>
      </div>
      <div class="col-md-6 ml-auto">
        <div class="d-flex">
          <input type="email" class="form-control" placeholder="Enter your email">
          <button type="submit" class="btn btn-secondary" ><span class="icon-paper-plane"></span></button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
