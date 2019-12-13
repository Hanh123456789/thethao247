@extends('templates.thethao.master')
@section('main')
@section('title','Thông tin')
    <section id="page-content" class="page-wrapper">

        <!-- SHOP SECTION START -->
        <div class="shop-section mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                        @endif
                                @if(Session::has('msg'))
                                    <div class="alert alert-success">
                                        {{Session::get('msg')}}
                                    </div>
                            @endif

                            <!-- wishlist start -->

                            <!-- wishlist end -->
                            <!-- checkout start -->
                            <div class="tab-pane active" id="checkout">
                                <div class="checkout-content box-shadow p-30">
                                    <form action="{{route('updateprofile',$user->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <!-- billing details -->
                                            <div class="col-md-6 color-profile">
                                                <div class="billing-details pr-10">
                                                    <h6 class="widget-title border-left mb-20">Thông tin cá nhân</h6>
                                                    <label style="color: black">Tên :</label>
                                                    <input type="text" name="name" value="{{$user->name}}" placeholder="Your Name Here...">
                                                    <label style="display: block">Giới tính :</label>

                                                    @if($user->sex == 1)
                                                    <input type="radio" value="1" checked style="margin-right: 5px" name="sex">Nam
                                                    <input style="margin-left: 50px;margin-right: 5px" value="2"  type="radio" name="sex">Nữ
                                                    @elseif($user->sex == 2)
                                                        <input type="radio" value="1"  style="margin-right: 5px" name="sex">Nam
                                                        <input style="margin-left: 50px;margin-right: 5px" value="2" checked type="radio" name="sex">Nữ
                                                    @else
                                                        <input type="radio" value="1"  style="margin-right: 5px" name="sex">Nam
                                                        <input style="margin-left: 50px;margin-right: 5px"  value="2" type="radio" name="sex">Nữ
                                                    @endif

                                                    <label style="display: block;margin-top: 10px">Địa chỉ Email</label>
                                                    <input type="text" disabled name="email" value="{{$user->email}}" placeholder="Email address here...">
                                                    <label>Số điện thoại</label>
                                                    <input type="text" name="phone" value="{{$user->phone}}" placeholder="Phone here...">
                                                    Địa chỉ :
                                                    <textarea class="custom-textarea" name="address" placeholder="Your address here...">{{$user->address}}</textarea>
                                                    <label>Ngày sinh :</label>
                                                    <input class="input-date" name="birthday" type="date" value="{{$user->birthday}}"  placeholder="Birthday here...">
                                                    <label>Mật Khẩu Mới:</label>
                                                    <input type="password" name="password" placeholder="Phone here...">
                                                    <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">Lưu</button>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- our order -->
                                                <div class="payment-details pl-10 mb-50 text-centers">
                                                    @if($user->images == "")
                                                        <div class="hinhanh" style="margin-top:10% ">
                                                            Chưa có ảnh đại diện
                                                        </div>
                                                    @else
                                                 <div class="hinhanh">
                                                     <img src="../public/images/{{$user->images}}">
                                                 </div>
                                                    @endif
                                                    <input style="padding-top: 8px;" name="images" class="input-date" type="file" >
                                                </div>
                                                <!-- payment-method -->


                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- checkout end -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SHOP SECTION END -->

    </section

@stop