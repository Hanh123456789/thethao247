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
cursor: default;"  class="active"  data-toggle="tab">
                  <span >03</span>
                  Hoàn Thành
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-10">
            <!-- Tab panes -->
            <div class="tab-content">
              <!-- shopping-cart start -->
              <div class="tab-pane" id="shopping-cart">
                <div class="shopping-cart-content">
                  <form action="#">
                    <div class="table-content table-responsive mb-50">
                      <table class="text-center">
                        <thead>

                        </thead>
                        <tbody>
                        <!-- tr -->

                        <!-- tr -->

                        <!-- tr -->

                        </tbody>
                      </table>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="coupon-discount box-shadow p-30 mb-50">
                          <h6 class="widget-title border-left mb-20">coupon discount</h6>
                          <p>Enter your coupon code if you have one!</p>
                          <input type="text" name="name" placeholder="Enter your code here.">
                          <button class="submit-btn-1 black-bg btn-hover-2" type="submit">apply coupon</button>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="payment-details box-shadow p-30 mb-50">
                          <h6 class="widget-title border-left mb-20">payment details</h6>
                          <table>
                            <tr>
                              <td class="td-title-1">Cart Subtotal</td>
                              <td class="td-title-2">$155.00</td>
                            </tr>
                            <tr>
                              <td class="td-title-1">Shipping and Handing</td>
                              <td class="td-title-2">$15.00</td>
                            </tr>
                            <tr>
                              <td class="td-title-1">Vat</td>
                              <td class="td-title-2">$00.00</td>
                            </tr>
                            <tr>
                              <td class="order-total">Order Total</td>
                              <td class="order-total-price">$170.00</td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="culculate-shipping box-shadow p-30">
                          <h6 class="widget-title border-left mb-20">culculate shipping</h6>
                          <p>Enter your coupon code if you have one!</p>
                          <div class="row">
                            <div class="col-sm-4 col-xs-12">
                              <input type="text"  placeholder="Country">
                            </div>
                            <div class="col-sm-4 col-xs-12">
                              <input type="text"  placeholder="Region / State">
                            </div>
                            <div class="col-sm-4 col-xs-12">
                              <input type="text"  placeholder="Post code">
                            </div>
                            <div class="col-md-12">
                              <button class="submit-btn-1 black-bg btn-hover-2">get a quote</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- shopping-cart end -->
              <!-- wishlist start -->

              <!-- wishlist end -->
              <!-- checkout start -->
              <div class="tab-pane active" id="checkout">
                <div class="checkout-content box-shadow p-30">

                  <div class="row">
                    <!-- billing details -->

                    <div class="col-md-12">
                      <!-- our order -->

                      <!-- payment-method -->
                      <div class="payment-method text-center">
                        <h6 class="widget-title mb-20" style="color: red">Đặt Hàng Thành Công !!!</h6>
                        <span style="font-family: Helvetica Neue,Helvetica,Arial,\\6587\6CC9\9A5B\6B63\9ED1,WenQuanYi Zen Hei,Hiragino Sans GB,\\5137\9ED1 Pro,LiHei Pro,Heiti TC,\\5FAE\8EDF\6B63\9ED1\9AD4,Microsoft JhengHei UI,Microsoft JhengHei,sans-serif;color: black;font-size: 15px">Cảm ơn bạn đã mua hàng ở shop Thethao247!!!</span>
                        <div class="product-tab-section mb-50">
                          <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                            </div>
                          </div>
                          <div class="product-tab">
                            <!-- Tab panes -->
                            <div class="tab-content">

                              <div class="tab-pane active" id="popular-product">

                              </div>

                              <!-- popular-product end -->

                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- checkout end -->

              <!-- order-complete end -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- SHOP SECTION END -->
@stop