@extends('templates.admin.thongke2')
@section('title','Thống kê')
@section('main')
  <div class="content-main mt-5 pb-5">
    <div class="content-statistical">
      <div class="title-statistical text-center">
        <h3 class="revenue pt-2" style="text-align: left;
    margin-left: 2%;
    margin-top: 2%;">Thống kê sản phẩm</h3>
      </div>
      <div class="border-main-item pb-4">
        <form id="form-plans" action="" method="get">
        <div class="row" style="margin-left: 0px;margin-top: 15px;margin-right: 0px">
          <div class="col-md-6" style="    width: 46.4%!important;
    margin-bottom: 5%;">
          </div>
          <div class="col-sm-3" style="margin-left: -2%;">
            <div class="row">
              <div class="col-sm-2">
                <label for="choose-member">Từ:</label>
              </div>
              <div class="col-md-10">
                <input type="date"
                       @php
                         use Carbon\Carbon;
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
        </form>
        <br>
        <div class="chart">
          <hr/>
          <div id="chartContainer" style="height: 400px; width: 100%;">
          </div>
        </div>
        <p style="margin: 0 0 15px;
    font-size: 17px;
    color: blue;
    margin-left: 2%;">Chi tiết</p>
        <div class="sparkline13-graph" style="margin-left: 2%;
    margin-right: 7%;">
          <tbody class="datatable-dashv1-list custom-datatable-overright" style="margin-top: 10px">
          <table class="header-table">
            <tr>
              <th>STT</th>
              <th>Tên sản phẩm</th>
              <th>Loại</th>
              <th>Số lượng bán ra</th>
              <th>Doanh thu</th>
            </tr>
              <tbody class="table-css" id="myTable">
              @if($banchay1 == "")
                {{$doanhthu1 = 0}}
              @else
                <tr>
                  <td>
                    1
                  </td>
                  <td>
                    {{$banchay1->name}}
                  </td>
                  <td>
                    {{$banchay1->product_type->name}}
                  </td>
                  <td>
                    {{$arrso[0]}}
                  </td>
                  <td>
                    @php
                    if($banchay1->promotion_price==0){
                     /*$doanhthu1 =$arrso[0]*($banchay1->unit_price-$banchay1->entry_price);*/
                     $doanhthu1 =$arrso[0]*$banchay1->unit_price;
                    }else{
                     $doanhthu1 =$arrso[0]*$banchay1->promotion_price;
                    }
                    @endphp
                    {{number_format($doanhthu1)}} đ
                  </td>
                </tr>
              @endif
              @if($banchay2 == "")
                {{$doanhthu2 = 0}}
              @else
                <tr>
                  <td>
                    2
                  </td>
                  <td>
                    {{$banchay2->name}}
                  </td>
                  <td>
                    {{$banchay2->product_type->name}}
                  </td>
                  <td>
                    {{$arrso[1]}}
                  </td>
                  <td>
                    @php
                      if($banchay2->promotion_price==0){
                       $doanhthu2 =$arrso[1]*$banchay2->unit_price;
                      }else{
                       $doanhthu2 =$arrso[1]*$banchay2->promotion_price;
                      }
                    @endphp
                    {{number_format($doanhthu2)}} đ
                  </td>
                </tr>
                @endif
              @if($banchay3 == "")
                {{$doanhthu3 = 0}}
              @else
                <tr>
                  <td>
                    3
                  </td>
                  <td>
                    {{$banchay3->name}}
                  </td>
                  <td>
                    {{$banchay3->product_type->name}}
                  </td>
                  <td>
                    {{$arrso[2]}}
                  </td>
                  <td>
                    @php
                      if($banchay3->promotion_price==0){
                       $doanhthu3 =$arrso[2]*$banchay3->unit_price;
                      }else{
                       $doanhthu3 =$arrso[2]*$banchay3->promotion_price;
                      }
                    @endphp
                    {{number_format($doanhthu3)}} đ
                  </td>

                </tr>
              @endif
              @if($banchay4 == "")
                {{$doanhthu4 =0}}
              @else
                <tr>
                  <td>
                    4
                  </td>
                  <td>
                    {{$banchay4->name}}
                  </td>
                  <td>
                    {{$banchay4->product_type->name}}
                  </td>
                  <td>
                    {{$arrso[3]}}
                  </td>
                  <td>
                    @php
                      if($banchay4->promotion_price==0){
                       $doanhthu4 =$arrso[3]*$banchay4->unit_price;
                      }else{
                       $doanhthu4 =$arrso[3]*$banchay4->promotion_price;
                      }
                    @endphp
                    {{number_format($doanhthu4)}} đ
                  </td>

                </tr>
              @endif
              @if($banchay5 == "")
                {{$doanhthu5=0}}
              @else
                <tr>

                  <td>
                    5
                  </td>
                  <td>
                    {{$banchay5->name}}
                  </td>
                  <td>
                    {{$banchay5->product_type->name}}
                  </td>
                  <td>
                    {{$arrso[4]}}
                  </td>
                  <td>
                    @php
                      if($banchay5->promotion_price==0){
                       $doanhthu5 =$arrso[4]*$banchay5->unit_price;
                      }else{
                       $doanhthu5 =$arrso[4]*$banchay5->promotion_price;
                      }
                    @endphp
                    {{number_format($doanhthu5)}} đ
                  </td>
                </tr>
              @endif
              <tr>
                <td></td>
                <td></td>
                <td>
                  <b>Tổng</b>
                </td>
                <td>

                  @php
                    $tongso = $arrso[0]+$arrso[1]+$arrso[2]+$arrso[3]+$arrso[4];
                  @endphp
                  <b>{{$tongso}}</b>
                </td>
                <td>
                  @php
                   $doanhthutong = $doanhthu1+$doanhthu2+$doanhthu3+$doanhthu4+$doanhthu5;
                  @endphp
                 <b>{{number_format($doanhthutong)}} đ</b>
                </td>
              </tr>
              </tbody>
          </table>
        </div>
      </div>
      <div class="chart">
        <hr/>
        <div id="doanhthu" style="height: 400px; width: 100%;">
        </div>
          </div>
        <p style="margin: 0 0 15px;
       font-size: 17px;
       color: blue;
       margin-left: 2%;">Chi tiết</p>
         <div class="sparkline13-graph" style="margin-left: 2%;
       margin-right: 7%;padding-bottom: 5%">
           <tbody class="datatable-dashv1-list custom-datatable-overright" style="margin-top: 10px">
           <table class="header-table">
             <tr>
               <th>STT</th>
               <th>Tên sản phẩm</th>
               <th>Loại</th>
               <th>Số lượng bán ra</th>
               <th>Doanh thu</th>
             </tr>

             <tbody class="table-css" id="myTable">
             @if($sodoanhthu1 == "")
               {{$arrsodoanhthu[0] =0}}
             @else
             <tr>
               <td>
                 1
               </td>
               <td>
                 {{$sodoanhthu1->name}}
               </td>
               <td>
                 {{$sodoanhthu1->product_type->name}}
               </td>
               <td>
                 {{$soluongbanradoanhthu1}}
               </td>
               <td>
                 {{number_format($arrsodoanhthu[0])}}
               </td>
             </tr>
             <tr>
               @endif
               @if($sodoanhthu2 == "")
                 {{$arrsodoanhthu[1] =0}}
               @else
               <td>
                 2
               </td>
               <td>
                 {{$sodoanhthu2->name}}
               </td>
               <td>
                 {{$sodoanhthu2->product_type->name}}
               </td>
               <td>
                 {{$soluongbanradoanhthu2}}
               </td>
               <td>
                 {{number_format($arrsodoanhthu[1])}}
               </td>
             </tr>
             @endif
             @if($sodoanhthu3 == "")
               {{$arrsodoanhthu[2] =0}}
             @else
             <tr>
               <td>
                 3
               </td>
               <td>
                 {{$sodoanhthu3->name}}
               </td>
               <td>
                 {{$sodoanhthu3->product_type->name}}
               </td>
               <td>
                 {{$soluongbanradoanhthu3}}
               </td>
               <td>
                 {{number_format($arrsodoanhthu[2])}}
               </td>
             </tr>
             @endif
             @if($sodoanhthu4 == "")
               {{$arrsodoanhthu[3] =0}}
             @else
             <tr>
               <td>
                 4
               </td>
               <td>
                 {{$sodoanhthu4->name}}
               </td>
               <td>
                 {{$sodoanhthu4->product_type->name}}
               </td>
               <td>
                 {{$soluongbanradoanhthu4}}
               </td>
               <td>
                 {{number_format($arrsodoanhthu[3])}}
               </td>
             </tr>
             @endif
             @if($sodoanhthu5 == "")
               {{$arrsodoanhthu[4] =0}}
             @else
             <tr>
               <td>
                 5
               </td>
               <td>
                 {{$sodoanhthu5->name}}
               </td>
               <td>
                 {{$sodoanhthu5->product_type->name}}
               </td>
               <td>
                 {{$soluongbanradoanhthu5}}
               </td>
               <td>
                 {{number_format($arrsodoanhthu[4])}}
               </td>
             </tr>
             <tr>
               @endif
               <td>
               </td>
               <td></td>
               <td><b>Tổng</b></td>
               <td>
                 @php
                  $soluongbanradoanhthu = $soluongbanradoanhthu1+$soluongbanradoanhthu2+$soluongbanradoanhthu3+$soluongbanradoanhthu4+$soluongbanradoanhthu5;
                 @endphp
                <b>{{$soluongbanradoanhthu}}</b>
               </td>
               <td>
                 @php
                   $arrdoanhthutong = $arrsodoanhthu[0]+$arrsodoanhthu[1]+$arrsodoanhthu[2]+$arrsodoanhthu[3]+$arrsodoanhthu[4];
                 @endphp
                 <b>{{number_format($arrdoanhthutong)}}</b>
               </td>
             </tr>
             </tbody>
           </table>
         </div>
    </div>
  </div>
@stop