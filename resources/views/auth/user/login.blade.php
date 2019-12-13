<!doctype html>
<html class="no-js" lang="utf-8">
<head>
  <meta charset="utf-8">
  <base href="{{URL::asset('/')}}" target="_top">
  <title>Login</title>
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
                                  <a href="{{route('categoriproduct',[$str,$producttype->id])}}" class="name-a" style="color: black">{{$producttype->name}}</a>
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

                                echo "<a href='/public/danh-muc-san-pham/{$str}-{$producttype->id}'>";
                                echo "{$producttype->name}";
                                ham($producttypes,$producttype->id);
                                echo "</a>";
                                echo "</li>";
                            }
                        }
                        echo "</ul>";
                    }
                    ?>
                  <li class="{{ request()->is('tin-tuc') ? 'active' : '' }}"><a href="{{route('tintuc')}}">Tin Tức</a>
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

  <!-- LOGIN SECTION START -->
  <div class="login-section mb-80">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <img src="../public/thethao/images/bg/quangcao1.jpg" style="width: 100%;height: 326px;"/>
        </div>
        <div class="col-md-6">
          <div class="registered-customers">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            @if(Session::has('msg'))
              <div class="alert alert-danger">
               {{Session::get('msg')}}
              </div>
              @endif
            <form action="{{route('post_user_login')}}" method="post">
              @csrf
              <div class="login-account p-30 box-shadow" style="background-color: black">
                <p class="text-center" style="font-size: 55px;font-family: 'Sarabun', sans-serif;color: white !important;  text-shadow:     0px 0px 10px red,
        0px 0px 20px blue,
        0px 0px 30px yellow,
        0px 0px 40px pink;padding-bottom: 40px">Đăng Nhập</p>
                <input style="color: black;font-size: 16px;" type="text" required name="email" placeholder="Email Address">
                <input style="color: black;font-size: 16px;" type="password" name="password" required placeholder="Password">
                <div>
                <p style="color: white"><a href="{{route('forget_pass_user')}}">Quên mật khẩu?</a></p>
                  <p style="margin-left: 78%;margin-top: -31px"><a href="{{route('get_user_register')}}">Đăng kí tài khoản</a></p>
                </div>
                <button class="submit-btn-1 btn-hover-1" type="submit">login</button>
              </div>
            </form>
          </div>
        </div>
        <!-- new-customers -->
        <div class="col-md-3">
          <img src="../public/thethao/images/bg/quangcao2.jpg" style="width: 100%;height: 326px;"/>
        </div>
      </div>
    </div>
  </div>
  <!-- LOGIN SECTION END -->
  <!-- START MOBILE MENU AREA -->

  <!-- END MOBILE MENU AREA -->

  <!-- START FOOTER AREA -->
  <footer id="footer" class="footer-area">
    <div class="footer-top">
      <div class="container-fluid" style="padding: 0px !important;">
        <div class="plr-185" style="padding: 0px !important;">
          <div class="footer-top-inner theme-bg">
            <div class="row">
              <div class="col-lg-4 col-md-5 col-sm-4">
                <div class="single-footer footer-about">
                  <div class="footer-logo">
                    <img src="thethao/img/logo/logo.png" alt="">
                  </div>
                  <div class="footer-brief">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the subas industry's standard dummy text ever since the 1500s,</p>
                    <p>When an unknown printer took a galley of type and If you are going to use a passage of Lorem Ipsum scrambled it to make.</p>
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
              <div class="col-lg-2 hidden-md hidden-sm">
                <div class="single-footer">
                  <h4 class="footer-title border-left">Shipping</h4>
                  <ul class="footer-menu">
                    <li>
                      <a href="#"><i class="zmdi zmdi-circle"></i><span>New Products</span></a>
                    </li>
                    <li>
                      <a href="#"><i class="zmdi zmdi-circle"></i><span>Discount Products</span></a>
                    </li>
                    <li>
                      <a href="#"><i class="zmdi zmdi-circle"></i><span>Best Sell Products</span></a>
                    </li>
                    <li>
                      <a href="#"><i class="zmdi zmdi-circle"></i><span>Popular Products</span></a>
                    </li>
                    <li>
                      <a href="#"><i class="zmdi zmdi-circle"></i><span>Manufactirers</span></a>
                    </li>
                    <li>
                      <a href="#"><i class="zmdi zmdi-circle"></i><span>Suppliers</span></a>
                    </li>
                    <li>
                      <a href="#"><i class="zmdi zmdi-circle"></i><span>Special Products</span></a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="single-footer">
                  <h4 class="footer-title border-left">my account</h4>
                  <ul class="footer-menu">
                    <li>
                      <a href="#"><i class="zmdi zmdi-circle"></i><span>My Account</span></a>
                    </li>
                    <li>
                      <a href="#"><i class="zmdi zmdi-circle"></i><span>My Wishlist</span></a>
                    </li>
                    <li>
                      <a href="#"><i class="zmdi zmdi-circle"></i><span>My Cart</span></a>
                    </li>
                    <li>
                      <a href="#"><i class="zmdi zmdi-circle"></i><span>Sign In</span></a>
                    </li>
                    <li>
                      <a href="#"><i class="zmdi zmdi-circle"></i><span>Registration</span></a>
                    </li>
                    <li>
                      <a href="#"><i class="zmdi zmdi-circle"></i><span>Check out</span></a>
                    </li>
                    <li>
                      <a href="#"><i class="zmdi zmdi-circle"></i><span>Oder Complete</span></a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="single-footer">
                  <h4 class="footer-title border-left">Get in touch</h4>
                  <div class="footer-message">
                    <form action="#">
                      <input type="text" name="name" placeholder="Your name here...">
                      <input type="text" name="email" placeholder="Your email here...">
                      <textarea class="height-80" name="message" placeholder="Your messege here..."></textarea>
                      <button class="submit-btn-1 mt-20 btn-hover-1" type="submit">submit message</button>
                    </form>
                  </div>
                </div>
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
            <div class="row">
              <div class="col-sm-6 col-xs-12">
                <div class="copyright-text">
                  <p>&copy; <a href="#" target="_blank">DevItems</a> 2017. All Rights Reserved.</p>
                </div>
              </div>
              <div class="col-sm-6 col-xs-12">
                <ul class="footer-payment text-right">
                  <li>
                    <a href="#"><img src="thethao/img/payment/1.jpg" alt=""></a>
                  </li>
                  <li>
                    <a href="#"><img src="thethao/img/payment/2.jpg" alt=""></a>
                  </li>
                  <li>
                    <a href="#"><img src="thethao/img/payment/3.jpg" alt=""></a>
                  </li>
                  <li>
                    <a href="#"><img src="thethao/img/payment/4.jpg" alt=""></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- END FOOTER AREA -->

  <!-- START QUICKVIEW PRODUCT -->
  <div id="quickview-wrapper">
    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="modal-product clearfix">
              <div class="product-images">
                <div class="main-image images">
                  <img alt="" src="thethao/img/product/quickview.jpg">
                </div>
              </div><!-- .product-images -->

              <div class="product-info">
                <h1>Aenean eu tristique</h1>
                <div class="price-box-3">
                  <div class="s-price-box">
                    <span class="new-price">£160.00</span>
                    <span class="old-price">£190.00</span>
                  </div>
                </div>
                <a href="single-product-left-sidebar.html" class="see-all">See all features</a>
                <div class="quick-add-to-cart">
                  <form method="post" class="cart">
                    <div class="numbers-row">
                      <input type="number" id="french-hens" value="3">
                    </div>
                    <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                  </form>
                </div>
                <div class="quick-desc">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero.
                </div>
                <div class="social-sharing">
                  <div class="widget widget_socialsharing_widget">
                    <h3 class="widget-title-modal">Share this product</h3>
                    <ul class="social-icons clearfix">
                      <li>
                        <a class="facebook" href="#" target="_blank" title="Facebook">
                          <i class="zmdi zmdi-facebook"></i>
                        </a>
                      </li>
                      <li>
                        <a class="google-plus" href="#" target="_blank" title="Google +">
                          <i class="zmdi zmdi-google-plus"></i>
                        </a>
                      </li>
                      <li>
                        <a class="twitter" href="#" target="_blank" title="Twitter">
                          <i class="zmdi zmdi-twitter"></i>
                        </a>
                      </li>
                      <li>
                        <a class="pinterest" href="#" target="_blank" title="Pinterest">
                          <i class="zmdi zmdi-pinterest"></i>
                        </a>
                      </li>
                      <li>
                        <a class="rss" href="#" target="_blank" title="RSS">
                          <i class="zmdi zmdi-rss"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div><!-- .product-info -->
            </div><!-- .modal-product -->
          </div><!-- .modal-body -->
        </div><!-- .modal-content -->
      </div><!-- .modal-dialog -->
    </div>
    <!-- END Modal -->
  </div>
  <!-- END QUICKVIEW PRODUCT -->

</div>
<script src="/public/thethao/js/vendor/jquery-3.1.1.min.js"></script>
<script src="/public/thethao/lib/js/jquery.nivo.slider.js"></script>
<script src="/public/thethao/js/plugins.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="/public/thethao/js/main.js"></script>
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



</body>
</html>