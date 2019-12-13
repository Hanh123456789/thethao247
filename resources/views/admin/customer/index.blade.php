@extends('templates.admin.master')
@section('title','Khách hàng')
@section('main')
    <div class="product-status mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <h3>Quản lí khách hàng</h3>
                            @if(Session::has('msg'))
                                <div id="msg" class="alert alert-success alert-st-one" role="alert">
                                    <p class="message-mg-rt">{{Session::get('msg')}}</p>
                                </div>
                            @endif
                            <div class="add-product">
                                <a href="{{route('customer_lock')}}">Lock-Customer</a>
                            </div>
                            <form id="form-search" action="" method="get">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <b>Tìm kiếm</b>
                                    </div>
                                    <div class="col-lg-3">
                                        <input class="form-control" value="{{request()->get('search')}}" name="search" type="text" placeholder="Tìm theo tên....">
                                    </div>
                                </div>
                            </form>
                            <div class="sparkline13-graph">
                                <tbody class="datatable-dashv1-list custom-datatable-overright" style="margin-top: 10px">
                                <table class="header-table">
                                    <tr>
                                        <th>STT</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Lock Customer</th>
                                        <th>Setting</th>
                                    </tr>
                                    <tbody class="table-css" id="myTable">
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$customer->name}}</td>
                                            <td>{{$customer->phone}}</td>
                                            <td>{{$customer->address}}</td>
                                            <td>{{$customer->email}}</td>
                                            <td class="rs-{{$customer->id}} text-center">
                                                @if($customer->lock_customer == 1)
                                                    <a href="javascript:void(0)" onclick="return unlockcustomer({{$customer->id}})"><i title="unlock" style="font-size: 19px" class="glyphicon glyphicon-lock"></i></a>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{route('customer_del',$customer->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng ?');"><button data-toggle="tooltip" title="Delete" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="custom-pagination text-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    {{$customers->links()}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop