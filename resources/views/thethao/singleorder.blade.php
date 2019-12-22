@extends('templates.thethao.master')
@section('main')
@section('title','Chi tiết đơn hàng')
<!-- BREADCRUMBS SETCTION START -->
<div class="breadcrumbs-section mb-80"style="background: url('thethao/images/bg/chitiet.jpg');background-size: cover;height:300px;background-repeat: round;">
  <div class="breadcrumbs overlay-bg">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="breadcrumbs-inner">
            <h1 class="breadcrumbs-title font-chu" style="color:black;margin-top: 68px">Chi Tiết Đơn Hàng</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- BREADCRUMBS SETCTION END -->
<section id="page-content" class="page-wrapper">

  <div class="mb-80">

    <!-- Accordion Start -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            @php
              $i= 1;
            @endphp
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" style="font-family: 'Roboto', sans-serif;" data-parent="#accordion" href="" aria-expanded="true" aria-controls="collapseOne">
                      Thông tin chi tiết đơn hàng
                    </a>
                  </h4>
                </div>
                <div id="" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                     @foreach($bill_details as $bill)
                     <div>
                         <div class="row">
                           <div class="col-md-3">
                             <img src="../public/images/{{$bill->product->hinhanh}}" style="width: 100%;height: 100px;object-fit: contain;">
                           </div>
                           <div class="col-md-3">
                             <p>{{$bill->product->name}}</p>
                             <p>{{$bill->quantity}}</p>
                           </div>
                           <div class="col-md-3">
                             <p>Tổng tiền : </p>
                             <p>{{number_format($bill->unit_price)}} đ</p>
                           </div>
                           <div class="col-lg-3">
                             @if($bill->bill->status != 1)
                              <span class="quick-add-to-cart" style="display: inline-flex;float: right;">

                             <a href="{{route('xoadonhang',$bill->id)}}" ><button class="single_add_to_cart_button"style="font-family: 'Roboto', sans-serif;" >Hủy sản phẩm</button></a>
                                 </span>
                                  @else
                               <div class='rating-stars text-center'>
                                 @php
                                  $rating =  $bill->ratingsao($bill->id_product);
                                 @endphp
                                 <ul id='stars'>
                                  @include('thethao.danhgiasao')
                                 </ul>
                               </div>

                               @endif

                           </div>
                         </div>
                     </div>
                 @endforeach
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Accordion End -->

  </div>
</section>
@stop