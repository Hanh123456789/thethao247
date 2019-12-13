@extends('templates.admin.master')
@section('title','Thông tin cá nhân')
@section('main')
  <div class="product-status mg-tb-15">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="sparkline13-list">
            <div class="sparkline13-hd">
              <h3>Thông tin cá nhân</h3>
              </div>
            <div class="row">
              <div class="col-md-5">
              <div>
                <label>Tên:</label>
                <p>{{$admin->name}}</p>
              </div>
                <div>
                  <label>Email:</label>
                  <p>{{$admin->email}}</p>
                </div>
                <div>
                  <label>Chức vụ</label>
                  <p>
                    @if($admin->position == 1)
                      Nhân Viên
                      @else
                      Admin
                    @endif
                  </p>
                </div>
                <div>
                  @if($admin->address == "")
                   @else
                    <label>Địa chỉ:</label>
                    <p>{{$admin->address}}</p>
                  @endif
                </div>
                <div>
                  @if($admin->phone == "")
                  @else
                    <label>Số điện thoại:</label>
                    <p>{{$admin->phone}}</p>
                  @endif
                </div>
              </div>
              <div class="col-md-5">
                <div>
                  <label>Hình ảnh</label>
                </div>
              <div>
                  @if($admin->avatar=="")
                    Không có ảnh
                  @else
                  <img src="../images/{{$admin->avatar}}" style="    width: 150px;
    height: 150px;
    border-radius: 50%;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    margin-bottom: 20px;
    margin-top: 10%;">
                    @endif
                </div>
              </div>
              <div class="col-md-2">
                <a  class="btn-danger" style="padding: 10px" href="{{route('suathongtin')}}">Cập nhập</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop