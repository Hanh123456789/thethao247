@extends('templates.admin.master')
@section('title','Sửa sản phẩm')
@section('main')
<div class="product-cart-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-cart-inner">
                    <div id="example-basic">
                        <section>
                            <h3 style="color: #3ce414">Sửa Dụng Cụ Thể Thao</h3>
                            <h3 class="product-cart-dn"></h3>
                            <form action="{{route('post_edit_product_admin',$product->id)}}" method="post" enctype="multipart/form-data">
                                <input name="_method" value="PUT" type="hidden">
                                @csrf
                                <div class="product-delivary">
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="card-number" class="form-label">Tên dụng cụ : </label>
                                            <input  name="name" value="{{$product->name}}" type="text" class="form-control">
                                            {!! $errors->first('name', '<p class="help-block" style="color:red">:message</p>') !!}
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="card-number" class="form-label">Loại dụng cụ : </label>
                                            <select name="id_type" class="form-control required">
                                                @foreach($producttypes as $producttype)
                                                <option value="{{$producttype->id}}"{{ ($product->product_type->id == $producttype->id ) ? 'selected' : '' }}>
                                                    {{$producttype->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Chi tiết : </label>
                                        <textarea id = "editor1" name="description" class="form-control" rows="7">{{$product->description}}</textarea>
                                        {!! $errors->first('description', '<p class="help-block" style="color:red">:message</p>') !!}
                                    </div>
                                    <label>Hình ảnh cũ : </label>
                                    <div class="row">
                                        @foreach($product->imagess as $image)
                                        <div class="form-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <img src="/public/images/{{$image->images}}" style="width: 200px;height: 200px">
                                            Xóa <input style="width: 5% !important;" type="checkbox" name="images_old[]" value="{{$image->images}}">
                                        </div>
                                        @endforeach
                                    </div>
                                    <label>Hình ảnh : </label>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="input-group control-group increment" >
                                                <input type="file" name="images[]" class="form-control">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-success add-images" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                                </div>
                                            </div>
                                            <div class="clone hide">
                                                <div class="control-group input-group" style="margin-top:10px">
                                                    <input type="file" name="images[]" class="form-control">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-danger remove-images" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                            @foreach ($errors->all() as $error)
                                            @if($error == "Dữ liệu nhập vào phải là ảnh và có đuôi jpeg,png,jpg,gif")
                                            <p class="help-block" style="color:red">{{$error}}</p>
                                            @elseif($error == "Dữ liệu nhập vào không lớn hơn 2MB")
                                            <p class="help-block" style="color:red">{{$error}}</p>
                                            @endif
                                            @endforeach

                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: -26px;">
                                            <label for="card-number" class="form-label">Giá Nhập: </label>
                                            <div class="input-group">
                                                <input type="text" name="entry_price" value="{{$product->entry_price}}" class="form-control">
                                                <span class="input-group-addon" style="background-color: #403838;color: white">VNĐ</span>
                                            </div>
                                            {!! $errors->first('entry_price', '<p class="help-block" style="color:red">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="card-number" class="form-label">Giá : </label>
                                            <div class="input-group">
                                                <input type="text" name="unit_price" value="{{$product->unit_price}}"  class="form-control">
                                                <span class="input-group-addon" style="background-color: #403838;color: white">VNĐ</span>
                                            </div>
                                            {!! $errors->first('unit_price', '<p class="help-block" style="color:red">:message</p>') !!}
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="card-number" class="form-label">Giá khuyến mãi : </label>
                                            <div class="input-group">
                                                <input type="text" name="promotion_price" value="{{$product->promotion_price}}" class="form-control">
                                                <span class="input-group-addon" style="background-color: #403838;color: white">VNĐ</span>
                                            </div>

                                            {!! $errors->first('promotion_price', '<p class="help-block" style="color:red">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="card-number" class="form-label">Số lượng :</label>
                                            <input  name="unit" value="{{$product->unit}}"  type="text" class="form-control">
                                            {!! $errors->first('unit', '<p class="help-block" style="color:red">:message</p>') !!}
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="card-number" class="form-label">Thời gian bảo hành :</label>
                                            <input  name="guarantee" value="{{$product->guarantee}}"  type="text" class="form-control">
                                            {!! $errors->first('guarantee', '<p class="help-block" style="color:red">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="card-number" class="form-label">Nhà sản xuất/Nơi sản xuất :</label>
                                            <input  name="trademark" value="{{$product->trademark}}" type="text" class="form-control">
                                            {!! $errors->first('trademark', '<p class="help-block" style="color:red">:message</p>') !!}
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="card-number" class="form-label">Hàng : </label>
                                            <select name="parent_id" class="form-control required">
                                                @foreach($news as $new)
                                                <option value="{{$new->new}}"{{ ( $new->new == $product->new ) ? 'selected' : '' }}>
                                                    {{$new->productnew}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="card-number" class="form-label">Video hướng dẫn :</label>
                                            <input  value="{{$product->video}}" name="video" placeholder="Vui lòng nhập ID video vào đây. Ví dụ:YM99ZB8I2gw"  type="text" class="form-control">
                                            {!! $errors->first('video', '<p class="help-block" style="color:red">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-success btn-block button-sumit" value="Sửa">
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