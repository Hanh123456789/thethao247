@extends('templates.admin.master')
@section('main')
  <div class="product-cart-area mg-tb-15">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="product-cart-inner">
            <div id="example-basic">
              <section>
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                <h3 style="color: #3ce414">Cập nhập thông tin</h3>
                <h3 class="product-cart-dn"></h3>
                <form action="{{route('postsuathongtin',$id)}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="product-delivary">
                    <div class="form-group">
                      <label for="card-number" class="form-label">Name</label>
                      <input  name="name" type="text" value="{{$admin->name}}" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="address" class="form-label">Email</label>
                      <input  name="email" type="text" disabled value="{{$admin->email}}" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="address" class="form-label">Password</label>
                      <input  name="password" type="password" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="card-number" class="form-label">Position</label>
                      @if($admin->position==2)
                        Admin
                      @else
                        Nhân viên
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="address" class="form-label">Hình ảnh</label>
                    <input  name="avatar" type="file" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="address" class="form-label">Số điện thoại</label>
                    <input  name="phone" value="{{$admin->phone}}" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <input  name="address" value="{{$admin->address}}" type="text" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-success btn-block button-sumit">Cập nhập</button>
                  <input type="button" class="btn btn-warning btn-block button-sumit" value="Trở lại" onclick="goBack()">
                </form>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop