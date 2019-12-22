<!doctype html>
<html class="no-js" lang="utf-8">
<head>
    <meta charset="utf-8">
    <base href="{{URL::asset('/')}}" target="_top">
    <title>@yield('title')</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                                                                    <a href="{{route('categoriproduct',[$str,$producttype->id])}}" class="name-a" style="color: black !important;border-bottom: none!important;text-transform: uppercase">{{$producttype->name}}</a>
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

    <!-- LOGIN SECTION START -->
    <div class="login-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="../public/thethao/images/bg/quangcao1.jpg" style="width: 100%;height: 330px;"/>
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
                            <div class="alert alert-success">
                                {{Session::get('msg')}}
                            </div>
                        @endif
                        <form action="{{route('post_forget_pass_user')}}" method="post">
                            @csrf
                            <div class="login-account p-30 box-shadow" style="background-color: black">
                                <p class="text-center" style="font-size: 55px;font-family: 'Sarabun', sans-serif;color: white !important;  text-shadow:     0px 0px 10px red,
        0px 0px 20px blue,
        0px 0px 30px yellow,
        0px 0px 40px pink;padding-bottom: 40px">Quên mật khẩu</p>
                                <input style="color: black;font-size: 16px;" type="text" required name="email" placeholder="Email Address">
                                <button class="submit-btn-1 btn-hover-1" type="submit">Gửi</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <img src="../public/thethao/images/bg/quangcao2.jpg" style="width: 100%;height: 330px;"/>
                </div>
                <!-- new-customers -->
            </div>
        </div>
    </div>
    <!-- LOGIN SECTION END -->

    <!-- END MOBILE MENU AREA -->


    <!-- END FOOTER AREA -->
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
    <!-- START QUICKVIEW PRODUCT -->

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