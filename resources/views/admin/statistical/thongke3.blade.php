@extends('templates.admin.master')
@section('title','Thống kê')
@section('main')
  <div class="data-table-area mg-tb-15">
    <div class="container-fluid">
      <div class="income-order-visit-user-area mg-t-15">
        <h3>Báo Cáo Tồn Kho</h3>
        <div class="container-fluid">
          <div class="row" style="margin-top: 5%">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="income-dashone-total reso-mg-b-30" style="box-shadow: 0px 0px 12px 0px rgba(0,0,0, 0.14">
                <div class="income-dashone-pro">
                  <div class="income-rate-total" style="margin-bottom: 25px;">
                    <div class="price-adminpro-rate text-center">
                      <h3>Số lượng tồn kho</h3>
                    </div>
                  </div>
                  <div class="income-range text-center">
                    <span class="income-percentange bg-green" style="padding: 5px 8px;font-size: 20px;float: inherit"><span class="counter">{{$number}}</span>
                    </span>
                  </div>
                  <div class="clear"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="income-dashone-total reso-mg-b-30" style="box-shadow: 0px 0px 12px 0px rgba(0,0,0, 0.14">
                <div class="income-dashone-pro text-centers">
                  <div class="income-rate-total" style="margin-bottom: 25px">
                    <div class="price-adminpro-rate text-center">
                      <h3>Giá trị tồn kho</h3>
                    </div>
                  </div>
                  <div class="income-range text-center">
                    <span class="income-percentange bg-red" style="padding: 5px 8px;font-size: 20px;float: inherit"><span class="counter">{{number_format($total)}}</span>
                    </span>
                  </div>
                  <div class="clear"></div>
                </div>
              </div>
            </div>
          </div >
          <div class="row" style="margin-top: 5%;">
            <form action="" method="get" id="form-search">
              <div class="col-lg-1">
                <div class="form-group-inner">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <label class="login2 pull-right pull-right-pro">Tìm kiếm</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group-inner">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                      <label class="login2 pull-right pull-right-pro">Loại</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <div class="form-select-list">
                        <select id="cate" class="form-control custom-select-value" name="cate_seclect">
                          <option value="">Tất cả</option>
                          @foreach($cate_product as $cate)
                            <option value="{{$cate->id}}"
                                @php
                                  if (request()->get('cate_seclect')== $cate->id){
                                          echo 'selected';
                                  }else{
                                  echo "";
                                  }
                                @endphp>{{$cate->name}} </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-5">
                <div class="form-group-inner">
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <label class="login2 pull-right pull-right-pro">Tên sản phẩm</label>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                      <div class="form-select-list">
                        <input type="text" name="search" value="{{request()->get('search')}}" class="form-control input-lg" placeholder="Nhập tên sản phẩm" style="height: 34px">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="sparkline13-graph">
            <tbody class="datatable-dashv1-list custom-datatable-overright" style="margin-top: 10px">
            <table class="header-table">
              <tr>
                <th>STT</th>
                <th>Sản phẩm</th>
                <th>Loại</th>
                <th>Giá vốn</th>
                <th>Tồn kho</th>
                <th>Giá trị tồn kho</th>
              </tr>
              @if(count($products)>0)
              <tbody class="table-css" id="myTable">

                  @php
                   $i = 0;
                  @endphp
                  @foreach($products as $product)
                    <tr>
                  <td>
                    {{$i++}}
                  </td>
                  <td>
                    {{$product->name}}
                  </td>
                      <td>
                      {{$product->product_type->name}}
                      </td>
                      <td>
                        {{number_format($product->entry_price)}}
                      </td>
                      <td>
                        {{$product->unit}}
                      </td>
                      <td>
                        {{number_format($product->entry_price*$product->unit)}}
                      </td>
                    </tr>
                  @endforeach
              </tbody>
              @else
                <div>
                  Không có hàng tồn kho
                </div>
              @endif
            </table>
          </div>
        </div>
        <div class="pagination text-center" style="width: 100%">
          {{$products->links()}}
        </div>
      </div>
    </div>
  </div>
  </div>
@stop