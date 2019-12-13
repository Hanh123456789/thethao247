@extends('templates.admin.master')
@section('main')
    <div class="product-cart-area mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-cart-inner">
                        <div id="example-basic">
                            <section>
                                <h3 style="color: #3ce414">Sửa Thành Viên</h3>
                                <h3 class="product-cart-dn"></h3>
                                <form action="{{route('post_edit_member_admin',$id)}}" method="post">
                                    <input name="_method" value="PUT" type="hidden">
                                    {{ csrf_field() }}
                                    <div class="product-delivary">
                                        <div class="form-group">
                                            <label for="card-number" class="form-label">Name *</label>
                                            <input  name="name" type="text" value="{{$user->name}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="address" class="form-label">Email*</label>
                                            <input  name="email" type="text" value="{{$user->email}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="address" class="form-label">Password*</label>
                                            <input  name="password" type="password" class="form-control">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                                </form>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop