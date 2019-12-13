@extends('templates.admin.master')
@section('title','Sửa tin tức')
@section('main')
  <div class="product-cart-area mg-tb-15">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="product-cart-inner">
            <div id="example-basic">
              <section>
                <h3 style="color: #3ce414">Sửa Tin Tức</h3>
                <h3 class="product-cart-dn"></h3>
                <form action="{{route('post_edit_new',$new->id)}}" method="post" enctype="multipart/form-data">
                  <input name="_method" value="PUT" type="hidden">
                  @csrf
                  <div class="product-delivary">
                    <div class="row">
                      <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for="card-number" class="form-label">Tên tin : </label>
                        <input  value="{{$new->name}}" name="name" type="text" class="form-control">
                        {!! $errors->first('name', '<p class="help-block" style="color:red">:message</p>') !!}
                      </div>
                    </div>
                    <label>Hình ảnh : </label>
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="" >
                          <input type="file" name="images" class="form-control">
                          {!! $errors->first('images', '<p class="help-block" style="color:red">:message</p>') !!}
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for="card-number" class="form-label">Mô tả : </label>
                        <input  value="{{$new->description}}" name="description" type="text" class="form-control">
                        {!! $errors->first('description', '<p class="help-block" style="color:red">:message</p>') !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Chi tiết : </label>
                      <textarea id = "editor1" name="detail" class="form-control" rows="7">{{$new->detail}}</textarea>
                      {!! $errors->first('detail', '<p class="help-block" style="color:red">:message</p>') !!}
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