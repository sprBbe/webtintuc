@extends('pages.layout.index')
@section('content')
<div height="1000px">&nbsp;<br>&nbsp;<br>&nbsp;<br></div>
<div class="site-section">
  <div class="container">

        <div height="1000px">&nbsp;<br>&nbsp;</div>
        <div class="section-title">
          <h2>Tin Nổi Bật</h2>
        </div>
        <br>
        @foreach ($tinnoibat as $tt)
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
</div>
@endsection
