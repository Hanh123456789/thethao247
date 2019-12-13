@extends('templates.thethao.master')
@section('main')
@section('title','Đơn Hàng')
<!-- BREADCRUMBS SETCTION START -->
<div class="breadcrumbs-section mb-80"style="background: url('thethao/images/bg/donhang.jpg');background-size: cover;height:300px;background-repeat: round;">
  <div class="breadcrumbs overlay-bg">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="breadcrumbs-inner">
            <h1 class="breadcrumbs-title font-chu" style="color:black;margin-top: 81px;">Đơn Hàng Của Bạn</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- BREADCRUMBS SETCTION END -->
<section id="page-content" class="page-wrapper">

  <div class="mb-80">
    @if(Session::has('msg'))
      <div id="msg" class="alert alert-success alert-st-one" role="alert" style="margin-left: 7.7%;width: 84.5%;">
        <p style="font-size: 18px;color: #0B792F;" class="message-mg-rt">{{Session::get('msg')}}</p>
      </div>
  @endif
    <!-- Accordion Start -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            @if(count($bills)>0)
            @php
             $i= 1;
            @endphp
            @foreach($bills as $bill)
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" style="font-family: 'Roboto', sans-serif;" data-parent="#accordion" href="#bill-{{$bill->id}}" aria-expanded="false" aria-controls="collapseOne">
                    Đơn hàng {{$i++}}
                  </a>
                </h4>
              </div>
              <div id="bill-{{$bill->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                 <p> - Ngày đặt hàng : {{date('d-m-Y', strtotime($bill->date_order))}}</p>
                  <p> - Tình trạng :</p>
                 <p> - Tổng tiền sản phẩm : {{number_format($bill->total)}} đ</p>
                  <p> - Phí ship : {{number_format($bill->shipmoney)}} đ</p>
                   <div>
                  <span><a href="{{route('chitietdonhang',$bill->id)}}">Xem chi tiết</a></span>
                     @if($bill->status == 1)
                       <span class="quick-add-to-cart" style="display: inline-flex;float: right;">
                 <button class="single_add_to_cart_button"style="background-color: #ff7f00; font-family: 'Roboto', sans-serif;" >Đã giao hàng</button>
                  </span>
                       @else
                       <span class="quick-add-to-cart" style="display: inline-flex;float: right;">
                  <a href="{{route('huydonhangtong',$bill->id)}}"  title="Add to cart"><button class="single_add_to_cart_button"style="font-family: 'Roboto', sans-serif;" >Hủy đơn hàng</button></a>
                  </span>
                       @endif
                   </div>
                </div>
              </div>
            </div>
              @endforeach
              @else
                <h2 style="font-family: Arial, Helvetica, sans-serif;text-align: center">Bạn chưa có đơn hàng nào</h2>
              @endif
          </div>
        </div>
      </div>
    </div>
    <!-- Accordion End -->

  </div>
</section>
@stop