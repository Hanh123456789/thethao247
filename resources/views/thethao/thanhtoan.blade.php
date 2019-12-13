@extends('templates.thethao.master')
@section('main')
@section('title','Đặt hàng')
    <!-- BREADCRUMBS SETCTION START -->
<div class="breadcrumbs-section mb-80"style="background: url('thethao/images/bg/cart.jpg');background-size: cover;height:300px;background-repeat: round;">
    <div class="breadcrumbs overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumbs-inner">
                        <h1 class="breadcrumbs-title font-chu" style="color:black;">Giỏ Hàng Của Bạn</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- BREADCRUMBS SETCTION END -->
    <section id="page-content" class="page-wrapper">

        <!-- SHOP SECTION START -->
        <div class="shop-section mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <ul class="cart-tab">
                            <li>
                                <a class="active" disabled="" data-toggle="tab">
                                    <span>01</span>
                                    Giỏ Hàng
                                </a>
                            </li>
                            <li>
                                <a style="pointer-events: none;
cursor: default;" class="active"  data-toggle="tab">
                                    <span>02</span>
                                    Thanh Toán
                                    -
                                    Đặt Hàng
                                </a>
                            </li>
                            <li>
                                <a style="pointer-events: none;
cursor: default;" disabled=""  data-toggle="tab">
                                    <span style="border: 1px solid #cccccc">03</span>
                                    Hoàn Thành
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-10">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="checkout">
                                <div class="checkout-content box-shadow p-30">
                                    @if (Session::has('msg'))
                                        <div class="alert alert-danger">
                                            {{Session::get('msg')}}
                                        </div>
                                    @endif
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- our order -->
                                                <div class="payment-details pl-10 mb-50" style="padding-left: 0px">
                                                    <h6 class="widget-title border-left mb-20">Tổng Tiền Sản Phẩm</h6>
                                                    <table>
                                                        <tr>
                                                            <td  style="font-size: 20px" class="order-total-price">{{number_format($total)}} đ</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!-- payment-method -->
                                                <div class="payment-method">
                                                    <h6 class="widget-title border-left mb-20">Hình Thức Thanh Toán</h6>
                                                    <div class="product-tab-section mb-50">
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="pro-tab-menu text-left">
                                                                        <!-- Nav tabs -->
                                                                        <ul class="" >
                                                                            <li class="active"><a href="#popular-product" data-toggle="tab">Thanh toán khi nhận hàng</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="product-tab">
                                                                <!-- Tab panes -->
                                                                <div class="tab-content">

                                                                    <div class="tab-pane active" id="popular-product">
                                                                        <form action="{{route('dathang')}}" method="post">
                                                                            @csrf
                                                                        <input type="hidden" id="tien" name="total" value="{{$total}}">
                                                                            <label>Tên người nhận</label>
                                                                            <input style="width: 50%;display: block;font-family: initial;" type="text" name="name" value="{{$user->name}}" placeholder="Name here..." >
                                                                        <label>Số điện thoại</label>
                                                                        <input style="width: 50%;display: block;font-family: initial;" type="text" name="phone" value="{{$user->phone}}" placeholder="Phone here..." >
                                                                            <div id="floating-panel">
                                                                                <label> Địa chỉ :</label>
                                                                                <textarea   id="address" style="width: 50%;display: block;font-family: initial;color: #585858;font-size: 16px" class="custom-textarea" name="address" placeholder="Your address here...">{{$user->address}}</textarea>
                                                                                <input class="submit-btn-1 mt-30 btn-hover-1" style="margin-bottom: 12px;background-color: #0B792F" id="submit" type="button" value="Tìm kiếm địa chỉ">
                                                                            </div>
                                                                            <div id="map" style="height: 200px;"></div>
                                                                            <div class="payment-details pl-10 mb-50" style="padding-left: 0px">
                                                                                <h6 class="widget-title border-left mb-20 mt-20">Phí giao hàng</h6>
                                                                                        <span style="font-size: 20px;font-family: roboto;color: black;font-weight: 700" id="khoangcach">0</span><span style="font-size: 20px;font-family: roboto;color:black;font-weight: 700"> đ</span>

                                                                            </div>
                                                                             <input type="hidden" value="" id="khoangcach1" name="shipmoney">
                                                                            <input type="hidden" value="" id="sokm" name="km">
                                                                            <div class="payment-details pl-10 mb-50" style="padding-left: 0px">
                                                                                <h6 class="widget-title border-left mb-20">Tổng Tiền</h6>
                                                                                <span style="font-size: 20px;font-family: roboto;color: black;font-weight: 700" id="tongtien">{{number_format($total)}}</span><span style="font-size: 20px;font-family: roboto;color:black;font-weight: 700"> đ</span>

                                                                            </div>

                                                                        <button class="submit-btn-1 mt-30 btn-hover-1" type="submit"><span style="font-family: initial">Đặt hàng</span></button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SHOP SECTION END -->
@stop