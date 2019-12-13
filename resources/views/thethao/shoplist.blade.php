@extends('templates.thethao.master')
@section('main')
@section('title','Danh sách sản phẩm')
    <!-- BREADCRUMBS SETCTION START -->
    <div class="breadcrumbs-section plr-200 mb-80" style="background: url('thethao/images/bg/danhsachsp.jpg');background-size: cover;height:300px;background-repeat: round;">
        <div class="overlay-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcrumbs-inner">
                            <h1 class="breadcrumbs-title" style="color: yellow;padding: 139px 0 85px !important;">Danh Sách Sản Phẩm</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS SETCTION END -->
    <div id="page-content" class="page-wrapper">

        <!-- SHOP SECTION START -->
        <div class="shop-section mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-md-push-3 col-xs-12">
                        <div class="shop-content">
                            <!-- shop-option start -->
                            <div class="shop-option box-shadow mb-30 clearfix">
                                <!-- Nav tabs -->
                                <!-- short-by -->
                                <form action="" method="get" id="form-search">
                                <div class="short-by f-left text-center">
                                    <span style="font-size: 15px;color: dimgrey;">Sắp xếp theo :</span>
                                    <select name="pricesort" id="choose-categories">
                                        <option value="" style="font-size: 13px;color: dimgrey;">Tất cả</option>
                                        <option value="giamdan"
                                                @php
                                                      if (request()->get('pricesort')=='giamdan'){
                                                              echo 'selected';
                                                      }else{
                                                      echo "";
                                                      }
                                                @endphp
                                                style="font-size: 13px;color: dimgrey;">Giá giảm dần</option>
                                        <option value="tangdan"
                                                @php
                                                    if (request()->get('pricesort')=='tangdan'){
                                                            echo 'selected';
                                                    }else{
                                                    echo "";
                                                    }
                                                @endphp
                                                style="font-size: 13px;color: dimgrey;">Giá tăng dần</option>
                                    </select>
                                </div>

                                <!-- showing -->
                                <div class="showing f-right text-right">
                                    <span style="font-size: 15px;color: dimgrey;">Có : {{count($products)}} sản phẩm</span>
                                </div>
                            </div>
                            <!-- shop-option end -->
                            <!-- Tab Content start -->
                            <div class="tab-content">
                                <!-- grid-view -->
                                <div>
                                    <div class="row">
                                        <!-- product-item start -->
                                    @foreach($products as $product )
                                        <!-- product-item start -->
                                            <div class="col-md-4 col-sm-4 col-xs-12" style="margin-bottom: 30px;">
                                                <div class="product-item-giam">
                                                    @if($product->promotion_price != 0)
                                                        <div class="shopee-badge--promotion">
                                                            <div class="price-giam">
                                                                @php
                                                                    $giacu= $product->unit_price;
                                                                $giamoi = $product->promotion_price;

                                                                $phantram = (($giacu-$giamoi)/$giacu)*100;
                                                                $gia = ceil($phantram);
                                                                @endphp
                                                                <span>-{{$gia}}%</span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if($product->unit == 0)
                                                        <div class="shopee-badge--promotion2">
                                                            <div class="price-giam2">
                                                                <span>Hết hàng</span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                      @php
                                                        $str =str_slug($product->name);
                                                      @endphp
                                                    <div class="product-img">
                                                        <a href="{{route('singleproduct',[$str,$product->id])}}">

                                                            <img src="../public/images/{{$product->hinhanh}}" alt=""/>
                                                        </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <h6 class="product-title">
                                                            <a href="{{route('singleproduct',[$str,$product->id])}}">{{$product->name}}</a>
                                                        </h6>
                                                      @php
                                                        $rating = $product->rating($product->id);
                                                      @endphp

                                                      @include('thethao.saosanphammoi')
                                                      @if($product->promotion_price == 0)
                                                        <h3 class="pro-price">
                                                          {{number_format($product->unit_price)}}<span style="margin-left: 2px">đ</span></h3>
                                                      @else
                                                        <h3 class="pro-price">{{number_format($product->promotion_price)}} <span style="margin-left: 2px">đ</span></h3>
                                                      @endif
                                                      <ul class="action-button">
                                                        <li>
                                                        @if(isset(Auth::user()->name))
                                                          @if($product->like($product->id,Auth::user()->id))
                                                            <li id="yeuthichnew-{{$product->id}}">
                                                              <a style="background-color: #ff7f00" href="javascript:void(0)" onclick="return addlikenew({{$product->id}},1)" title=" Bỏ yêu thích"><i style="color:white;" class="zmdi zmdi-favorite"></i></a>
                                                            </li>
                                                          @else
                                                            <li id="yeuthichnew-{{$product->id}}">
                                                              <a href="javascript:void(0)"  onclick="return addlikenew({{$product->id}},0)" title="Yêu thích"><i class="zmdi zmdi-favorite"></i></a>
                                                            </li>
                                                          @endif
                                                        @else
                                                          <li id="yeuthichnew-{{$product->id}}">
                                                            <a href="{{route('login_path_user')}}" title="Yêu thích" ><i class="zmdi zmdi-favorite"></i></a>
                                                          </li>
                                                          @endif
                                                          </li>
                                                          <li>
                                                            <a href="#" data-toggle="modal"  data-target="#shoplist-{{$product->id}}" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                          </li>
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
                                            </div>
                                            <!-- product-item end -->

                                    @endforeach
                                        <!-- product-item end -->


                                    </div>
                                  @foreach($products as $product_maychay)
                                    <div class="modal fade" id="shoplist-{{$product_maychay->id}}" tabindex="-1" role="dialog">
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
                                                    <a href="{{route('muangay',[$slug,$product_maychay->id])}}"   title="Add to cart"><span style="padding-top: 10px" class="single_add_to_cart_button" >Mua Ngay</span></a>
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
                                </div>

                            </div>
                            <!-- Tab Content end -->
                            <!-- shop-pagination start -->
                            <ul class="text-center">
                              {{$products->links()}}
                            </ul>
                            <!-- shop-pagination end -->
                        </div>
                    </div>
                    <div class="col-md-3 col-md-pull-9 col-xs-12">
                        <!-- widget-search -->
                        <aside class="widget-search mb-30">

                                <input type="text" name="search" value="{{request()->search}}" placeholder="Search here...">
                                <button type="submit"><i class="zmdi zmdi-search"></i></button>

                        </aside>
                        <aside class="widget widget-color box-shadow mb-30">
                            <h6 class="widget-title border-left mb-20">Tìm kiếm</h6>

                                <label class="mb-0"><input onchange="$('#form').submit();"type="checkbox" id="choose-have"  @php
                                                    if (request()->get('conhang')=='conhang'){
                                                            echo 'checked';
                                                    }else{
                                                    echo "";
                                                    }
                                                @endphp
                                    name="conhang" value="conhang" style="margin-right: 5px">Còn hàng</label><br>


                                <label class="mb-0"><input onchange="$('#form').submit();"type="checkbox"
                                                           @php
                                                    if (request()->get('hangmoi')=='hangmoi'){
                                                            echo 'checked';
                                                    }else{
                                                    echo "";
                                                    }
                                                @endphp
                                                           id="choose-new" name="hangmoi" value="hangmoi" style="margin-right: 5px">Hàng mới</label><br>

                        </aside>
                        <!-- shop-filter -->

                        <aside class="widget shop-filter box-shadow mb-30">


                            <h6 class="widget-title border-left mb-20">Tìm theo giá</h6>
                            <div class="price_filter">
                                <div class="price_slider_amount">
                                    <input class="tim-theo-gia" type="submit"  value="Giá  :">
                                    <input class="hien-thi-gia" type="text" id="amount" name="price"  placeholder="Add Your Price" />
                                </div>
                                <div id="slider-range"></div>
                                <button class="submit-btn-1 btn-hover-1" type="submit" style="background-color: black;font-family: Arial, Helvetica, sans-serif;
                                margin-top: 25px;">Áp dụng</button>
                            </div>

                        </aside>
                    </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- SHOP SECTION END -->
@stop