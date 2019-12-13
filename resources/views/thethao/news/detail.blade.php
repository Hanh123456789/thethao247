<!doctype html>
<html class="no-js" lang="utf-8">
<head>
  <meta charset="utf-8">
  <base href="{{URL::asset('/')}}" target="_top">
  <title>Chi tiết tin tức</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="thethao/image/x-icon" href="thethao/img/icon/favicon.png">
  <link rel="stylesheet" href="thethao/css/bootstrap.min.css">
  <link rel="stylesheet" href="thethao/lib/css/nivo-slider.css">
  <link rel="stylesheet" href="thethao/css/core.css">
  <link rel="stylesheet" href="thethao/css/shortcode/shortcodes.css">
  <link rel="stylesheet" href="thethao/css/style.css">
  <link rel="stylesheet" href="thethao/css/responsive.css">
  <link rel="stylesheet" href="thethao/css/thethao.css">
  <link rel="stylesheet" href="thethao/css/custom.css">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <script src="thethao/js/vendor/modernizr-2.8.3.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
<!-- Body main wrapper start -->
<div class="wrapper">
  <!-- START HEADER AREA -->
  <header class="header-area header-wrapper">
    <!-- header-top-bar -->
    <div  class=" header-top-bar plr-185">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6 hidden-xs">
            <div class="call-us">
              <p class="mb-0 roboto" style="color: white !important">
                ĐT:0865556800 - Email:thethao247@gmail.com</p>
            </div>
          </div>
          <div class="col-sm-6 col-xs-12">
            <div class="top-link clearfix">
              <ul class="link f-right">
                @if(Auth::check())
                  <li>
                    <a href="{{route('donhangcuaban')}}">
                      <i class="zmdi zmdi-collection-text"></i>
                      Đơn hàng của bạn
                    </a>
                  </li>
                  <li>
                    <a href="{{route('listsanphamlike')}}">
                      <i class="zmdi zmdi-favorite"></i>
                      Sản phẩm yêu thích
                    </a>
                  </li>
                  <li>
                    <a href="{{route('profile',Auth::user()->id)}}">
                      <i class="zmdi zmdi-account"></i>
                      {{Auth::user()->name}}
                    </a>
                  </li>
                @endif
                <li>
                  @if(Auth::check())
                    <a href="{{route('logout_path_user')}}">
                      <i class="zmdi zmdi-lock"></i>
                      Logout
                    </a>
                  @else
                    <a href="{{route('login_path_user')}}" style="color: white !important">
                      <i class="zmdi zmdi-lock"></i>
                      Login
                    </a>
                  @endif
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- header-middle-area -->
    <div id="sticky-header" class="header-middle-area plr-185" style="height: 84px">
      <div class="container-fluid">
        <div class="full-width-mega-dropdown">
          <div class="row">
            <!-- logo -->
            <div class="col-md-2 col-sm-6 col-xs-12">
              <div class="logo">
                <a href="{{route('the_thao_index')}}">
                  <img src="thethao/img/logo/logo.png" alt="main logo">
                </a>
              </div>
            </div>
            <!-- primary-menu -->
            <div class="col-md-8 hidden-sm hidden-xs">
              <nav id="primary-menu">
                <ul class="main-menu text-center">
                  <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{route('the_thao_index')}}">Trang chủ</a>
                  </li>
                  <li class="mega-parent {{ request()->is('danh-muc-san-pham*') ? 'active' : '' }}">
                    <a href="{{route('the_thao_index')}}">Sản phẩm </a>
                    <div class="mega-menu-area clearfix">
                      <div class="mega-menu-link f-left">
                        @foreach($producttypes as $producttype)
                          @if($producttype->parent_id==0)
                            <ul class="single-mega-item">
                              <div class="btn-group">
                                <div id="dLabel"  style="cursor: pointer;margin-bottom: 20px"
                                >
                                  @php
                                    $str = str_slug($producttype->name);
                                  @endphp
                                  <a href="{{route('categoriproduct',[$str,$producttype->id])}}" class="name-a" style="color: black !important;border-bottom: none!important;">{{$producttype->name}}</a>
                                </div>                                        <?php echo ham($producttypes,$producttype->id) ?>
                            </ul>
                  @endif
                  @endforeach
                    <?php
                    function ham($producttypes,$cat_id) {
                        echo '<ul class="dropdown-menu">';
                        foreach($producttypes as $producttype){
                            if($producttype->parent_id==$cat_id){


                                echo '<li class="dropdown-submenu">';

                                $str = str_slug($producttype->name);

                                echo "<a style='color: black !important;border-bottom: none!important;' href='/public/danh-muc-san-pham/{$str}-{$producttype->id}'>";
                                echo "{$producttype->name}";
                                ham($producttypes,$producttype->id);
                                echo "</a>";
                                echo "</li>";
                            }
                        }
                        echo "</ul>";
                    }
                    ?>
                  <li class="{{ request()->is('tin-tuc*') ? 'active' : '' }}"><a href="{{route('tintuc')}}">Tin Tức</a>
                  </li>
                  <li class="{{ request()->is('chinh-sach-ban-hang*') ? 'active' : '' }}">
                    <a href="{{route('chinhsach')}}">Bán Hàng</a>
                  </li>
                  <li class="{{ request()->is('gioi-thieu') ? 'active' : '' }}">
                    <a href="{{route('gioithieu')}}">Giới Thiệu</a>
                  </li>
                  <li class="{{ request()->is('lien-he') ? 'active' : '' }}">
                    <a href="{{route('lienhe')}}">Liên Hệ</a>
                  </li>
                </ul>
              </nav>
            </div>
            <!-- header-search & total-cart -->
            <div class="col-md-2 col-sm-6 col-xs-12">
              <div class="search-top-cart  f-right">
                <!-- header-search -->
                <div class="header-search f-left">
                  <div class="header-search-inner">
                    <button class="search-toggle">
                      <i class="zmdi zmdi-search"></i>
                    </button>
                    <form action="{{route('searchsanpham')}}" method="get">
                      <div class="top-search-box">
                        <input type="text" name="searchtong" placeholder="Search here your product...">
                        <button type="submit">
                          <i class="zmdi zmdi-search"></i>
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- total-cart -->
                <div class="total-cart f-left">
                  <div class="total-cart-in">
                    <div class="cart-toggler">
                      @if(isset(Auth::user()->name))
                        <a href="{{route('get_cart',Auth::user()->id)}}">
                                    <span class="cart-quantity" id="haha">
                                        @if($cart_header == "")
                                      @else
                                        {{count($cart_header)}}
                                      @endif
                                    </span><br>
                          <span class="cart-icon">
                                        <i class="zmdi zmdi-shopping-cart-plus"></i>
                                    </span>
                        </a>
                      @else
                        <a href="{{route('login_path_user')}}" class="nouser">
                          </span><br>
                          <span class="cart-icon">
                                        <i class="zmdi zmdi-shopping-cart-plus"></i>
                                    </span>
                        </a>
                      @endif
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- END HEADER AREA -->
  @if(Auth::check())
  @php
    $hihi = "1";
  @endphp
@else
  @php
    $hihi = "2";
  @endphp
@endif
  <!-- START MOBILE MENU AREA -->
  <div id="snackbar">
    <div style="padding: 20px">
      <img src="admin/img/logo/iconadd.png"  style="border-radius: 50%;width: 50px;height: 50px;">
      <p style="color: white !important;font-size: 20px;margin-top: 30px;font-family: 'Raleway', sans-serif;" >Sản phẩm đã được thêm vào Giỏ hàng</p>
    </div>
  </div>
  <div id="snackbar1">
    <div style="padding: 20px">
      <img src="thethao/img/icon/download.png"  style="border-radius: 50%;width: 50px;height: 50px;">
      <p style="font-size: 20px;margin-top: 30px;font-family: 'Raleway', sans-serif;font-weight: bold" >Sản phẩm này đã hết hàng !!!</p>
    </div>
  </div>
  <!-- END MOBILE MENU AREA -->
  <section id="page-content" class="page-wrapper">

    <!-- BLOG SECTION START -->
    <div class="blog-section mb-50">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <aside class="widget widget-categories box-shadow" style="margin-bottom: 50px;padding-bottom: 0px">
              <div id="cat-treeview" class="product-cat">
                <img class="icon-news" src="../public/thethao/img/icon/news.png"> <span class="span-news">Tin tức</span>
              </div>
            </aside>
          </div>
          <div class="col-md-9 col-xs-12">
            <div class="blog-details-area">

              <!-- blog-like-share -->
              <!-- blog-details-title -->
              <h3 class="blog-details-title mb-30">{{$new->name}}</h3>
              <ul class="blog-like-share mb-20">
                <li>
                  <a href="#"><i class="zmdi zmdi-comments"></i>{{$new->count}} Bình luận</a>
                </li>
                <li>
                  <a href="#"><i class="zmdi zmdi-share"></i>{{$new->count}} Lượt đọc </a>
                </li>
              </ul>
              <!-- blog-description -->
              <div class="blog-description mb-60">
                  {!! $new->detail !!}
              </div>
              <!-- author-post -->

              <!-- comments on t this post -->


              <div class="post-comments mb-60">

                <!-- single-comments -->

                @if(count($comments_parent)>0)
                  <h4 class="blog-section-title border-left mb-30">Bình luận bài viết</h4>
                  <div id="ketqua"></div>
                @foreach($comments_parent as $comment)
                <div class="media mt-30">
                  <div class="media-left pr-30">
                    <a href="#"><img class="hinh-anh-comment media-object" src="../public/images/{{$comment->user->images}}" alt="#"></a>
                  </div>
                  <div class="media-body">
                    <div class="clearfix">
                      <div class="name-commenter f-left">
                        <h6 class="media-heading chu-comment"><a href="#">{{$comment->user->name}}</a></h6>
                        <p class="mb-10">{{$comment->created_at}}</p>
                      </div>
                      <ul class="reply-delate f-right">
                        <li><a href="" data-a="{{$comment->id}}"  class="rep-a">Reply</a></li>
                      </ul>
                    </div>
                    <p class="mb-0">{{$comment->content}}</p>
                  </div>
                </div>
                @if(count($comments_con)>0)
                  @foreach($comments_con as $comment_con)
                    @if($comment_con->id_parent == $comment->id)
                        <div class="media mt-30" style="margin-left: 12%">
                          <div class="media-left pr-30">
                            <a href="#"><img class="hinh-anh-comment-con media-object" src="../public/images/{{$comment_con ->user->images}}" alt="#"></a>
                          </div>
                          <div class="media-body">
                            <div class="clearfix">
                              <div class="name-commenter f-left">
                                <h6 class="media-heading chu-comment" style="font-size: 11px"><a href="#">{{$comment_con->user->name}}</a></h6>
                                <p class="mb-10" style="font-size: 11px">{{$comment_con->created_at}}</p>
                              </div>
                            </div>
                            <p class="mb-0">{{$comment_con->content}}</p>
                          </div>
                        </div>
                      @endif
                  @endforeach
                  @endif
                  <div id="ketqua1-{{$comment->id}}"></div>
                <!-- single-comments -->

                  <form  class="rep-form-{{$comment->id}}" style="display: none;">
                    <div class="leave-comment" style="margin-top: 15px;margin-left: 20%">
                      <div class="row">
                        <div class="col-md-12">
                          <textarea style="width: 74%;height: 70px;color: black" class="custom-textarea" id="rep-mess-{{$comment->id}}" placeholder="Your comment here..."></textarea>
                        </div>
                      </div>
                      <button data-comid ="{{$comment->id}}" class="rep-submit submit-btn-1 black-bg mt-30 btn-hover-2" type="submit">Trả lời</button>
                    </div>
                    <!--  -->
                  </form>
                @endforeach
                @else
                  <div id="ketqua"></div>
                @endif
              </div>

              <!-- leave your comment -->
              <form >
              <div class="leave-comment">
                <h4 class="blog-section-title border-left mb-30">Để lại bình luận</h4>
                <div class="row">
                  <div class="col-md-12">
                    <textarea style="color: black" class="custom-textarea" id="com-mess" placeholder="Your comment here..."></textarea>
                  </div>
                </div>
                <button  class="com-submit submit-btn-1 black-bg mt-30 btn-hover-2" type="submit">Gửi Bình Luận</button>
              </div>
              <!--  -->
              </form>
            </div>

          </div>
          <div class="col-md-3 col-xs-12">
            <aside class="widget widget-product box-shadow mb-30">
              <h6 class="widget-title border-left mb-20">tin xem nhiều</h6>
            @foreach($news_hight as $new_hight)
              <div class="product-item">
                <div class="product-img">
                  @php
                    $str =str_slug($new_hight->name);
                  @endphp
                  <a href="{{route('chitiettintuc',[$str,$new_hight->id])}}">
                    <img style="height: 90px" src="../public/images/{{$new_hight->images}}" alt=""/>
                  </a>
                </div>
                <div class="product-info">
                  <h6 class="pro-name">
                    <a href="{{route('chitiettintuc',[$str,$new_hight->id])}}">{{$new_hight->name}}</a>
                  </h6>
                </div>
              </div>
              <!-- product-item end -->
              @endforeach


            </aside>
            <!-- operating-system -->
          </div>
        </div>
      </div>
    </div>
    <!-- BLOG SECTION END -->

  </section>

  <footer id="footer" class="footer-area">
    <div class="footer-top">
      <div class="container-fluid" style="padding: 0px !important;">
        <div class="plr-185" style="padding: 0px !important;">
          <div class="footer-top-inner theme-bg">
            <div class="row">
              <div class="col-lg-3 col-md-5 col-sm-4">
                <div class="single-footer footer-about">
                  <div class="footer-logo">
                    <img src="thethao/img/logo/logo.png" alt="" style="width: 100%">
                  </div>
                  <ul class="footer-social">
                    <li>
                      <a class="facebook" href="#" title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
                    </li>
                    <li>
                      <a class="google-plus" href="#" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a>
                    </li>
                    <li>
                      <a class="twitter" href="#" title="Twitter"><i class="zmdi zmdi-twitter"></i></a>
                    </li>
                    <li>
                      <a class="rss" href="#" title="RSS"><i class="zmdi zmdi-rss"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-3 hidden-md hidden-sm">
                <div class="single-footer">
                  <h4 class="footer-title border-left map-view">Liên Hệ</h4>
                  <ul class="footer-menu">
                    <li>
                      <a href="#"><i class="zmdi zmdi-circle"></i><span> Địa chỉ: phường Hòa Khánh Bắc,Quận Liên Chiểu,Thành phố Đà Nẵng.</span></a>
                    </li>
                    <li>
                      <a href="#"><i class="zmdi zmdi-circle"></i><span style="font-family: Arial, Helvetica, sans-serif">0865556800 - 0386226722</span></a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-3 footer-block footer-block-3">
                <h4 class="footer-title border-left map-view">MUA HÀNG TRỰC TUYẾN</h4>
                <ul class="footer-list-delivery">
                  <li style="margin-bottom: 5px"><a class="delivery-item ico-delivery-1 borderRadius" title="Tìm và đặt hàng dễ dàng">Tìm và đặt hàng dễ dàng</a></li>
                  <li style="margin-bottom: 5px"><a class="delivery-item  ico-delivery-2 borderRadius">Giao hàng nhanh nhất</a></li>
                </ul>
              </div>
              <div class="col-lg-3 footer-block footer-block-3">
                <h4 class="footer-title border-left map-view">ĐẢM BẢO CHẤT LƯỢNG</h4>
                <ul class="footer-list-delivery">
                  <li style="margin-bottom: 5px"><a class="delivery-item  ico-delivery-3 borderRadius" title="Hoàn tiền 100% đảm bảo">Hoàn tiền 100% đảm bảo</a></li>
                  <li style="margin-bottom: 5px"><a class="delivery-item  ico-delivery-4 borderRadius" title="1 đổi 1 trong 15 ngày">1 đổi 1 trong 15 ngày</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom black-bg">
      <div class="container-fluid">
        <div class="plr-185">
          <div class="copyright">
            <div class="row" style="height: 40px;">
              <div class="col-sm-6 col-xs-12">

              </div>
              <div class="col-sm-6 col-xs-12">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  </div>

  <!-- Main js file that contents all jQuery plugins activation. -->
  <script src="js/main.js"></script>
  <script src="thethao/js/vendor/jquery-3.1.1.min.js"></script>
  <script src="thethao/js/bootstrap.min.js"></script>
  <script src="thethao/lib/js/jquery.nivo.slider.js"></script>

  <script src="thethao/js/plugins.js"></script>
  <script src="thethao/js/main.js"></script>
  <script type="text/javascript">
      $(".btn-group, .dropdown").hover(
          function () {
              $('>.dropdown-menu', this).stop(true, true).fadeIn("fast");
              $(this).addClass('open');
          },
          function () {
              $('>.dropdown-menu', this).stop(true, true).fadeOut("fast");
              $(this).removeClass('open');
          });
  </script>
  <script>
      $(document).ready(function(){
          $(".add-to-cart").click(function(){
              var x = document.getElementById("snackbar");
              x.className = "show";
              setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2000);
          });
      });
  </script>
  <script>
      $(document).ready(function(){
          $(".error-zerro").click(function(){
              var x = document.getElementById("snackbar1");
              x.className = "show";
              setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2000);
          });
      });
  </script>
  <script type="text/javascript">

      function addcart(id){
          $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: "{{route('add_to_cart')}}",
              type: 'POST',  // POST or GET
              cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
              data: {
                  aId:id
              },
              success: function(data){ // dữ liệu lấy qua biến data
                  $('#haha').html(data);
              },

              error: function (){
                  alert('Có lỗi xảy ra');
              }
          });
          return false;
      }
  </script>
  <script>
      $(document).ready(function() {
          $('#choose-sick').on('change', function() {
              $('#form-sick').submit();
          });
      });
  </script>

  <script type="text/javascript">

      function haha(id){
          alert(id);
          $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: "{{route('add_to_cart')}}",
              type: 'POST',  // POST or GET
              cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
              data: {
                  aId:id
              },
              success: function(data){ // dữ liệu lấy qua biến data
                  $('#haha').html(data);
              },

              error: function (){
                  alert('Có lỗi xảy ra');
              }
          });
          return false;
      }
  </script>

  <script>
      function add(id) {
          var soluong = parseInt(document.getElementById("soluong-"+id).value);
          var tongtien = parseInt(document.getElementById('tongao').innerHTML);
          var cartsl = parseInt(document.getElementById('haha').innerHTML);

          $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: "{{route('update_to_cart')}}",
              type: 'POST',  // POST or GET
              cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
              data: {
                  aId: id,
                  soLuong:soluong,
                  tongTien:tongtien,
              },
              success: function (data) { // dữ liệu lấy qua biến data
                  $('.cart-'+id).html(data);
                  $.ajax({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      url: "{{route('update_to_cart1')}}",
                      type: 'POST',  // POST or GET
                      cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
                      data: {
                          aId: id,
                          soLuong:soluong,
                          tongTien:tongtien,
                      },
                      success: function (data) { // dữ liệu lấy qua biến data
                          var index = data.indexOf('-');
                          var data1 = data.slice(0,index);
                          var data2 = data.slice(index+1)
                          $('.hihi123').html(data1);
                          $('#tongao').html(data2);
                          $.ajax({
                              headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              },
                              url: "{{route('update_to_cart2')}}",
                              type: 'POST',  // POST or GET
                              cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
                              data: {
                                  aId: id,
                                  soLuong:soluong,
                                  tongTien:tongtien,
                                  cartSl:cartsl
                              },
                              success: function (data) { // dữ liệu lấy qua biến data
                                  $('#haha').html(data);
                              },

                              error: function () {
                                  alert('Có lỗi xảy ra');
                              }
                          });
                      },

                      error: function () {
                          alert('Có lỗi xảy ra');
                      }
                  });

              },

              error: function () {
                  alert('Có lỗi xảy ra');
              }
          });
      }

  </script>

  <script>
      function addsub(id) {
          var soluong = parseInt(document.getElementById("soluong-"+id).value);
          var tongtien = parseInt(document.getElementById('tongao').innerHTML);
          var cartsl = parseInt(document.getElementById('haha').innerHTML);
          $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: "{{route('update_to_cart3')}}",
              type: 'POST',  // POST or GET
              cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
              data: {
                  aId: id,
                  soLuong:soluong,
                  tongTien:tongtien,
              },
              success: function (data) { // dữ liệu lấy qua biến data
                  $('.cart-'+id).html(data);
                  $.ajax({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      url: "{{route('update_to_cart4')}}",
                      type: 'POST',  // POST or GET
                      cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
                      data: {
                          aId: id,
                          soLuong:soluong,
                          tongTien:tongtien,
                      },
                      success: function (data) { // dữ liệu lấy qua biến data
                          var index = data.indexOf('-');
                          var data1 = data.slice(0,index);
                          var data2 = data.slice(index+1)
                          $('.hihi123').html(data1);
                          $('#tongao').html(data2);
                          $.ajax({
                              headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              },
                              url: "{{route('update_to_cart5')}}",
                              type: 'POST',  // POST or GET
                              cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
                              data: {
                                  aId: id,
                                  soLuong:soluong,
                                  tongTien:tongtien,
                                  cartSl:cartsl
                              },
                              success: function (data) { // dữ liệu lấy qua biến data
                                  $('#haha').html(data);
                              },

                              error: function () {
                                  alert('Có lỗi xảy ra');
                              }
                          });
                      },

                      error: function () {
                          alert('Có lỗi xảy ra');
                      }
                  });

              },

              error: function () {
                  alert('Có lỗi xảy ra');
              }
          });
      }

  </script>
  <script>
      $(document).ready(function() {
          $('#choose-categories').on('change', function() {
              $('#form-search').submit();
          });
      });
  </script>
  <script>
      $(function(){
          $('#choose-have').on('change',function(){
              $('#form-search').submit();
          });
      });
  </script>
  <script>
      $(function(){
          $('#choose-new').on('change',function(){
              $('#form-search').submit();
          });
      });
  </script>
  <script type="text/javascript">
      $(document).ready(function(){
          $('.com-submit').click(function(){
              hi = {{$hihi}};
             if (hi==2){
                 alert('Bạn vui lòng đăng nhập để bình luận.')
             }else {
                 l = $('#com-mess').val();
                 bid = {{$new->id}};
                 $.ajax({
                     headers: {

                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                     },
                     url: "{{route('binh-luan-new-1')}}",
                     type: 'POST',  // POST or GET
                     data: {
                         mess: l,
                         bid: bid

                     },
                     success: function (data) { // dữ liệu lấy qua biến data
                         $('#ketqua').append(data);
                     }
                 })
             }
              return false;

          });
      });
  </script>
  <script type="text/javascript">
      $(document).ready(function(){
          $('.rep-a').click(function(){
              id=$(this).attr('data-a');
              $('.rep-form-'+id).slideToggle();
              return false;

          });
      });
  </script>
  <script type="text/javascript">
      $(document).ready(function(){
          $('.rep-submit').click(function(){
              bid = $(this).attr("data-comid");
              m= $('#rep-mess-'+bid).val();
              cid = {{$new->id}};
              $.ajax({
                  headers: {

                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                  },
                  url: "{{route('binh-luan-new-2')}}",
                  type: 'POST',  // POST or GET
                  data: {
                      mess: m,
                      bid : bid,
                      cid : cid,

                  },
                  success: function(data){ // dữ liệu lấy qua biến data
                      $('#ketqua1-'+bid).append(data);
                  }
              });
              return false;

          });
      });
  </script>
  </body>
  </html>
