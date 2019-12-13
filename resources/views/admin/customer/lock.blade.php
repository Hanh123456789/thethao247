@extends('templates.admin.master')
@section('title','Khóa khách hàng')
@section('main')
    <div class="product-status mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">

                        @if(Session::has('msg'))
                            <div class="alert alert-success text-center">
                              <h4>{{Session::get('msg')}}</h4>
                            </div>
                        @endif
                        <div class="panel-body text-center lock-inner">
                            <i style="color: #56e228" class="glyphicon glyphicon-lock" aria-hidden="true"></i>
                            <br/>
                            <h4>Khóa tài khoản</h4>
                            <p>Nhập email tài khoản cần khóa vào.</p>
                            <form action="{{route('post_customer_lock')}}" method="post" class="m-t">
                                <input name="_method" value="PUT" type="hidden">
                                @csrf
                                <div class="form-group">
                                    <input style="width: 50% !important;margin-left: 27%" type="email" name="email" required="" placeholder="Nhập email của bạn" class="form-control">
                                </div>
                                <button style="background: #03e147 !important;" class="btn btn-primary full-width" type="submit">Xác Nhận</button>
                            </form>
                        </div>
                        <div class="custom-pagination text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop