@extends('pages.layout.index')
@section('content')
<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-9">
        <div height="1000px">&nbsp;<br>&nbsp;</div>
        <div class="section-title">
          <span class="caption d-block small">Loại Tin</span>
          <h2>{{$loaitin->Ten}}</h2>
        </div>
        @foreach ($tintuc as $tt)
        <div class="post-entry-2 d-flex">
          <div class="thumbnail order-md-2" style="background-image: url(upload/tintuc/{{$tt->Hinh}})"></div>
          <div class="contents order-md-1 pl-0">
            <h2><a href="tintuc/{{$tt['id']}}/{{$tt['TieuDeKhongDau']}}.html">{{$tt->TieuDe}}</a></h2>
            <p class="mb-3">{{$tt->TomTat}}</p>
            <div class="post-meta">
              <span class="d-block">Số lượt xem: {{$tt->SoLuotXem}}</span>
            </div>
          </div>
        </div>
        @endforeach


      </div>
      <div class="col-lg-3">
        <div height="1000px">&nbsp;<br>&nbsp;</div>
        <div class="section-title">
          <h2>Tin Nổi Bật</h2>
        </div>

        @foreach ($tinnoibat as $item)
        <div class="trend-entry d-flex">
          <div class="trend-contents">
            <h2><a href="tintuc/{{$item['id']}}/{{$item['TieuDeKhongDau']}}.html">{{$item->TieuDe}}</a></h2>
            <div class="post-meta">
              <span class="d-block">{{$item->TomTat}}</span>
            </div>
          </div>
        </div>
        @endforeach

        <p>
          <a href="#" class="more">Xem Thêm <span class="icon-keyboard_arrow_right"></span></a>
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
