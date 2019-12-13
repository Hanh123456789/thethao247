@extends('templates.admin.master')
@section('title','Hóa đơn')
@section('main')
    <div class="data-table-area mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <h3>Hóa đơn</h3>
                            @if(Session::has('msg'))
                                <div id="msg" class="alert alert-success alert-st-one" role="alert">
                                    <p class="message-mg-rt">{{Session::get('msg')}}</p>
                                </div>
                            @endif
                        </div>
                        <form id="form-search" method="get">
                            <div class="row">
                                <div class="col-lg-2">
                                    <b>Tìm kiếm</b>
                                </div>
                                <div class="col-lg-3">
                                    <input type="date"
                                           @php
                                               use Carbon\Carbon;
                                              $dt =  Carbon::now();
                                           @endphp
                                           value="@php
                                           if (request()->get('ngay')==null){
                                           echo $dt->format('Y-m-d');
                                           }else{
                                           echo date('Y-m-d', strtotime(request()->get('ngay')));
                                           }
                                           @endphp" class="form-control" id="cate" name="ngay" >
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <select class="form-control" id="cate1" name="status">
                                            <option value="">Tất cả</option>
                                            <option value="1"@php
                                                if (request()->get('status')==="1"){
                                                        echo 'selected';
                                                }else{
                                                echo "";
                                                }
                                            @endphp>Đã giao hàng</option>
                                            <option value="0" @php
                                                if (request()->get('status')==="0"){
                                                        echo 'selected';
                                                }else{
                                                echo "";
                                                }
                                            @endphp>Chưa giao hàng</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <table id="table" data-toggle="table" >
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên khách hàng</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Tổng tiền(VNĐ)</th>
                                        <th>Trạng thái</th>
                                        <th>Chức năng</th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-css" id="myTable">
                                    @php
                                     $i = 0;
                                    @endphp
                                    @foreach($bills as $bill)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$bill->customer->name}}</td>
                                            <td>{{date('d-m-Y', strtotime($bill->date_order))}}</td>
                                            <td>{{number_format($bill->total)}} đ</td>

                                            <td class="rs-{{$bill->id}}">
                                                @if($bill->status != 1)
                                                    <a href="javascript:void(0)" onclick="return trangthai({{$bill->id}},0)"><img src="img/logo/de.png"></a>
                                                @else
                                                    <a href="javascript:void(0)" onclick="return trangthai({{$bill->id}},1)"><img src="img/logo/ac.png"></a>
                                                @endif
                                            </td>
                                            <td class="datatable-ct">
                                                <a href="{{route('bill_detail',$bill->id)}}" > <button  class="btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                @if($bill->status ==0)
                                                <a href="{{route('huydonhangtongadmin',$bill->id)}}" onclick="return confirm('Bạn có chắc chắn muốn hủy hóa đơn này?');"><button data-toggle="tooltip" title="Hủy" class="btn-warning"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></button></a>
                                                @endif
                                                <a href="{{route('bill_delete',$bill->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa hóa đơn này?');"><button data-toggle="tooltip" title="Delete" class="btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop