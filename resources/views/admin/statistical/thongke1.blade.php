@extends('templates.admin.master')
@section('title','Thống kê')
@section('main')
  <div class="data-table-area mg-tb-15">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="sparkline13-list">
            <form id="form-plans" action="" method="get">
            <div class="sparkline13-hd">
              <h3>Thống kê theo ngày</h3>
              <div class="add-product">
              </div>
            </div>
            <div class="datatable-dashv1-list custom-datatable-overright">
                <div class="row">
                  <div class="col-md-8" style="width: 63%;margin-bottom: 5%">
                  </div>
                  <div class="col-sm-1">
                    <label for="choose-member">Ngày:</label>
                  </div>
                  <div class="col-md-3">
                    <input type="date"
                           @php
                             use Carbon\Carbon;
                            $dt = is_null(request()->get('ngay', $datee)) ? Carbon::now() : new Carbon(request()->get('ngay', $datee));
                           @endphp
                           value="{{$dt->format('Y-m-d')}}" class="form-control date_plans" name="ngay" >
                  </div>
                </div>
              <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="income-dashone-total reso-mg-b-30" style="box-shadow: 0px 0px 12px 0px rgba(0,0,0, 0.14)">
                      <div class="income-dashone-pro">
                        <div class="income-rate-total" style="margin-bottom: 25px;">
                          <div class="price-adminpro-rate text-center">
                            <h3><img src="img/logo/donhang.png" style="width: 40px; height: 40px;margin-right: 13px">Tổng đơn hàng</h3>
                          </div>
                        </div>
                        <div class="income-range text-center">
                    <span class="income-percentange bg-green" style="padding: 5px 8px;font-size: 20px;float: inherit"><span class="counter">{{count($tongngay)}}</span>
                                    </span>
                        </div>
                        <div class="clear"></div>
                      </div>
                    </div>
                </div >
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <div class="income-dashone-total reso-mg-b-30" style="box-shadow: 0px 0px 12px 0px rgba(0,0,0, 0.14)">
                    <div class="income-dashone-pro">
                      <div class="income-rate-total" style="margin-bottom: 25px;">
                        <div class="price-adminpro-rate text-center">
                          <h3><img src="img/logo/tien.jpg" style="width: 40px; height: 40px;margin-right: 13px">Tổng giá trị</h3>
                        </div>
                      </div>
                      <div class="income-range text-center">
                    <span class="income-percentange bg-primary" style="padding: 5px 8px;font-size: 20px;float: inherit"><span class="counter">        @php
                          $tienngay =0;
                        @endphp
                        @foreach($tongngay as $ngay)
                          @php
                            $tien123 = $ngay->total;
                           $tienngay += $tien123;
                          @endphp
                        @endforeach
                        {{number_format($tienngay)}} đ</span>
                                    </span>
                      </div>
                      <div class="clear"></div>
                    </div>
                  </div>
                </div >
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <div class="income-dashone-total reso-mg-b-30" style="box-shadow: 0px 0px 12px 0px rgba(0,0,0, 0.14)">
                    <div class="income-dashone-pro">
                      <div class="income-rate-total" style="margin-bottom: 25px;">
                        <div class="price-adminpro-rate text-center">
                          <h3><img src="img/logo/loinhuan.png" style="width: 50px; height: 42px;">Tổng lợi nhuận</h3>
                        </div>
                      </div>
                      <div class="income-range text-center">
                    <span class="income-percentange bg-red" style="padding: 5px 8px;font-size: 20px;float: inherit"><span class="counter">
                                       @php
                                         $tienngay =0;
                                       @endphp
                        @foreach($tongngay as $ngay)
                          @php
                            $tien123 = $ngay->total;
                           $tienngay += $tien123;
                          @endphp
                        @endforeach
                        @php
                          $doanhthu =$tienngay-$tongtienngay;
                        @endphp
                        {{number_format($doanhthu)}} đ
            </span>
                                    </span>
                      </div>
                      <div class="clear"></div>
                    </div>
                  </div>
                </div >
              </div>
              <h3 style="margin-top: 5%;
    margin-bottom: 4%;">Thống kê theo tháng</h3>
              <div class="row">
                <div class="col-md-6" style="    width: 46.4%!important;
    margin-bottom: 5%;">
                </div>
                <div class="col-sm-3">
                  <div class="row">
                    <div class="col-sm-2">
                      <label for="choose-member">Từ:</label>
                    </div>
                    <div class="col-md-10">
                      <input type="date"
                             @php
                           $dt = is_null(request()->get('from', $start_month)) ? Carbon::now() : new Carbon(request()->get('from', $start_month));
                             @endphp
                             value="{{$dt->format('Y-m-d')}}" class="form-control date_plans" name="from" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="row ">
                    <div class="col-sm-2">
                      <label for="choose-member">Đến:</label>
                    </div>
                    <div class="col-md-10">
                      <input type="date"
                                   @php
                           $dt = is_null(request()->get('to', $end_month)) ? Carbon::now() : new Carbon(request()->get('to', $end_month));
                             @endphp
                                   value="{{$dt->format('Y-m-d')}}" class="form-control date_plans" name="to">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <div class="income-dashone-total reso-mg-b-30" style="box-shadow: 0px 0px 12px 0px rgba(0,0,0, 0.14)">
                    <div class="income-dashone-pro">
                      <div class="income-rate-total" style="margin-bottom: 25px;">
                        <div class="price-adminpro-rate text-center">
                          <h3><img src="img/logo/donhang.png" style="width: 40px; height: 40px;margin-right: 13px">Tổng đơn hàng</h3>
                        </div>
                      </div>
                      <div class="income-range text-center">
                    <span class="income-percentange bg-green" style="padding: 5px 8px;font-size: 20px;float: inherit"><span class="counter">{{count($tongthang)}}</span>
                                    </span>
                      </div>
                      <div class="clear"></div>
                    </div>
                  </div>
                </div >
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <div class="income-dashone-total reso-mg-b-30" style="box-shadow: 0px 0px 12px 0px rgba(0,0,0, 0.14)">
                    <div class="income-dashone-pro">
                      <div class="income-rate-total" style="margin-bottom: 25px;">
                        <div class="price-adminpro-rate text-center">
                          <h3><img src="img/logo/tien.jpg" style="width: 40px; height: 40px;margin-right: 13px">Tổng giá trị</h3>
                        </div>
                      </div>
                      <div class="income-range text-center">
                    <span class="income-percentange bg-blue" style="padding: 5px 8px;font-size: 20px;float: inherit"><span class="counter">@php
                          $tienthang = 0;
                        @endphp
                        @foreach($tongthang as $thang)
                          @php
                            $tien321 = $thang->total;
                           $tienthang += $tien321;
                          @endphp
                        @endforeach
                        {{number_format($tienthang)}} đ</span>
                                    </span>
                      </div>
                      <div class="clear"></div>
                    </div>
                  </div>
                </div >
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <div class="income-dashone-total reso-mg-b-30" style="box-shadow: 0px 0px 12px 0px rgba(0,0,0, 0.14)">
                    <div class="income-dashone-pro">
                      <div class="income-rate-total" style="margin-bottom: 25px;">
                        <div class="price-adminpro-rate text-center">
                          <h3><img src="img/logo/loinhuan.png" style="width: 40px; height: 40px;margin-right: 13px">Tổng lợi nhuận</h3>
                        </div>
                      </div>
                      <div class="income-range text-center">
                    <span class="income-percentange bg-red" style="padding: 5px 8px;font-size: 20px;float: inherit"><span class="counter"> @php
                          $tienthang =0;
                        @endphp
                        @foreach($tongthang as $ngay)
                          @php
                            $tien321 = $ngay->total;
                           $tienthang += $tien321;
                          @endphp
                        @endforeach
                        @php
                          $doanhthuthang = $tienthang-$tongtienthang;
                        @endphp
                        {{number_format($doanhthuthang)}} đ</span>
                                    </span>
                      </div>
                      <div class="clear"></div>
                    </div>
                  </div>
                </div >
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

@stop