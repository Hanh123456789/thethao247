@extends('templates.thethao.master')
@section('main')
@section('title','Trang chủ')
<!-- START SLIDER AREA -->
<div class="slider-area bg-3 bg-opacity-black-60 ptb-150 mb-80" id="setion1" >
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top: 4%">
                <div class="slider-desc-3 slider-desc-4  text-center">
                    <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                        <h1 class="slider2-title-2 cd-headline clip is-full-width">
                            <span class="cd-words-wrapper">
                                <b class="is-visible">Dụng Cụ Thể Thao</b>
                                 <b>Món Quà Sức Khỏe</b>
                                 <b>Giá Rẻ - Tập Cực Khỏe</b>                   
                            </span>
                        </h1>
                    </div>      
                </div>
            </div>
          <section id="section07" class="demo">
            <button class="uk-icon-angle-down"><span></span><span></span><span></span>Xem thêm</button>
          </section>
        </div>
    </div>
</div>

<div id="section2">
</div>
</div>
<section  class="page-wrapper" style="top: 50px">

    <!-- UP COMMING PRODUCT SECTION START -->

    <!-- UP COMMING PRODUCT SECTION END -->
    <!-- FEATURED PRODUCT SECTION START -->
    <div  class="featured-product-section mb-50">
       <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-left mb-40">
                        <h2 class="uppercase">Sản Phẩm Bán Chạy</h2>
                        <h6></h6>
                    </div>
                </div>
            </div>
            <div class="featured-product">
                <div class="row active-featured-product slick-arrow-2">
                    @foreach($product_selling as $products )
                    <!-- product-item start -->
                    <div class="col-xs-12">
                        <div class="product-item-giam">
                            @if($products->product->promotion_price != 0)
                            <div class="shopee-badge--promotion">
                                <div class="price-giam">
                                    @php
                                        $giacu= $products->product->unit_price;
                                        $giamoi = $products->product->promotion_price;
                                    $phantram = (($giacu-$giamoi)/$giacu)*100;
                                    $gia = ceil($phantram);
                                    @endphp
                                    <span>-{{$gia}}%</span>
                                </div>
                            </div>
                            @endif
                            @if($products->product->unit == 0)
                                <div class="shopee-badge--promotion2">
                                    <div class="price-giam2">
                                        <span>Hết hàng</span>
                                    </div>
                                </div>
                            @endif
                              @php
                                $str =str_slug($products->product->name);
                              @endphp
                            <div class="product-img">
                                <a href="{{route('singleproduct',[$str,$products->product->id])}}">

                                    <img src="../public/images/{{$products->product->hinhanh}}" alt=""/>
                                </a>
                            </div>
                            <div class="product-info">
                                <h6 class="product-title">
                                    <a href="{{route('singleproduct',[$str,$products->product->id])}}">{{$products->product->name}}</a>
                                </h6>
                                @include('thethao.saobanchay')
                                @if($products->product->promotion_price == 0)
                                <h3 class="pro-price">
                                    {{number_format($products->product->unit_price)}}<span style="margin-left: 2px">đ</span></h3>
                                @else
                                    <h3 class="pro-price">{{number_format($products->product->promotion_price)}} <span style="margin-left: 2px">đ</span></h3>
                                @endif
                                <ul class="action-button">


                                    @if(isset(Auth::user()->name))
                                      @if($products->product->like($products->product->id,Auth::user()->id))
                                      <li id="yeuthich-{{$products->product->id}}">
                                        <a style="background-color: #ff7f00" href="javascript:void(0)" onclick="return addlike({{$products->product->id}},1)" title=" Bỏ yêu thích"><i style="color:white;" class="zmdi zmdi-favorite"></i></a>
                                      </li>
                                        @else
                                      <li id="yeuthich-{{$products->product->id}}">
                                        <a href="javascript:void(0)"  onclick="return addlike({{$products->product->id}},0)" title="Yêu thích"><i class="zmdi zmdi-favorite"></i></a>
                                      </li>
                                       @endif
                                       @else
                                        <li id="yeuthich-{{$products->product->id}}">
                                      <a href="{{route('login_path_user')}}" title="Yêu thích" ><i class="zmdi zmdi-favorite"></i></a>
                                      </li>
                                        @endif
                                  </li>
                                    <li>
                                        <a href="#" data-toggle="modal"  data-target="#selling-{{$products->product->id}}" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                    </li>
                                    <li>
                                        @if(isset(Auth::user()->name)&& $products->product->unit != 0)
                                        <a href="javascript:void(0)" class="add-to-cart" onclick="return addcart({{$products->product->id}})" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                        @elseif($products->product->unit == 0)
                                            <a href="javascript:void(0)" class="error-zerro"  title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                        @else
                                        <a href="{{route('login_path_user')}}"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>
                @foreach($product_selling as $product_new )
                    <div class="modal fade" id="selling-{{$product_new->product->id}}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="margin-top: 89px">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-product clearfix">
                                        <div class="product-images">
                                            <div class="main-image images">
                                                <img alt="" src="../public/images/{{$product_new->product->hinhanh}}">
                                            </div>
                                        </div><!-- .product-images -->

                                        <div class="product-info">
                                            <h1 style="font-family: 'Raleway', sans-serif;">{{$product_new->product->name}}</h1>
                                            <div class="price-box-3">
                                                <div class="s-price-box">
                                                    @if($product_new->product->promotion_price!=0)
                                                        <span class="new-price"><h3 style="color: red">{{number_format($product_new->product->promotion_price)}}<span style="margin-left: 2px">đ</span></h3></span>
                                                        <span class="old-price"><h3 style="color: red">{{number_format($product_new->product->unit_price)}}<span style="margin-left: 2px">đ</span></h3></span>
                                                    @else
                                                        <span class="new-price"><h3 style="color: red">{{number_format($product_new->product->unit_price)}}<span style="margin-left: 2px">đ</span></h3></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="quick-desc">
                                                <p style="margin-top: 10px;font-size: 15px">Xuất xứ : {{$product_new->product->trademark}}</p>
                                                <p style="font-size: 15pxs">Bảo hành : {{$product_new->product->guarantee}}</p>
                                                <a href="{{route('singleproduct',[str_slug($product_new->product->name),$product_new->product->id])}}" class="see-all">Chi tiết sản phẩm</a>
                                            </div>

                                            <div class="quick-add-to-cart">

                                                @if(isset(Auth::user()->name) && $product_new->product->unit>0)
                                                    @php
                                                        $slug = str_slug($product_new->product->name);
                                                    @endphp
                                                    <a href="{{route('muangay',[$slug,$product_new->product->id])}}" class="add-to-cart"  title="Add to cart"><button class="single_add_to_cart_button" >Mua Ngay</button></a>
                                                @elseif(isset(Auth::user()->name) && $product_new->product->unit == 0)
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
    <!-- FEATURED PRODUCT SECTION END -->
    <!-- FEATURED PRODUCT SECTION START -->
    <div class="featured-product-section mb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-left mb-40">
                        <h2 class="uppercase">Sản Phẩm Mới</h2>
                        <h6></h6>
                    </div>
                </div>
            </div>
            <div class="featured-product">
                <div class="row autoplay active-featured-product slick-arrow-2">
                @foreach($products_news as $product_new )
                    <!-- product-item start -->
                        <div class="col-xs-12">
                            <div class="product-item-giam">
                                @if($product_new->promotion_price != 0)
                                    <div class="shopee-badge--promotion">
                                        <div class="price-giam">
                                            @php
                                                $giacu= $product_new->unit_price;
                                            $giamoi = $product_new->promotion_price;

                                            $phantram = (($giacu-$giamoi)/$giacu)*100;
                                            $gia = ceil($phantram);
                                            @endphp
                                            <span>-{{$gia}}%</span>
                                        </div>
                                    </div>
                                @endif
                                @if($product_new->unit == 0)
                                    <div class="shopee-badge--promotion2">
                                        <div class="price-giam2">
                                            <span>Hết hàng</span>
                                        </div>
                                    </div>
                                @endif
                                  @php
                                    $str =str_slug($product_new->name);
                                  @endphp
                                <div class="product-img">
                                    <a href="{{route('singleproduct',[$str,$product_new->id])}}">

                                        <img src="../public/images/{{$product_new->hinhanh}}" alt=""/>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <h6 class="product-title">
                                        <a href="{{route('singleproduct',[$str,$product_new->id])}}">{{$product_new->name}}</a>
                                    </h6>
                                  @php
                                    $rating = $product_new->rating($product_new->id);
                                  @endphp
                                    @include('thethao.saosanphammoi')
                                    @if($product_new->promotion_price == 0)
                                        <h3 class="pro-price">
                                            {{number_format($product_new->unit_price)}}<span style="margin-left: 2px">đ</span></h3>
                                    @else
                                        <h3 class="pro-price">{{number_format($product_new->promotion_price)}} <span style="margin-left: 2px">đ</span></h3>
                                    @endif
                               <ul class="action-button">
                                   <li>
                                        @if(isset(Auth::user()->name))
                                            @if($product_new->like($product_new->id,Auth::user()->id))
                                                <li id="yeuthichnew-{{$product_new->id}}">
                                                    <a style="background-color: #ff7f00" href="javascript:void(0)" onclick="return addlikenew({{$product_new->id}},1)" title=" Bỏ yêu thích"><i style="color:white;" class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                            @else
                                                <li id="yeuthichnew-{{$product_new->id}}">
                                                    <a href="javascript:void(0)"  onclick="return addlikenew({{$product_new->id}},0)" title="Yêu thích"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                            @endif
                                        @else
                                            <li id="yeuthichnew-{{$product_new->id}}">
                                                <a href="{{route('login_path_user')}}" title="Yêu thích" ><i class="zmdi zmdi-favorite"></i></a>
                                            </li>
                                       @endif
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="modal"  data-target="#newproduct-{{$product_new->id}}" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                            </li>
                                            <li>
                                                @if(isset(Auth::user()->name)&& $product_new->unit > 0)
                                                    <a href="javascript:void(0)" class="add-to-cart" onclick="return addcart({{$product_new->id}})" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                @elseif($product_new->unit == 0)
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
                @foreach($products_news as $product_new )
                <div class="modal fade" id="newproduct-{{$product_new->id}}" tabindex="-1" role="dialog">
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
                                                    <a href="{{route('muangay',[$slug,$product_new->id])}}" class="add-to-cart"  title="Add to cart"><button class="single_add_to_cart_button" >Mua Ngay</button></a>
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
    <!-- FEATURED PRODUCT SECTION END -->



    <!-- PRODUCT TAB SECTION START -->
    <div class="product-tab-section mb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="section-title text-left mb-40">
                        <h2 class="uppercase">Danh sách các sản phẩm khác</h2>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="pro-tab-menu text-right">
                        <!-- Nav tabs -->
                        <ul class="" >
                            <li class="active"><a href="#new-arrival" data-toggle="tab" class="tab-text">Máy Chạy Bộ Điện</a></li>
                            <li><a href="#special-offer" data-toggle="tab" class="tab-text">Dụng Cụ Tập GYM</a></li>
                            <li><a href="#best-seller"  data-toggle="tab" class="tab-text">Xe Đạp</a></li>
                            <li><a href="#popular-product"  data-toggle="tab" class="tab-text">Bóng đá</a></li>
                        </ul>
                    </div>                       
                </div>
            </div>
            <div class="product-tab">
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- popular-product start -->
                    <div class="tab-pane" id="popular-product">
                        <div class="row">
                        @foreach($product_bongdas as $product_bongda )
                          <!-- product-item start -->
                            <div class="col-md-3 col-sm-4 col-xs-12">
                              <div class="product-item-giam" style="margin-bottom: 40px">
                                @if($product_bongda ->promotion_price != 0)
                                  <div class="shopee-badge--promotion">
                                    <div class="price-giam">
                                      @php
                                        $giacu= $product_bongda ->unit_price;
                                    $giamoi = $product_bongda ->promotion_price;

                                    $phantram = (($giacu-$giamoi)/$giacu)*100;
                                    $gia = ceil($phantram);
                                      @endphp
                                      <span>-{{$gia}}%</span>
                                    </div>
                                  </div>
                                @endif
                                @if($product_bongda ->unit == 0)
                                  <div class="shopee-badge--promotion2">
                                    <div class="price-giam2">
                                      <span>Hết hàng</span>
                                    </div>
                                  </div>
                                @endif
                                  @php
                                    $str =str_slug($product_bongda ->name);
                                  @endphp
                                <div class="product-img">
                                  <a href="{{route('singleproduct',[$str,$product_bongda->id])}}">

                                    <img src="../public/images/{{$product_bongda ->hinhanh}}" alt=""/>
                                  </a>
                                </div>
                                <div class="product-info">
                                  <h6 class="product-title">
                                    <a href="{{route('singleproduct',[$str,$product_bongda->id])}}">{{$product_bongda->name}}</a>
                                  </h6>
                                  @php
                                    $rating = $product_bongda->rating($product_bongda->id);
                                  @endphp
                                  @include('thethao.saosanphammoi')
                                  @if($product_bongda->promotion_price == 0)
                                    <h3 class="pro-price">
                                      {{number_format($product_bongda->unit_price)}}<span style="margin-left: 2px">đ</span></h3>
                                  @else
                                    <h3 class="pro-price">{{number_format($product_bongda->promotion_price)}} <span style="margin-left: 2px">đ</span></h3>
                                  @endif
                                  <ul class="action-button">
                                    <li>
                                    @if(isset(Auth::user()->name))
                                      @if($product_bongda->like($product_bongda->id,Auth::user()->id))
                                        <li id="yeuthichbongda-{{$product_bongda->id}}">
                                          <a style="background-color: #ff7f00" href="javascript:void(0)" onclick="return yeuthichbongda({{$product_bongda->id}},1)" title=" Bỏ yêu thích"><i style="color:white;" class="zmdi zmdi-favorite"></i></a>
                                        </li>
                                      @else
                                        <li id="yeuthichbongda-{{$product_bongda->id}}">
                                          <a href="javascript:void(0)"  onclick="return yeuthichbongda({{$product_bongda->id}},0)" title="Yêu thích"><i class="zmdi zmdi-favorite"></i></a>
                                        </li>
                                      @endif
                                    @else
                                      <li id="yeuthichbongda-{{$product_bongda->id}}">
                                        <a href="{{route('login_path_user')}}" title="Yêu thích" ><i class="zmdi zmdi-favorite"></i></a>
                                      </li>
                                      @endif
                                      </li>
                                      <li>
                                        <a href="#" data-toggle="modal"  data-target="#product_bongda-{{$product_bongda->id}}" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                      </li>
                                      <li>
                                        @if(isset(Auth::user()->name)&& $product_bongda->unit > 0)
                                          <a href="javascript:void(0)" class="add-to-cart" onclick="return addcart({{$product_bongda->id}})" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                        @elseif($product_bongda->unit == 0)
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
                      @foreach($product_bongdas as $product_bongda)
                        <div class="modal fade" id="product_bongda-{{$product_bongda->id}}" tabindex="-1" role="dialog">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content" style="margin-top: 89px">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                                <div class="modal-product clearfix">
                                  <div class="product-images">
                                    <div class="main-image images">
                                      <img alt="" src="../public/images/{{$product_bongda->hinhanh}}">
                                    </div>
                                  </div><!-- .product-images -->

                                  <div class="product-info">
                                    <h1 style="font-family: 'Raleway', sans-serif;">{{$product_bongda->name}}</h1>
                                    <div class="price-box-3">
                                      <div class="s-price-box">
                                        @if($product_bongda->promotion_price!=0)
                                          <span class="new-price"><h3 style="color: red">{{number_format($product_bongda->promotion_price)}}<span style="margin-left: 2px">đ</span></h3></span>
                                          <span class="old-price"><h3 style="color: red">{{number_format($product_bongda->unit_price)}}<span style="margin-left: 2px">đ</span></h3></span>
                                        @else
                                          <span class="new-price"><h3 style="color: red">{{number_format($product_bongda->unit_price)}}<span style="margin-left: 2px">đ</span></h3></span>
                                        @endif
                                      </div>
                                    </div>
                                    <div class="quick-desc">
                                      <p style="margin-top: 10px;font-size: 15px">Xuất xứ : {{$product_bongda->trademark}}</p>
                                      <p style="font-size: 15pxs">Bảo hành : {{$product_bongda->guarantee}}</p>
                                      <a href="{{route('singleproduct',[str_slug($product_bongda->name),$product_bongda->id])}}" class="see-all">Chi tiết sản phẩm</a>
                                    </div>

                                    <div class="quick-add-to-cart">

                                      @if(isset(Auth::user()->name) && $product_bongda->unit>0)
                                        @php
                                          $slug = str_slug($product_bongda->name);
                                        @endphp
                                        <a href="{{route('muangay',[$slug,$product_bongda->id])}}" class="add-to-cart"  title="Add to cart"><button class="single_add_to_cart_button" >Mua Ngay</button></a>
                                      @elseif(isset(Auth::user()->name) && $product_bongda->unit == 0)
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
                      <a href="{{route('categoriproduct',["qua-bong-da",58])}}" id="loadMore">Xem thêm</a>
                    </div>
                    <!-- popular-product end -->
                    <!-- new-arrival start -->
                    <div class="tab-pane active" id="new-arrival">
                      <div class="row">
                      @foreach($product_maychaybodiens as $product_maychay )
                        <!-- product-item start -->
                          <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="product-item-giam" style="margin-bottom: 40px">
                              @if($product_maychay ->promotion_price != 0)
                                <div class="shopee-badge--promotion">
                                  <div class="price-giam">
                                    @php
                                      $giacu= $product_maychay ->unit_price;
                                  $giamoi = $product_maychay ->promotion_price;

                                  $phantram = (($giacu-$giamoi)/$giacu)*100;
                                  $gia = ceil($phantram);
                                    @endphp
                                    <span>-{{$gia}}%</span>
                                  </div>
                                </div>
                              @endif
                              @if($product_maychay ->unit == 0)
                                <div class="shopee-badge--promotion2">
                                  <div class="price-giam2">
                                    <span>Hết hàng</span>
                                  </div>
                                </div>
                              @endif
                                @php
                                  $str =str_slug($product_maychay ->name);
                                @endphp
                              <div class="product-img">
                                <a href="{{route('singleproduct',[$str,$product_maychay ->id])}}">

                                  <img src="../public/images/{{$product_maychay ->hinhanh}}" alt=""/>
                                </a>
                              </div>
                              <div class="product-info">
                                <h6 class="product-title">
                                  <a href="{{route('singleproduct',[$str,$product_maychay ->id])}}">{{$product_maychay ->name}}</a>
                                </h6>
                                @php
                                  $rating = $product_maychay->rating($product_maychay->id);
                                @endphp
                                @include('thethao.saosanphammoi')
                                @if($product_maychay->promotion_price == 0)
                                  <h3 class="pro-price">
                                    {{number_format($product_maychay->unit_price)}}<span style="margin-left: 2px">đ</span></h3>
                                @else
                                  <h3 class="pro-price">{{number_format($product_maychay->promotion_price)}} <span style="margin-left: 2px">đ</span></h3>
                                @endif
                                <ul class="action-button">
                                  <li>
                                  @if(isset(Auth::user()->name))
                                    @if($product_maychay->like($product_maychay->id,Auth::user()->id))
                                      <li id="yeuthichmaychaybo-{{$product_maychay->id}}">
                                        <a style="background-color: #ff7f00" href="javascript:void(0)" onclick="return yeuthichmaychaybo({{$product_maychay->id}},1)" title=" Bỏ yêu thích"><i style="color:white;" class="zmdi zmdi-favorite"></i></a>
                                      </li>
                                    @else
                                      <li id="yeuthichmaychaybo-{{$product_maychay->id}}">
                                        <a href="javascript:void(0)"  onclick="return yeuthichmaychaybo({{$product_maychay->id}},0)" title="Yêu thích"><i class="zmdi zmdi-favorite"></i></a>
                                      </li>
                                    @endif
                                  @else
                                    <li id="yeuthichmaychaybo-{{$product_maychay->id}}">
                                      <a href="{{route('login_path_user')}}" title="Yêu thích" ><i class="zmdi zmdi-favorite"></i></a>
                                    </li>
                                    @endif
                                    </li>
                                    <li>
                                      <a href="#" data-toggle="modal"  data-target="#maychaybo-{{$product_maychay->id}}" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                    </li>
                                    <li>
                                      @if(isset(Auth::user()->name)&& $product_maychay->unit > 0)
                                        <a href="javascript:void(0)" class="add-to-cart" onclick="return addcart({{$product_maychay->id}})" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                      @elseif($product_maychay->unit == 0)
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
                      @foreach($product_maychaybodiens as $product_maychay)
                        <div class="modal fade" id="maychaybo-{{$product_maychay->id}}" tabindex="-1" role="dialog">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content" style="margin-top: 89px">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                                <div class="modal-product clearfix">
                                  <div class="product-images">
                                    <div class="main-image images">
                                      <img alt="" src="../public/images/{{$product_maychay->hinhanh}}">
                                    </div>
                                  </div><!-- .product-images -->

                                  <div class="product-info">
                                    <h1 style="font-family: 'Raleway', sans-serif;">{{$product_maychay->name}}</h1>
                                    <div class="price-box-3">
                                      <div class="s-price-box">
                                        @if($product_maychay->promotion_price!=0)
                                          <span class="new-price"><h3 style="color: red">{{number_format($product_maychay->promotion_price)}}<span style="margin-left: 2px">đ</span></h3></span>
                                          <span class="old-price"><h3 style="color: red">{{number_format($product_maychay->unit_price)}}<span style="margin-left: 2px">đ</span></h3></span>
                                        @else
                                          <span class="new-price"><h3 style="color: red">{{number_format($product_maychay->unit_price)}}<span style="margin-left: 2px">đ</span></h3></span>
                                        @endif
                                      </div>
                                    </div>
                                    <div class="quick-desc">
                                      <p style="margin-top: 10px;font-size: 15px">Xuất xứ : {{$product_maychay->trademark}}</p>
                                      <p style="font-size: 15pxs">Bảo hành : {{$product_maychay->guarantee}}</p>
                                      <a href="{{route('singleproduct',[str_slug($product_maychay->name),$product_maychay->id])}}" class="see-all">Chi tiết sản phẩm</a>
                                    </div>

                                    <div class="quick-add-to-cart">

                                      @if(isset(Auth::user()->name) && $product_maychay->unit>0)
                                        @php
                                          $slug = str_slug($product_maychay->name);
                                        @endphp
                                        <a href="{{route('muangay',[$slug,$product_maychay->id])}}" class="add-to-cart"  title="Add to cart"><button class="single_add_to_cart_button" >Mua Ngay</button></a>
                                      @elseif(isset(Auth::user()->name) && $product_maychay->unit == 0)
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
                      <a href="{{route('categoriproduct',["may-chay-bo-dien",43])}}" id="loadMore">Xem thêm</a>
                    </div>
                    <!-- new-arrival end -->
                    <!-- best-seller start -->
                    <div class="tab-pane" id="best-seller">
                      <div class="row">
                      @foreach($product_xedaps as $product_xedap )
                        <!-- product-item start -->
                          <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="product-item-giam" style="margin-bottom: 40px">
                              @if($product_xedap ->promotion_price != 0)
                                <div class="shopee-badge--promotion">
                                  <div class="price-giam">
                                    @php
                                      $giacu= $product_xedap ->unit_price;
                                  $giamoi = $product_xedap ->promotion_price;

                                  $phantram = (($giacu-$giamoi)/$giacu)*100;
                                  $gia = ceil($phantram);
                                    @endphp
                                    <span>-{{$gia}}%</span>
                                  </div>
                                </div>
                              @endif
                              @if($product_xedap ->unit == 0)
                                <div class="shopee-badge--promotion2">
                                  <div class="price-giam2">
                                    <span>Hết hàng</span>
                                  </div>
                                </div>
                              @endif
                              <div class="product-img">
                                @php
                                  $str =str_slug($product_xedap ->name);
                                @endphp
                                <a href="{{route('singleproduct',[$str,$product_xedap ->id])}}">

                                  <img src="../public/images/{{$product_xedap->hinhanh}}" alt=""/>
                                </a>
                              </div>
                              <div class="product-info">
                                <h6 class="product-title">
                                  <a href="{{route('singleproduct',[$str,$product_xedap ->id])}}">{{$product_xedap ->name}}</a>
                                </h6>
                                @php
                                  $rating = $product_xedap->rating($product_xedap->id);
                                @endphp
                                @include('thethao.saosanphammoi')
                                @if($product_xedap->promotion_price == 0)
                                  <h3 class="pro-price">
                                    {{number_format($product_xedap->unit_price)}}<span style="margin-left: 2px">đ</span></h3>
                                @else
                                  <h3 class="pro-price">{{number_format($product_xedap->promotion_price)}} <span style="margin-left: 2px">đ</span></h3>
                                @endif
                                <ul class="action-button">
                                  <li>
                                  @if(isset(Auth::user()->name))
                                    @if($product_xedap->like($product_xedap->id,Auth::user()->id))
                                      <li id="yeuthichxedap-{{$product_xedap->id}}">
                                        <a style="background-color: #ff7f00" href="javascript:void(0)" onclick="return yeuthichxedap({{$product_xedap->id}},1)" title=" Bỏ yêu thích"><i style="color:white;" class="zmdi zmdi-favorite"></i></a>
                                      </li>
                                    @else
                                      <li id="yeuthichxedap-{{$product_xedap->id}}">
                                        <a href="javascript:void(0)"  onclick="return yeuthichxedap({{$product_xedap->id}},0)" title="Yêu thích"><i class="zmdi zmdi-favorite"></i></a>
                                      </li>
                                    @endif
                                  @else
                                    <li id="yeuthichxedap-{{$product_xedap->id}}">
                                      <a href="{{route('login_path_user')}}" title="Yêu thích" ><i class="zmdi zmdi-favorite"></i></a>
                                    </li>
                                    @endif
                                    </li>
                                    <li>
                                      <a href="#" data-toggle="modal"  data-target="#product_xedap-{{$product_xedap->id}}" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                    </li>
                                    <li>
                                      @if(isset(Auth::user()->name)&& $product_xedap->unit > 0)
                                        <a href="javascript:void(0)" class="add-to-cart" onclick="return addcart({{$product_xedap->id}})" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                      @elseif($product_xedap->unit == 0)
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
                      @foreach($product_xedaps as $product_xedap)
                        <div class="modal fade" id="product_xedap-{{$product_xedap->id}}" tabindex="-1" role="dialog">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content" style="margin-top: 89px">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                                <div class="modal-product clearfix">
                                  <div class="product-images">
                                    <div class="main-image images">
                                      <img alt="" src="../public/images/{{$product_xedap->hinhanh}}">
                                    </div>
                                  </div><!-- .product-images -->

                                  <div class="product-info">
                                    <h1 style="font-family: 'Raleway', sans-serif;">{{$product_xedap->name}}</h1>
                                    <div class="price-box-3">
                                      <div class="s-price-box">
                                        @if($product_xedap->promotion_price!=0)
                                          <span class="new-price"><h3 style="color: red">{{number_format($product_xedap->promotion_price)}}<span style="margin-left: 2px">đ</span></h3></span>
                                          <span class="old-price"><h3 style="color: red">{{number_format($product_xedap->unit_price)}}<span style="margin-left: 2px">đ</span></h3></span>
                                        @else
                                          <span class="new-price"><h3 style="color: red">{{number_format($product_xedap->unit_price)}}<span style="margin-left: 2px">đ</span></h3></span>
                                        @endif
                                      </div>
                                    </div>
                                    <div class="quick-desc">
                                      <p style="margin-top: 10px;font-size: 15px">Xuất xứ : {{$product_xedap->trademark}}</p>
                                      <p style="font-size: 15pxs">Bảo hành : {{$product_xedap->guarantee}}</p>
                                      <a href="{{route('singleproduct',[str_slug($product_xedap->name),$product_xedap->id])}}" class="see-all">Chi tiết sản phẩm</a>
                                    </div>

                                    <div class="quick-add-to-cart">

                                      @if(isset(Auth::user()->name) && $product_xedap->unit>0)
                                        @php
                                          $slug = str_slug($product_xedap->name);
                                        @endphp
                                        <a href="{{route('muangay',[$slug,$product_xedap->id])}}" class="add-to-cart"  title="Add to cart"><button class="single_add_to_cart_button" >Mua Ngay</button></a>
                                      @elseif(isset(Auth::user()->name) && $product_xedap->unit == 0)
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
                      <a href="{{route('categoriproduct',["xe-dap",44])}}" id="loadMore">Xem thêm</a>
                    </div>
                    <!-- best-seller end -->
                    <!-- special-offer start -->
                    <div class="tab-pane" id="special-offer">
                      <div class="row">
                      @foreach($product_tapgyms as $product_tapgym )
                        <!-- product-item start -->
                          <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="product-item-giam" style="margin-bottom: 40px">
                              @if($product_tapgym ->promotion_price != 0)
                                <div class="shopee-badge--promotion">
                                  <div class="price-giam">
                                    @php
                                      $giacu= $product_tapgym ->unit_price;
                                  $giamoi = $product_tapgym ->promotion_price;

                                  $phantram = (($giacu-$giamoi)/$giacu)*100;
                                  $gia = ceil($phantram);
                                    @endphp
                                    <span>-{{$gia}}%</span>
                                  </div>
                                </div>
                              @endif
                              @if($product_tapgym ->unit == 0)
                                <div class="shopee-badge--promotion2">
                                  <div class="price-giam2">
                                    <span>Hết hàng</span>
                                  </div>
                                </div>
                              @endif
                                @php
                                  $str =str_slug($product_tapgym ->name);
                                @endphp
                              <div class="product-img">
                                <a href="{{route('singleproduct',[$str,$product_tapgym ->id])}}">

                                  <img src="../public/images/{{$product_tapgym ->hinhanh}}" alt=""/>
                                </a>
                              </div>
                              <div class="product-info">
                                <h6 class="product-title">

                                  <a href="{{route('singleproduct',[$str,$product_tapgym ->id])}}">{{$product_tapgym ->name}}</a>
                                </h6>
                                @php
                                  $rating = $product_tapgym->rating($product_tapgym->id);
                                @endphp
                                @include('thethao.saosanphammoi')
                                @if($product_tapgym->promotion_price == 0)
                                  <h3 class="pro-price">
                                    {{number_format($product_tapgym->unit_price)}}<span style="margin-left: 2px">đ</span></h3>
                                @else
                                  <h3 class="pro-price">{{number_format($product_tapgym->promotion_price)}} <span style="margin-left: 2px">đ</span></h3>
                                @endif
                                <ul class="action-button">
                                  <li>
                                  @if(isset(Auth::user()->name))
                                    @if($product_tapgym->like($product_tapgym->id,Auth::user()->id))
                                      <li id="yeuthichgym-{{$product_tapgym->id}}">
                                        <a style="background-color: #ff7f00" href="javascript:void(0)" onclick="return yeuthichgym({{$product_tapgym->id}},1)" title=" Bỏ yêu thích"><i style="color:white;" class="zmdi zmdi-favorite"></i></a>
                                      </li>
                                    @else
                                      <li id="yeuthichgym-{{$product_tapgym->id}}">
                                        <a href="javascript:void(0)"  onclick="return yeuthichgym({{$product_tapgym->id}},0)" title="Yêu thích"><i class="zmdi zmdi-favorite"></i></a>
                                      </li>
                                    @endif
                                  @else
                                    <li id="yeuthichgym-{{$product_tapgym->id}}">
                                      <a href="{{route('login_path_user')}}" title="Yêu thích" ><i class="zmdi zmdi-favorite"></i></a>
                                    </li>
                                    @endif
                                    </li>
                                    <li>
                                      <a href="#" data-toggle="modal"  data-target="#product_tapgym-{{$product_tapgym->id}}" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                    </li>
                                    <li>
                                      @if(isset(Auth::user()->name)&& $product_tapgym->unit > 0)
                                        <a href="javascript:void(0)" class="add-to-cart" onclick="return addcart({{$product_tapgym->id}})" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                      @elseif($product_tapgym->unit == 0)
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
                      @foreach($product_tapgyms as $product_tapgym)
                        <div class="modal fade" id="product_tapgym-{{$product_tapgym->id}}" tabindex="-1" role="dialog">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content" style="margin-top: 89px">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                                <div class="modal-product clearfix">
                                  <div class="product-images">
                                    <div class="main-image images">
                                      <img alt="" src="../public/images/{{$product_tapgym->hinhanh}}">
                                    </div>
                                  </div><!-- .product-images -->

                                  <div class="product-info">
                                    <h1 style="font-family: 'Raleway', sans-serif;">{{$product_tapgym->name}}</h1>
                                    <div class="price-box-3">
                                      <div class="s-price-box">
                                        @if($product_tapgym->promotion_price!=0)
                                          <span class="new-price"><h3 style="color: red">{{number_format($product_tapgym->promotion_price)}}<span style="margin-left: 2px">đ</span></h3></span>
                                          <span class="old-price"><h3 style="color: red">{{number_format($product_tapgym->unit_price)}}<span style="margin-left: 2px">đ</span></h3></span>
                                        @else
                                          <span class="new-price"><h3 style="color: red">{{number_format($product_tapgym->unit_price)}}<span style="margin-left: 2px">đ</span></h3></span>
                                        @endif
                                      </div>
                                    </div>
                                    <div class="quick-desc">
                                      <p style="margin-top: 10px;font-size: 15px">Xuất xứ : {{$product_tapgym->trademark}}</p>
                                      <p style="font-size: 15pxs">Bảo hành : {{$product_tapgym->guarantee}}</p>
                                      <a href="{{route('singleproduct',[str_slug($product_tapgym->name),$product_tapgym->id])}}" class="see-all">Chi tiết sản phẩm</a>
                                    </div>

                                    <div class="quick-add-to-cart">

                                      @if(isset(Auth::user()->name) && $product_tapgym->unit>0)
                                        @php
                                          $slug = str_slug($product_tapgym->name);
                                        @endphp
                                        <a href="{{route('muangay',[$slug,$product_tapgym->id])}}" class="add-to-cart"  title="Add to cart"><button class="single_add_to_cart_button" >Mua Ngay</button></a>
                                      @elseif(isset(Auth::user()->name) && $product_tapgym->unit == 0)
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
                      <a href="{{route('categoriproduct',["dung-cu-tap-gym",52])}}" id="loadMore">Xem thêm</a>
                    </div>
                    <!-- special-offer end -->
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT TAB SECTION END -->

  <!-- TEAM SECTION START -->
  <div class="f-top">
    <div class="f-top-1">
      <h4>
        Cam kết</h4>
      <ul class="ls">
        <li>Sản phẩm, hàng hóa chính hãng đa dạng phong phú. </li>
        <li>Luôn luôn giá rẻ &amp; khuyến mại không ngừng. </li>
        <li>Dịch vụ chăm sóc khách hàng uy tín. </li>
      </ul>
    </div>
    <div class="f-top-2">
      <h4 style="background-color: #00a652">
        Hỗ trợ khách hàng</h4>
      <ul class="ls">
        <li><a href="{{route('chinhsachbaomat')}}" rel="nofollow">Chính sách và quy định chung</a></li>
        <li><a href="{{route('chinhsachbaohanh')}}" rel="nofollow">Chính sách bảo hành, bảo trì</a></li>
        <li><a href="{{route('chinhsachvanchuyen')}}" rel="nofollow">Chính sách giao hàng</a></li>
        <li><a href="{{route('chinhsachdoitra')}}" rel="nofollow" title="Chính sách đổi/trả hàng">Chính sách đổi - trả hàng</a></li>
        <li><a href="{{route('phuongthucthanhtoan')}}" rel="nofollow" title="Cách thức thanh toán">Cách thức thanh toán</a></li>
        <li><a href="{{route('chinhsachbaomat')}}" rel="nofollow" title="Chính sách bảo mật">Chính sách bảo mật</a></li>
        <li><a href="{{route('camketkhachhang')}}" rel="nofollow" title="Cam kết chất lượng sản phẩm được bán trên">Cam kết chất lượng</a></li>
      </ul>

    </div>
    <div class="f-top-3">
      <h4 style="background-color: #00a652">
        Thông tin công ty</h4>
      <ul class="ls">
        <li><a title="Giới thiệu công ty" href="{{route('gioithieu')}}">Giới thiệu công ty</a></li>
        <li><a title="Tuyển dụng" href="/tuyen-dung/ac3.html">Tuyển dụng</a></li>
      </ul>
      <div class="cl">
      </div>
      <div class="social">

        Kết nối với chúng tôi
        <ul class="ls">
          <li><a target="_blank" href="https://www.facebook.com/thethaotaiphat.com.vn/" rel="publisher"></a></li>
          <li><a target="_blank" href="https://twitter.com/maychaybotps" rel="publisher"></a></li>
          <li><a target="_blank" href="https://www.pinterest.com/maychaybotaiphatsport/" rel="publisher"></a></li>
          <li><a target="_blank" href="https://www.youtube.com/channel/UCKuKaT-qekq-F0cWaVXROaA" rel="publisher"></a></li>
        </ul>
      </div>
      <div class="cl">
      </div>
    </div>
    <div class="f-top-4">

      <h4 style="background-color: #00a652">Tổng đài hỗ trợ</h4>
      <p>
        <img src="/public/thethao/images/logo/holine-ban-hang.jpg" alt="Số điện thoại than phiền dịch vụ" title="Số điện thoại than phiền dịch vụ">
      </p>

    </div>
    <div class="cl">
    </div>
  </div>
  <div class="bottom-mn"></div>

  <!-- TEAM SECTION END -->
</section>
<!-- End page content -->
@stop