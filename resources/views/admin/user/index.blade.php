@extends('templates.admin.master')
@section('title','Quản lí người dùng')
@section('main')
    <div class="product-status mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                        <h3>Quản lí nhân viên</h3>
                        @if(Session::has('msg'))
                            <div id="msg" class="alert alert-success alert-st-one" role="alert">
                                <p class="message-mg-rt">{{Session::get('msg')}}</p>
                            </div>
                        @endif
                        <div class="add-product">
                            <a href="{{route('get_add_member_admin')}}">Add</a>
                        </div>
                            <form id="form-search">
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
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Hình ảnh</th>
                                <th>Chức vụ</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Khóa tài khoản</th>
                                <th>Chức năng</th>
                            </tr>
                            <tbody class="table-css" id="myTable">
                            @php
                             $i=1;
                            @endphp
                            @foreach($admins as $admin)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                <td>
                                 @if($admin->avatar != "")
                                    <img src="../images/{{$admin->avatar}}" alt="" style="width: 100px;height: 100px" />
                                 @else
                                    No avatar
                                 @endif
                                </td>
                                <td>
                                    @if($admin->position==2)
                                        Admin
                                    @else
                                    Nhân viên
                                    @endif
                                </td>
                                <td>
                                    @if($admin->phone != "")
                                       {{$admin->phone}}
                                    @else
                                        Chưa cập nhập
                                    @endif
                                </td>
                                <td>
                                    @if($admin->address != "")
                                        {{$admin->address}}
                                    @else
                                        Chưa cập nhập
                                    @endif
                                </td>
                                <td>
                                    @if($admin->lock_admin==1)
                                    <i title="unlock" style="font-size: 19px" class="glyphicon glyphicon-lock"></i>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('get_edit_member_admin',$admin->id)}}" ><button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                    <a href="{{route('delete_member_admin',$admin->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa thành viên ?');"><button data-toggle="tooltip" title="Delete" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
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
                                    {{$admins->links()}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop