@extends('templates.admin.master')
@section('title','Chi tiết hóa đơn')
@section('main')
    <div class="data-table-area mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <h3>Chi tiết hóa đơn</h3>
                        </div>
                        <div class="row" style="background-color: gainsboro;
    padding-top: 10px;padding-left: 10px">
                            <div class="col-lg-3">
                                <p class="text-bill">Tên Khách Hàng : {{$bill->customer->name}}</p>
                                <p class="text-bill">Địa chỉ : {{$bill->customer->address}}</p>
                                <p class="text-bill">Số điện thoại : {{$bill->customer->phone}}</p>
                            </div>
                            <div class="col-lg-3">
                                <p class="text-bill">Tổng tiền : {{number_format($bill->total+$bill->shipmoney)}} đ</p>
                                <p class="text-bill">Tổng tiền sản phẩm : {{number_format($bill->total)}} đ</p>
                                <p class="text-bill">Phí ship : {{number_format($bill->shipmoney)}} đ</p>
                            </div>
                            <div class="col-lg-3">

                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <tbody class="datatable-dashv1-list custom-datatable-overright">
                                <table class="header-table">
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lương</th>
                                        <th>Giá</th>
                                    </tr>
                                    <tbody class="table-css" id="myTable">
                                    @php
                                     $i=1;
                                    @endphp
                                    @foreach($bill_details as $bill_detail)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$bill_detail->product->name}}</td>
                                            <td>{{$bill_detail->quantity}}</td>
                                            <td>{{number_format($bill_detail->unit_price)}} đ</td>
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