@extends('templates.thethao.master')
@section('main')
@section('title','Mua hàng nhanh')
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
          <div class="col-md-2 col-sm-12">
            <ul class="cart-tab">
              <li>
                <a class="active" disabled="" data-toggle="tab">
                  <span>01</span>
                  Giỏ Hàng
                </a>
              </li>
              <li>
                <a style="pointer-events: none;
cursor: default;" disabled=""  data-toggle="tab">
                  <span style="border: 1px solid #cccccc">02</span>
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
          <div class="col-md-10 col-sm-12">
            <!-- Tab panes -->
            <div class="tab-content">
              <!-- shopping-cart start -->
              <div class="tab-pane active" id="shopping-cart">
                <div class="shopping-cart-content">
                  <div class="table-content table-responsive">
                    <table class="text-center">
                      <thead>
                      <tr>
                        <th class="product-thumbnail">Sản phẩm</th>
                        <th class="product-price">Giá</th>
                        <th class="product-quantity">Số lượng</th>
                      </tr>
                      </thead>
                      <form action="{{route('thanhtoanngay')}}" method="get">
                        @csrf
                      <tbody>
                        <tr>
                          <td class="product-thumbnail">
                            <div class="pro-thumbnail-img">
                              <img src="../public/images/{{$product->hinhanh}}" alt="">
                            </div>
                            <div class="pro-thumbnail-info text-left">
                              <h6 class="product-title-2">
                                <a href="#">{{$product->name}}</a>
                              </h6>
                            </div>
                          </td>
                          <td class="product-price">
                            @if($product->promotion_price !=0)
                              {{number_format($product->promotion_price)}}
                            @else
                              {{number_format($product->unit_price)}}
                            @endif
                          </td>
                          <td class="product-quantity">
                            <div class="123"></div>
                            <div class="f-left"><div class="dec qtybutton" onclick="return addsubmuangay({{$product->id}})" >-</div>
                              <input type="text" value="1" data-comid ="{{$product->id}}" id="soluong-{{$product->id}}"  name="qtybutton" class="cart-plus-minus-box">
                              <div onclick="return addmuangay({{$product->id}})" class="inc qtybutton">+</div></div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  <span hidden id="gia">
                       @if($product->promotion_price !=0)
                      {{$product->promotion_price}}
                    @else
                      {{$product->unit_price}}
                    @endif
                  </span>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                      <div class="coupon-discount  p-30 mb-50"style="border: 1px solid #eee;">
                        <h6 class="widget-title border-left mb-20" style="">tổng tiền</h6>
                        <div class="hihi123" id="total" style="background-color: #e9ecef;font-family: roboto;font-size: 16px;color: black;font-weight: 700;margin-bottom: 10px;padding: 5px;">@if($product->promotion_price !=0)
                            {{number_format($product->promotion_price)}}
                          @else
                            {{number_format($product->unit_price)}}
                          @endif</div>
                          <input type="hidden" value="{{$product->id}}" name="id_product">
                          <input type="hidden" name="tonggia" id="tonggia" value="@if($product->promotion_price !=0)
                          {{$product->promotion_price}}
                          @else
                          {{$product->unit_price}}
                          @endif">
                          <button class="submit-btn-1 black-bg btn-hover-2" type="submit">thanh toán</button>
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
  </section>
@stop