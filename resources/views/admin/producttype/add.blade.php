@extends('templates.admin.master')
@section('title','Thêm loại sản phẩm')
@section('main')
    <div class="product-cart-area mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-cart-inner">
                        <div id="example-basic">
                            <section>
                                <h3 style="color: #3ce414">Thêm Danh Mục</h3>
                                <h3 class="product-cart-dn"></h3>
                                <form action="{{route('post_add_product_type_admin')}}" method="post">
                                    <input name="_method" value="PUT" type="hidden">
                                    {{ csrf_field() }}
                                    <div class="product-delivary">
                                        <div class="form-group">
                                            <label for="card-number" class="form-label">Tên danh mục</label>
                                            <input  name="name" type="text" class="form-control">
                                            {!! $errors->first('name', '<p class="help-block" style="color:red">:message</p>') !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="card-number" class="form-label">Danh mục cha</label>
                                            <select name="parent_id" class="form-control required">
                                                <option value="0">Không</option>
                                                @foreach($producttypes as $producttype)
                                                    <option value="{{$producttype->id}}">
                                                        {{$producttype->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block button-sumit">Thêm</button>
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