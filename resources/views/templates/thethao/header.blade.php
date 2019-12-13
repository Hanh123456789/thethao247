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