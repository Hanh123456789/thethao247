@extends('templates.thethao.master')
@section('main')
@section('title','Quy định bán hàng')
  <div class="breadcrumbs-section plr-200 mb-80" style="background: url('thethao/images/bg/chinhsach.jpg');background-size: cover;height:300px;background-repeat: round;">
    <div class="breadcrumbs overlay-bg">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="breadcrumbs-inner" style="margin-right: 15%;margin-left: 15%">
              <marquee class="breadcrumbs-title" style="color: white;padding: 138px 0 85px !important;" scrollamount="15" >Chính Sách Bán Hàng</marquee>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- BREADCRUMBS SETCTION END -->

  <!-- Start page content -->
  <div id="page-content" class="page-wrapper">

    <!-- BLOG SECTION START -->
    <div class="blog-section mb-50">
      <div class="container">
        <div class="row">

          <!-- blog-item start -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="blog-item">
              <img src="../public/thethao/images/logo/a1.jpeg" alt="">
              <div class="blog-desc">
                <h6 class="blog-title"><a href="{{route('chinhsachbaomat')}}">Chính sách bảo mật</a></h6>
                <div class="read-more">
                  <a href="{{route('chinhsachbaomat')}}">Read more</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="blog-item">
              <img src="../public/thethao/images/logo/a2.jpeg" alt="">
              <div class="blog-desc">
                <h6 class="blog-title"><a href="{{route('chinhsachbaohanh')}}" >Chính sách bảo hành</a></h6>
                <h6 class="blog-title">bảo trì</h6>
                <div class="read-more">
                  <a href="{{route('chinhsachbaohanh')}}">Read more</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="blog-item">
              <img src="../public/thethao/images/logo/a3.jpeg" alt="">
              <div class="blog-desc">
                <h6 class="blog-title"><a href="{{route('chinhsachdoitra')}}" >Chính sách đổi trả</a></h6>
                <h6 class="blog-title">hàng hóa</h6>
                <div class="read-more">
                  <a href="{{route('chinhsachdoitra')}}">Read more</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="blog-item">
              <img src="../public/thethao/images/logo/a4.jpeg" alt="">
              <div class="blog-desc">
                <h6 class="blog-title"><a href="{{route('phuongthucthanhtoan')}}"> Phương thức thanh</a></h6>
                <h6 class="blog-title">toán</h6>
                <div class="read-more">
                  <a href="{{route('phuongthucthanhtoan')}}">Read more</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="blog-item">
              <img src="../public/thethao/images/logo/a5.jpeg" alt="">
              <div class="blog-desc">
                <h6 class="blog-title"><a href="{{route('chinhsachvanchuyen')}}"> Chính sách vận chuyển</a></h6>
                <h6 class="blog-title">giao hàng</h6>
                <div class="read-more">
                  <a href="{{route('chinhsachvanchuyen')}}">Read more</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="blog-item">
              <img src="../public/thethao/images/logo/a6.jpeg" alt="">
              <div class="blog-desc">
                <h6 class="blog-title"><a href="{{route('baomatcanhan')}}"> Bảo mật cá nhân</a></h6>
                <div class="read-more">
                  <a href="{{route('baomatcanhan')}}">Read more</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="blog-item">
              <img src="../public/thethao/images/logo/a7.jpeg" alt="">
              <div class="blog-desc">
                <h6 class="blog-title"><a href="{{route('quydinhsudung')}}">Quy định sử dụng</a></h6>
                <div class="read-more">
                  <a href="{{route('quydinhsudung')}}">Read more</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="blog-item">
              <img src="../public/thethao/images/logo/a8.jpeg" alt="">
              <div class="blog-desc">
                <h6 class="blog-title"><a href="{{route('camketkhachhang')}}">Cam kết khách hàng</a></h6>
                <div class="read-more">
                  <a href="{{route('camketkhachhang')}}">Read more</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="blog-item">
              <img src="../public/thethao/images/logo/a9.jpeg" alt="">
              <div class="blog-desc">
                <h6 class="blog-title"><a href="{{route('huongdandathang')}}">Hướng dẫn đặt hàng</a></h6>
                <div class="read-more">
                  <a href="{{route('huongdandathang')}}">Read more</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="blog-item">
              <img src="../public/thethao/images/logo/a10.jpeg" alt="">
              <div class="blog-desc">
                <h6 class="blog-title"><a href="{{route('huongdanmuahang')}}" >Hướng dẫn mua hàng</a></h6>
                <h6 class="blog-title">online</h6>
                <div class="read-more">
                  <a href="{{route('huongdanmuahang')}}">Read more</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- BLOG SECTION END -->

  </div>
@stop