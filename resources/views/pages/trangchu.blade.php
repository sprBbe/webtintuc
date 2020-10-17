@extends('pages.layout.index')
@section('content')  

<div class="site-section py-0">
    <div class="owl-carousel hero-slide owl-style">
        @foreach ($bon_tinnoibat as $bon_tin)
            <div class="site-section">
                <div class="container">
                    <div class="half-post-entry d-block d-lg-flex bg-light">
                        <div class="img-bg" style="background-image: url('pages_asset/images/big_img_1.jpg')"></div>
                        <div class="contents">
                            <span class="caption">TIN TỨC NỔI BẬT</span>
                            <h2><a href="blog-single.html">{{$bon_tin->TieuDe}}</a></h2>
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
                            <h2>Editor's Pick</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="post-entry-1">
                            <a href="post-single.html"><img src="pages_asset/images/img_h_1.jpg" alt="Image" class="img-fluid"></a>
                            <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi temporibus
                                praesentium neque, voluptatum quam quibusdam.</p>
                            <div class="post-meta">
                                <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                                <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                        class="icon-star2"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="post-entry-2 d-flex bg-light">
                            <div class="thumbnail"
                                 style="background-image: url('pages_asset/images/img_v_1.jpg')"></div>
                            <div class="contents">
                                <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a>
                                </h2>
                                <div class="post-meta">
                                    <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                                    <span class="date-read">Jun 14 <span
                                            class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span></span>
                                </div>
                            </div>
                        </div>

                        <div class="post-entry-2 d-flex">
                            <div class="thumbnail" style="background-image: url('pages_asset/images/img_v_2.jpg')"></div>
                            <div class="contents">
                                <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a>
                                </h2>
                                <div class="post-meta">
                                    <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                                    <span class="date-read">Jun 14 <span
                                            class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span></span>
                                </div>
                            </div>
                        </div>

                        <div class="post-entry-2 d-flex">
                            <div class="thumbnail" style="background-image: url('pages_asset/images/img_v_3.jpg')"></div>
                            <div class="contents">
                                <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a>
                                </h2>
                                <div class="post-meta">
                                    <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                                    <span class="date-read">Jun 14 <span
                                            class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="section-title">
                    <h2>Trending</h2>
                </div>

                <div class="trend-entry d-flex">
                    <div class="number align-self-start">01</div>
                    <div class="trend-contents">
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>

                <div class="trend-entry d-flex">
                    <div class="number align-self-start">02</div>
                    <div class="trend-contents">
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>

                <div class="trend-entry d-flex">
                    <div class="number align-self-start">03</div>
                    <div class="trend-contents">
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>

                <div class="trend-entry d-flex">
                    <div class="number align-self-start">04</div>
                    <div class="trend-contents">
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>

                <p>
                    <a href="#" class="more">See All Trends <span class="icon-keyboard_arrow_right"></span></a>
                </p>

            </div>
        </div>
    </div>
</div>
<!-- END section -->

<div class="py-0">
    <div class="container">
        <div class="half-post-entry d-block d-lg-flex bg-light">
            <div class="img-bg" style="background-image: url('pages_asset/images/big_img_1.jpg')"></div>
            <div class="contents">
                <span class="caption">Editor's Pick</span>
                <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate vero obcaecati
                    natus adipisci necessitatibus eius, enim vel sit ad reiciendis. Enim praesentium magni delectus
                    cum, tempore deserunt aliquid quaerat culpa nemo veritatis, iste adipisci excepturi consectetur
                    doloribus aliquam accusantium beatae?</p>

                <div class="post-meta">
                    <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">Food</a></span>
                    <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                            class="icon-star2"></span></span>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title">
                    <h2>Politics</h2>
                </div>
                <div class="post-entry-2 d-flex">
                    <div class="thumbnail" style="background-image: url('pages_asset/images/img_v_1.jpg')"></div>
                    <div class="contents">
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi
                            temporibus praesentium neque, voluptatum quam quibusdam.</p>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>
                <div class="post-entry-2 d-flex">
                    <div class="thumbnail" style="background-image: url('pages_asset/images/img_v_2.jpg')"></div>
                    <div class="contents">
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi
                            temporibus praesentium neque, voluptatum quam quibusdam.</p>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>
                <div class="post-entry-2 d-flex">
                    <div class="thumbnail" style="background-image: url('pages_asset/images/img_v_3.jpg')"></div>
                    <div class="contents">
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi
                            temporibus praesentium neque, voluptatum quam quibusdam.</p>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-title">
                    <h2>Business</h2>
                </div>
                <div class="post-entry-2 d-flex">
                    <div class="thumbnail" style="background-image: url('pages_asset/images/img_v_1.jpg')"></div>
                    <div class="contents">
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi
                            temporibus praesentium neque, voluptatum quam quibusdam.</p>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>
                <div class="post-entry-2 d-flex">
                    <div class="thumbnail" style="background-image: url('pages_asset/images/img_v_2.jpg')"></div>
                    <div class="contents">
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi
                            temporibus praesentium neque, voluptatum quam quibusdam.</p>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>
                <div class="post-entry-2 d-flex">
                    <div class="thumbnail" style="background-image: url('pages_asset/images/img_v_3.jpg')"></div>
                    <div class="contents">
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi
                            temporibus praesentium neque, voluptatum quam quibusdam.</p>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="section-title">
                    <h2>Recent News</h2>
                </div>
                <div class="post-entry-2 d-flex">
                    <div class="thumbnail order-md-2"
                         style="background-image: url('pages_asset/images/img_h_4.jpg')"></div>
                    <div class="contents order-md-1 pl-0">
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi
                            temporibus praesentium neque, voluptatum quam quibusdam.</p>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>

                <div class="post-entry-2 d-flex">
                    <div class="thumbnail order-md-2"
                         style="background-image: url('pages_asset/images/img_h_3.jpg')"></div>
                    <div class="contents order-md-1 pl-0">
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi
                            temporibus praesentium neque, voluptatum quam quibusdam.</p>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>

                <div class="post-entry-2 d-flex">
                    <div class="thumbnail order-md-2"
                         style="background-image: url('pages_asset/images/img_h_3.jpg')"></div>
                    <div class="contents order-md-1 pl-0">
                        <span class="caption mb-4 d-block">Editor's Pick</span>
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi
                            temporibus praesentium neque, voluptatum quam quibusdam.</p>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="section-title">
                    <h2>Popular Posts</h2>
                </div>

                <div class="trend-entry d-flex">
                    <div class="number align-self-start">01</div>
                    <div class="trend-contents">
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>

                <div class="trend-entry d-flex">
                    <div class="number align-self-start">02</div>
                    <div class="trend-contents">
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>

                <div class="trend-entry d-flex">
                    <div class="number align-self-start">03</div>
                    <div class="trend-contents">
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>

                <div class="trend-entry d-flex pl-0">
                    <div class="number align-self-start">04</div>
                    <div class="trend-contents">
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>

                <p>
                    <a href="#" class="more">See All Popular <span class="icon-keyboard_arrow_right"></span></a>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <ul class="custom-pagination list-unstyled">
                    <li><a href="#">1</a></li>
                    <li class="active">2</li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="site-section subscribe bg-light">
    <div class="container">
        <form action="#" class="row align-items-center">
            <div class="col-md-5 mr-auto">
                <h2>Newsletter Subcribe</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis aspernatur ut at quae omnis
                    pariatur obcaecati possimus nisi ea iste!</p>
            </div>
            <div class="col-md-6 ml-auto">
                <div class="d-flex">
                    <input type="email" class="form-control" placeholder="Enter your email">
                    <button type="submit" class="btn btn-secondary"><span class="icon-paper-plane"></span></button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection