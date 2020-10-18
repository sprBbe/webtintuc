<div class="site-mobile-menu site-navbar-target">
  <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
      </div>
  </div>
  <div class="site-mobile-menu-body"></div>
</div>


<div class="header-top">
  <div class="container">
      <div class="row align-items-center">
          <div class="col-12 col-lg-6 d-flex">
              <a href="/trangchu" class="site-logo">
                  VINATIN
              </a>

              <a href="#"
                 class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                      class="icon-menu h3"></span></a>

          </div>
          <div class="col-12 col-lg-6 ml-auto d-flex">
              <div class="ml-md-auto top-social d-none d-lg-inline-block">
                  <a href="#" class="d-inline-block p-3"><span class="icon-facebook"></span></a>
                  <a href="#" class="d-inline-block p-3"><span class="icon-twitter"></span></a>
                  <a href="#" class="d-inline-block p-3"><span class="icon-instagram"></span></a>
              </div>
              <form action="timkiem" class="search-form d-inline-block">

                  <div class="d-flex">
                      <input type="text" class="form-control" name="TimKiem" placeholder="Tìm kiếm từ khóa ...">
                      <button type="submit" class="btn btn-secondary"><span class="icon-search"></span></button>
                  </div>
              </form>


          </div>
          <div class="col-6 d-block d-lg-none text-right">

          </div>
      </div>
  </div>


  <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">

      <div class="container">
          <div class="d-flex align-items-center">

              <div class="mr-auto">
                  <nav class="site-navigation position-relative text-right" role="navigation">
                      <ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">
                            <li class="active">
                                <a href="/trangchu" class="nav-link text-left">Trang Chủ</a>
                            </li>
                            @foreach ($theloai as $tl)
                                @if(count($tl->loaitin)>0)
                                    <li>
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{$tl -> Ten}}
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach ($tl->loaitin as $lt)
                                            <a class="dropdown-item-2" href="loaitin/{{$lt->id}}/{{$lt->TenKhongDau}}.html">{{$lt->Ten}}</a>
                                        @endforeach
                                        </div>
                                    </li>
                                @endif
                            @endforeach

                      </ul>
                  </nav>

              </div>

          </div>
      </div>

  </div>

</div>
