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
<!-- END MOBILE MENU AREA -->
    <!-- Start page content -->
    <section id="page-content" class="page-wrapper" style="margin-top: 50px">

        <!-- SHOP SECTION START -->
        <div class="shop-section mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <!-- single-product-area start -->
                        <div class="single-product-area mb-80">
                            <div class="row">
                                <!-- imgs-zoom-area start -->
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <div class="imgs-zoom-area">
                                        <img height="300px" id="zoom_03" src="../public/images/{{$image_product->images}}" data-zoom-image="../public/images/{{$image_product->images}}" alt="">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div id="gallery_01" class="carousel-btn slick-arrow-3 mt-30">
                                                    @foreach($images_product as $img)
                                                        <div class="p-c">
                                                            <a href="#" data-image="../public/images/{{$img->images}}" data-zoom-image="../public/images/{{$img->images}}">
                                                                <img height="86px" class="zoom_03" src="../public/images/{{$img->images}}" alt="">
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- imgs-zoom-area end -->
                                <!-- single-product-info start -->
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <div class="single-product-info">
                                        <h3 class="text-black-1" style="font-family: Arial, Helvetica, sans-serif;color: black;font-weight: bold">{{$product->name}}</h3>
                                        <hr>
                                        <!-- single-pro-color-rating -->
                                        <div class="single-pro-color-rating clearfix">
                                            <div class="sin-pro-color f-left">
                                                <div class="widget-color f-left">
                                                    @if($product->promotion_price == 0)
                                                        <div style="font-family: Arial, Helvetica, sans-serif;font-weight:bold; font-size:14px; color:#393939">Giá: {{number_format($product->unit_price)}}đ</div>
                                                    @else
                                                        <div style="font-family: Arial, Helvetica, sans-serif;font-weight:bold; font-size:14px; color:#393939"><s>Giá: {{number_format($product->unit_price)}}đ</s></div>
                                                        <div class="price" style="font-family: Arial, Helvetica, sans-serif;color: #c52720;font-size: 14px;font-weight: bold;">Giá KM: {{number_format($product->promotion_price)}} đ</div>
                                                    @endif
                                                </div>
                                            </div>
                                            @include('thethao.sao')
                                        </div>
                                        <!-- hr -->
                                        <hr>
                                        <!-- plus-minus-pro-action -->
                                        <div class="plus-minus-pro-action clearfix">
                                            <div class="sin-plus-minus f-left clearfix">
                                                <div class="pro-attr-detail" style="width:155%;font-family: Arial, Helvetica, sans-serif;background: linear-gradient(to bottom, rgba(242,242,242,1) 0%,rgba(255,255,255,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f2f2f2', endColorstr='#ffffff',GradientType=0);padding: 20px;border: solid 1px #EEE;">
                                                    <div class="attr-item"> <span class="attr-name" style="font-weight: bold;color: black">Bảo hành:</span> <span class="attr-value" style="color: black;font-size: 15px">{{$product->guarantee}}</span>
                                                        <div class="c"></div>
                                                    </div>

                                                    <div class="attr-item"> <span class="attr-name" style="font-weight: bold;color: black">Tình trạng:</span> <span class="attr-value" style="color: black;font-size: 15px">
                                                            @if($product->unit>0)
                                                                Còn hàng
                                                            @else
                                                                Hết hàng
                                                            @endif
                                                        </span>
                                                        <div class="c"></div>
                                                    </div>
                                                    <div class="attr-item"> <span class="attr-name" style="font-weight: bold;color: black">Xuất xứ:</span> <span class="attr-value" style="color: black;font-size: 15px">{{$product->trademark}}</span>
                                                        <div class="c"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sin-pro-action f-right">
                                                <ul class="action-button">
                                                    @if(isset(Auth::user()->name))
                                                        @if($product->like($product->id,Auth::user()->id))
                                                            <li id="yeuthich-{{$product->id}}">
                                                                <a style="background-color: #ff7f00" href="javascript:void(0)" onclick="return addlike({{$product->id}},1)" title=" Bỏ yêu thích"><i style="color:white;" class="zmdi zmdi-favorite"></i></a>
                                                            </li>
                                                        @else
                                                            <li id="yeuthich-{{$product->id}}">
                                                                <a href="javascript:void(0)"  onclick="return addlike({{$product->id}},0)" title="Yêu thích"><i class="zmdi zmdi-favorite"></i></a>
                                                            </li>
                                                        @endif
                                                    @else
                                                        <li id="yeuthich-{{$product->id}}">
                                                            <a href="{{route('login_path_user')}}" title="Yêu thích" ><i class="zmdi zmdi-favorite"></i></a>
                                                        </li>
                                                    @endif
                                                    <li>
                                                        @if(isset(Auth::user()->name)&& $product->unit > 0)
                                                            <a href="javascript:void(0)" class="add-to-cart" onclick="return addcart({{$product->id}})" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                        @elseif($product->unit == 0)
                                                            <a href="javascript:void(0)" class="error-zerro"  title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                        @else
                                                            <a href="{{route('login_path_user')}}"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- plus-minus-pro-action end -->
                                        <!-- hr -->
                                        <hr>
                                        <!-- single-product-price -->
                                        <div class="promo-title" style="font-size: 14px;line-height: 20px;font-weight: bold;margin-bottom: 15px;"><h3 style="font-size: 14px;line-height: 20px;display: inline-block; padding-bottom: 5px;border-bottom: 2px solid #d30102;">HỔ TRỢ CHI NHÁNH TOÀN QUỐC</h3></div>
                                        <p style="box-sizing: border-box; margin: 0px; padding: 5px 0px; font-family: Arial, Tahoma;"><span style="box-sizing: border-box;color: black; font-size: 16px;">Hotline :&nbsp;</span><span style="color: rgb(237, 28, 36); font-weight: bold; font-size: 15px;">0918648419 - 0936211210</span></p>
                                        <hr>
                                        <div class="quick-add-to-cart">
                                            @if(isset(Auth::user()->name) && $product->unit>0)
                                                @php
                                                    $slug = str_slug($product->name);
                                                @endphp
                                                <a href="{{route('muangay',[$slug,$product->id])}}"  title="Add to cart"><button class="single_add_to_cart_button" >Mua Ngay</button></a>
                                            @elseif(isset(Auth::user()->name) && $product->unit == 0)
                                                <button class="single_add_to_cart_button" >Hết Hàng</button>
                                            @else
                                                <a href="{{route('login_path_user')}}"><button class="single_add_to_cart_button">Mua Ngay</button></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-info end -->
                            </div>
                            <!-- single-product-tab -->
                            <div class="row">
                                <div class="col-md-8">
                                    <!-- hr -->
                                    <hr>
                                    <div class="single-product-tab">
                                        <ul class="reviews-tab mb-20">
                                            <li  class="active"><a href="#description" data-toggle="tab">Thông tin sản phẩm</a></li>
                                            <li ><a href="#information" data-toggle="tab">Hướng dẫn</a></li>
                                            <li ><a href="#reviews" data-toggle="tab">Đánh giá khách hàng</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="description" style="color: black !important;">
                                                {!! $product->description !!}
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="information">
                                                <div class="promo-title" style="font-size: 14px;line-height: 20px;font-weight: bold;margin-bottom: 15px;"><h3 style="font-size: 14px;line-height: 20px;display: inline-block; padding-bottom: 5px;border-bottom: 2px solid #d30102;">Hướng dẫn tập luyện</h3></div>
                                                @if($product->video != "" )
                                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$product->video}}" frameborder="0" allowfullscreen></iframe>
                                                    </iframe>
                                                @endif
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="reviews">
                                                <!-- reviews-tab-desc -->
                                                <div class="reviews-tab-desc">
                                                    <!-- single comments -->
                                                    <div class="post-comments mb-60" style="margin-left: 2%">

                                                        <!-- single-comments -->

                                                        @if(count($comments_parent)>0)
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
                                                    <div class="leave-comment">
                                                        <!-- Rating Stars Box -->
                                                        @if($haha ==true)
                                                            <h4 class="blog-section-title border-left mb-30">Đánh giá chất lượng sản phẩm</h4>
                                                            @if($start=="")
                                                                <div class='rating-stars text-center'>
                                                                    <ul id='stars'>
                                                                        <li class='star' title='Poor' data-value='1'>
                                                                            <i class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                        <li class='star' title='Fair' data-value='2'>
                                                                            <i class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                        <li class='star' title='Good' data-value='3'>
                                                                            <i class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                        <li class='star' title='Excellent' data-value='4'>
                                                                            <i class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                        <li class='star' title='WOW!!!' data-value='5'>
                                                                            <i class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            @elseif($start ==1)
                                                                <div class='rating-stars text-center'>
                                                                    <ul>
                                                                        <li class='star' title='Poor'>
                                                                            <i style="color: yellow" class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                        <li class='star' title='Fair' >
                                                                            <i class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                        <li class='star' title='Good'>
                                                                            <i class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                        <li class='star' title='Excellent' >
                                                                            <i class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                        <li class='star' title='WOW!!!' >
                                                                            <i class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            @elseif($start==2)
                                                                <div class='rating-stars text-center'>
                                                                    <ul>
                                                                        <li class='star' title='Poor'>
                                                                            <i style="color: yellow" class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                        <li class='star' title='Fair' >
                                                                            <i style="color: yellow" class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                        <li class='star' title='Good'>
                                                                            <i class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                        <li class='star' title='Excellent' >
                                                                            <i class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                        <li class='star' title='WOW!!!' >
                                                                            <i class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            @elseif($start==3)
                                                                <div class='rating-stars text-center'>
                                                                    <ul>
                                                                        <li class='star' title='Poor'>
                                                                            <i style="color: yellow" class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                        <li class='star' title='Fair' >
                                                                            <i style="color: yellow" class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                        <li class='star' title='Good'>
                                                                            <i style="color: yellow" class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                        <li class='star' title='Excellent' >
                                                                            <i class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                        <li class='star' title='WOW!!!' >
                                                                            <i class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            @elseif($start==4)
                                                                <div class='rating-stars text-center'>
                                                                    <ul>
                                                                        <li class='star' title='Poor'>
                                                                            <i style="color: yellow" class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                        <li class='star' title='Fair' >
                                                                            <i style="color: yellow" class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                        <li class='star' title='Good'>
                                                                            <i style="color: yellow" class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                        <li class='star' title='Excellent' >
                                                                            <i style="color: yellow" class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                        <li class='star' title='WOW!!!' >
                                                                            <i class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            @else
                                                                <div class='rating-stars text-center'>
                                                                    <ul>
                                                                        <li class='star' title='Poor'>
                                                                            <i style="color: yellow" class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                        <li class='star' title='Fair' >
                                                                            <i style="color: yellow" class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                        <li class='star' title='Good'>
                                                                            <i style="color: yellow" class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                        <li class='star' title='Excellent' >
                                                                            <i style="color: yellow" class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                        <li class='star' title='WOW!!!' >
                                                                            <i style="color: yellow" class='fa fa-star fa-fw'></i>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                            @endif
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
                                        </div>
                                    </div>
                                    <!--  hr -->
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <!-- single-product-area end -->
                        <div class="related-product-area">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section-title text-left mb-40">
                                        <h2 class="uppercase">sản phẩm liên quan</h2>
                                        <h6></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="featured-product">
                                <div class="row active-featured-product slick-arrow-2">
                                    <!-- product-item start -->
                                @foreach($product_defirents as $product_defirent)
                                    <!-- product-item start -->
                                        <div class="col-xs-12">
                                            <div class="product-item-giam">
                                                @if($product_defirent->promotion_price != 0)
                                                    <div class="shopee-badge--promotion">
                                                        <div class="price-giam">
                                                            @php
                                                                $giacu= $product_defirent->unit_price;
                                                            $giamoi = $product_defirent->promotion_price;

                                                            $phantram = (($giacu-$giamoi)/$giacu)*100;
                                                            $gia = ceil($phantram);
                                                            @endphp
                                                            <span>-{{$gia}}%</span>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($product_defirent->unit == 0)
                                                    <div class="shopee-badge--promotion2">
                                                        <div class="price-giam2">
                                                            <span>Hết hàng</span>
                                                        </div>
                                                    </div>
                                                @endif
                                                @php
                                                    $str =str_slug($product_defirent->name);
                                                @endphp
                                                <div class="product-img">
                                                    <a href="{{route('singleproduct',[$str,$product_defirent->id])}}">

                                                        <img src="../public/images/{{$product_defirent->hinhanh}}" alt=""/>
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <h6 class="product-title">
                                                        <a href="{{route('singleproduct',[$str,$product_defirent->id])}}">{{$product_defirent->name}}</a>
                                                    </h6>
                                                    @php
                                                        $rating = $product_defirent->rating($product_defirent->id);
                                                    @endphp
                                                    @include('thethao.saosanphammoi')
                                                    @if($product_defirent->promotion_price == 0)
                                                        <h3 class="pro-price">
                                                            {{number_format($product_defirent->unit_price)}}<span style="margin-left: 2px">đ</span></h3>
                                                    @else
                                                        <h3 class="pro-price">{{number_format($product_defirent->promotion_price)}} <span style="margin-left: 2px">đ</span></h3>
                                                    @endif
                                                    <ul class="action-button">
                                                        <li>
                                                        @if(isset(Auth::user()->name))
                                                            @if($product_defirent->like($product_defirent->id,Auth::user()->id))
                                                                <li id="yeuthichgym-{{$product_defirent->id}}">
                                                                    <a style="background-color: #ff7f00" href="javascript:void(0)" onclick="return yeuthichgym({{$product_defirent->id}},1)" title=" Bỏ yêu thích"><i style="color:white;" class="zmdi zmdi-favorite"></i></a>
                                                                </li>
                                                            @else
                                                                <li id="yeuthichgym-{{$product_defirent->id}}">
                                                                    <a href="javascript:void(0)"  onclick="return yeuthichgym({{$product_defirent->id}},0)" title="Yêu thích"><i class="zmdi zmdi-favorite"></i></a>
                                                                </li>
                                                            @endif
                                                        @else
                                                            <li id="yeuthichgym-{{$product_defirent->id}}">
                                                                <a href="{{route('login_path_user')}}" title="Yêu thích" ><i class="zmdi zmdi-favorite"></i></a>
                                                            </li>
                                                            @endif
                                                            </li>
                                                            <li>
                                                                <a href="#" data-toggle="modal"  data-target="#selling-{{$product_defirent->id}}" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                            </li>
                                                            <li>
                                                                @if(isset(Auth::user()->name)&& $product_defirent->unit > 0)
                                                                    <a href="javascript:void(0)" class="add-to-cart" onclick="return addcart({{$product_defirent->id}})" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                                @elseif($product_defirent->unit == 0)
                                                                    <a href="javascript:void(0)" class="error-zerro"  title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                                @else
                                                                    <a href="{{route('login_path_user')}}"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                                @endif
                                                            </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product-item end -->
                                    @endforeach
                                </div>
                                @foreach($product_defirents as $product_new )
                                    <div class="modal fade" id="selling-{{$product_new->id}}" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="margin-top: 89px">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="modal-product clearfix">
                                                        <div class="product-images">
                                                            <div class="main-image images">
                                                                <img alt="" src="../public/images/{{$product_new->hinhanh}}">
                                                            </div>
                                                        </div><!-- .product-images -->

                                                        <div class="product-info">
                                                            <h1 style="font-family: 'Raleway', sans-serif;">{{$product_new->name}}</h1>
                                                            <div class="price-box-3">
                                                                <div class="s-price-box">
                                                                    @if($product_new->promotion_price!=0)
                                                                        <span class="new-price"><h3 style="color: red">{{number_format($product_new->promotion_price)}}<span style="margin-left: 2px">đ</span></h3></span>
                                                                        <span class="old-price"><h3 style="color: red">{{number_format($product_new->unit_price)}}<span style="margin-left: 2px">đ</span></h3></span>
                                                                    @else
                                                                        <span class="new-price"><h3 style="color: red">{{number_format($product_new->unit_price)}}<span style="margin-left: 2px">đ</span></h3></span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="quick-desc">
                                                                <p style="margin-top: 10px;font-size: 15px">Xuất xứ : {{$product_new->trademark}}</p>
                                                                <p style="font-size: 15pxs">Bảo hành : {{$product_new->guarantee}}</p>
                                                                <a href="{{route('singleproduct',[str_slug($product_new->name),$product_new->id])}}" class="see-all">Chi tiết sản phẩm</a>
                                                            </div>

                                                            <div class="quick-add-to-cart">
                                                                @if(isset(Auth::user()->name) && $product_new->unit>0)
                                                                    @php
                                                                        $slug = str_slug($product_new->name);
                                                                    @endphp
                                                                    <a href="{{route('muangay',[$slug,$product_new->id])}}"  title="Add to cart"><button class="single_add_to_cart_button" >Mua Ngay</button></a>
                                                                @elseif(isset(Auth::user()->name) && $product_new->unit == 0)
                                                                    <button class="single_add_to_cart_button" >Hết Hàng</button>
                                                                @else
                                                                    <a href="{{route('login_path_user')}}"><button class="single_add_to_cart_button">Mua Ngay</button></a>
                                                                @endif
                                                            </div>

                                                        </div><!-- .product-info -->
                                                    </div><!-- .modal-product -->
                                                </div><!-- .modal-body -->
                                            </div><!-- .modal-content -->
                                        </div><!-- .modal-dialog -->
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SHOP SECTION END -->

    </section>
    <!-- START FOOTER AREA -->
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
                bid = {{$product->id}};
                $.ajax({
                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    },
                    url: "{{route('binh-luan-product-1')}}",
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
            cid = {{$product->id}};
            $.ajax({
                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                },
                url: "{{route('binh-luan-product-2')}}",
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
<script type="text/javascript">
    $(document).ready(function(){

        /* 1. Visualizing things on Hover - See next part for action on click */
        $('#stars li').on('mouseover', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

            // Now highlight all the stars that's not after the current hovered star
            $(this).parent().children('li.star').each(function(e){
                if (e < onStar) {
                    $(this).addClass('hover');
                }
                else {
                    $(this).removeClass('hover');
                }
            });

        }).on('mouseout', function(){
            $(this).parent().children('li.star').each(function(e){
                $(this).removeClass('hover');
            });
        });


        /* 2. Action to perform on click */
        $('#stars li').on('click', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently selected
            var stars = $(this).parent().children('li.star');

            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('selected');
            }

            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass('selected');
            }

            // JUST RESPONSE (Not needed)
            var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
            var msg = ratingValue;
            responseMessage(msg);

        });


    });
    function responseMessage(msg) {
        $('.success-box').fadeIn(200);
        $('.success-box div.text-message').html("<span>" + msg + "</span>");
        hi = {{$hihi}};
        if (hi==2){
            alert('Bạn vui lòng đăng nhập để đánh giá.')
        }else {
            l = msg;
            bid = {{$product->id}};
            $.ajax({
                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                },
                url: "{{route('danh-gia-sao')}}",
                type: 'POST',  // POST or GET
                data: {
                    mess: l,
                    bid: bid

                },
                success: function (data) { // dữ liệu lấy qua biến data
                    alert(data);
                }
            })
        }
        return false;
    }
</script>
<script type="text/javascript">

    function addlike(id,trangthai){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('themyeuthich')}}",
            type: 'POST',  // POST or GET
            cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
            data: {
                aId:id,
                aTrangthai:trangthai,
            },
            success: function(data){ // dữ liệu lấy qua biến data
                $('#yeuthich-'+id).html(data);
            },

            error: function (){
                alert('Có lỗi xảy ra');
            }
        });
        return false;
    }
</script>
<script type="text/javascript">

    function yeuthichgym(id,trangthai){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('yeuthichgym')}}",
            type: 'POST',  // POST or GET
            cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
            data: {
                aId:id,
                aTrangthai:trangthai,
            },
            success: function(data){ // dữ liệu lấy qua biến data
                $('#yeuthichgym-'+id).html(data);
            },

            error: function (){
                alert('Có lỗi xảy ra');
            }
        });
        return false;
    }
</script>
</body>
</html>
