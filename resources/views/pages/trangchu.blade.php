@extends('pages.layout.index')
@section('content')

<div class="site-section py-0 space-header">
    <div class="owl-carousel hero-slide owl-style">
        @foreach ($bon_tinnoibat as $bon_tin)
            <div class="site-section">
                <div class="container">
                    <div class="half-post-entry d-block d-lg-flex bg-light">
                        <div class="img-bg" style="background-image: url('upload/tintuc/{{$bon_tin->Hinh}}')"></div>
                        <div class="contents">
                            <span class="caption">TIN TỨC NỔI BẬT</span>
                            <h2><a href="tintuc/{{$bon_tin->id}}/{{$bon_tin->TieuDeKhongDau}}.html">{{$bon_tin->TieuDe}}</a></h2>
                            <p class="mb-3">{{$bon_tin->TomTat}}</p>

                            <div class="post-meta">
                                <span class="d-block"><a href="#">{{$bon_tin->loaitin->Ten}}</a></span>
                                <span class="date-read">{{$bon_tin->updated_at}}<span class="mx-1">&bullet;</span>{{$bon_tin->SoLuotXem}} lượt xem</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <?php
                            $loaitin1_1=$loaitin1->shift();
                            ?>
                            <h2>{{$loaitin1_1->loaitin->Ten}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="post-entry-1">
                            <a href="tintuc/{{$loaitin1_1['id']}}/{{$loaitin1_1['TieuDeKhongDau']}}.html"><img src="upload/tintuc/{{$loaitin1_1->Hinh}}" alt="Image" class="img-fluid"></a>
                            <h2><a href="tintuc/{{$loaitin1_1['id']}}/{{$loaitin1_1['TieuDeKhongDau']}}.html">{{$loaitin1_1->TieuDe}}</a></h2>
                            <p>{{$loaitin1_1->TomTat}}</p>
                            <div class="post-meta">
                                <span class="d-block"><a href="#">
                                    @if ($loaitin1_1->NoiBat==0)
                                        {{'Tin không được đánh dấu nổi bật!'}}
                                    @else {{'Tin được đánh dấu nổi bật!'}}
                                    @endif</a></span>
                                <span class="date-read">{{$loaitin1_1->updated_at}}<span class="mx-1">&bullet;</span>{{$loaitin1_1->SoLuotXem}} lượt xem</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @foreach ($loaitin1->all() as $loaitin1_3)
                        <div class="post-entry-2 d-flex bg-light">
                            <div class="thumbnail"
                                 style="background-image: url('upload/tintuc/{{$loaitin1_3->Hinh}}')"></div>
                            <div class="contents">
                                <h2><a href="tintuc/{{$loaitin1_3->id}}/{{$loaitin1_3->TieuDeKhongDau}}.html">{{$loaitin1_3->TieuDe}}</a>
                                </h2>
                                <div class="post-meta">
                                    <span class="d-block"><a href="#">@if ($loaitin1_1->NoiBat==0)
                                        {{'Tin không được đánh dấu nổi bật!'}}
                                    @else {{'Tin được đánh dấu nổi bật!'}}
                                    @endif</a></span>
                                    <span class="date-read">{{$loaitin1_3->updated_at}}<span class="mx-1">&bullet;</span>{{$loaitin1_3->SoLuotXem}} lượt xem</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="section-title">
                    <h2>Xu hướng</h2>
                </div>
                <?php $temp =1 ?>
                @foreach($trending as $tr)

                <div class="trend-entry d-flex">
                    <div class="number align-self-start">{{$temp}}<?php $temp++ ?></div>
                    <div class="trend-contents">
                        <h2><a href="tintuc/{{$tr->id}}/{{$tr->TieuDeKhongDau}}.html">{{$tr->TieuDe}}</a></h2>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">{{$tr->loaitin->Ten}}</a></span>
                            <span class="date-read">{{$tr->updated_at}}<span class="mx-1">&bullet;</span>{{$tr->SoLuotXem}} lượt xem</span>
                        </div>
                    </div>
                </div>

                @endforeach

                <p>
                    <a href="trending" class="more">Xem thêm xu hướng<span class="icon-keyboard_arrow_right"></span></a>
                </p>

            </div>
        </div>
    </div>
</div>
<!-- END section -->



<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title">
                    <h2>{{$loaitin2[0]->loaitin->Ten}}</h2>
                </div>
                @foreach($loaitin2 as $lt2)
                <div class="post-entry-2 d-flex">
                    <div class="thumbnail" style="background-image: url('upload/tintuc/{{$lt2->Hinh}}')"></div>
                    <div class="contents">
                        <h2><a href="tintuc/{{$lt2->id}}/{{$lt2->TieuDeKhongDau}}.html">{{$lt2->TieuDe}}</a></h2>
                        <p class="mb-3">{{$lt2->TomTat}}</p>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">@if ($lt2->NoiBat==0)
                                {{'Tin không được đánh dấu nổi bật!'}}
                            @else {{'Tin được đánh dấu nổi bật!'}}
                            @endif</a></span>
                            <span class="date-read">{{$lt2->updated_at}}<span class="mx-1">&bullet;</span>{{$lt2->SoLuotXem}} lượt xem</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-lg-6">
                <div class="section-title">
                    <h2>{{$loaitin3[0]->loaitin->Ten}}</h2>
                </div>
                @foreach($loaitin3 as $lt3)
                <div class="post-entry-2 d-flex">
                    <div class="thumbnail" style="background-image: url('upload/tintuc/{{$lt3->Hinh}}')"></div>
                    <div class="contents">
                        <h2><a href="tintuc/{{$lt3->id}}/{{$lt3->TieuDeKhongDau}}.html">{{$lt3->TieuDe}}</a></h2>
                        <p class="mb-3">{{$lt3->TomTat}}</p>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">@if ($lt3->NoiBat==0)
                                {{'Tin không được đánh dấu nổi bật!'}}
                            @else {{'Tin được đánh dấu nổi bật!'}}
                            @endif</a></span>
                            <span class="date-read">{{$lt3->updated_at}}<span class="mx-1">&bullet;</span>{{$lt3->SoLuotXem}} lượt xem</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="section-title">
                    <h2>Tin mới nhất</h2>
                </div>
                @foreach ($tinmoinhat as $moinhat)
                    <div class="post-entry-2 d-flex">
                    <div class="thumbnail order-md-2"
                         style="background-image: url('upload/tintuc/{{$moinhat->Hinh}}')"></div>
                    <div class="contents order-md-1 pl-0">
                        <h2><a href="tintuc/{{$moinhat->id}}/{{$moinhat->TieuDeKhongDau}}.html">{{$moinhat->TieuDe}}</a></h2>
                        <p class="mb-3">{{$moinhat->TomTat}}</p>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">@if ($loaitin1_1->NoiBat==0)
                                {{'Tin không được đánh dấu nổi bật!'}}
                            @else {{'Tin được đánh dấu nổi bật!'}}
                            @endif</a></span>
                            <span class="date-read">{{$loaitin1_3->updated_at}}<span class="mx-1">&bullet;</span>{{$loaitin1_3->SoLuotXem}} lượt xem</span>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="col-lg-3">
                <div class="section-title">
                    <h2>Được bình luận gần nhất</h2>
                </div>
                <?php $temp =1 ?>
                @foreach ($binhluan as $bl)
                    <div class="trend-entry d-flex">
                    <div class="number align-self-start">{{$temp}}<?php $temp++ ?></div>
                    <div class="trend-contents">
                        <h2><a href="tintuc/{{$bl->id}}/{{$bl->TieuDeKhongDau}}.html">{{$bl->tintuc->TieuDe}}</a></h2>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">{{$bl->NoiDung}}</a></span>
                            <span class="date-read">{{$bl->updated_at}}<span class="mx-1">&bullet;</span>{{$bl->user->name}}</span>
                        </div>
                    </div>
                    </div>
                @endforeach


                <p>
                    <a href="newest_cmt" class="more">Xem thêm bình luận mới nhất<span class="icon-keyboard_arrow_right"></span></a>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="site-section py-0">
    <div class="owl-carousel hero-slide owl-style">
        @foreach ($slide as $sl)
            <div class="site-section">
                <div class="container">
                    <div class="half-post-entry d-block d-lg-flex bg-light">
                        <img src="upload/slide/{{$sl->Hinh}}" alt="none" style="width : 30rem">
                        <div class="contents">
                            <h2><a href="{{$sl->link}}">{{$sl->Ten}}</a></h2>
                            <p class="mb-3">{{$sl->NoiDung}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>




@endsection
