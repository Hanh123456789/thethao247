@extends('templates.admin.master')
@section('title','Sản phẩm')
@section('main')
    <div class="data-table-area mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <h3>Sản phẩm</h3>
                            @if(Session::has('msg'))
                                <div id="msg" class="alert alert-success alert-st-one" role="alert">
                                    <p class="message-mg-rt">{{Session::get('msg')}}</p>
                                </div>
                            @endif
                            <div class="add-product">
                                <a href="{{route('get_add_product_admin')}}">Add</a>
                            </div>
                        </div>
                      <form id="form-search">
                      <div class="row">
                        <div class="col-lg-2">
                          <b>Tìm kiếm</b>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <select class="form-control" id="cate" name="catetyppe">
                              <option value="">Tất cả</option>
                            @foreach($typeproducts as $typeproduct)
                              <option value="{{$typeproduct->id}}"
                                  @php
                                if (request()->get('catetyppe')==$typeproduct->id){
                                        echo 'selected';
                                }else{
                                echo "";
                                }
                              @endphp>{{$typeproduct->name}}</option>
                            @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <input class="form-control" value="{{request()->get('search')}}" name="search" type="text" placeholder="Tìm theo tên....">
                        </div>
                      </div>
                      </form>
                          <div class="datatable-dashv1-list custom-datatable-overright">
                                <table id="table" data-toggle="table" >
                                    <thead>
                                    <tr>

                                        <th >STT</th>
                                        <th>Tên</th>
                                        <th>Loại</th>
                                        <th>Giá nhập</th>
                                        <th>Sản phẩm mới</th>
                                        <th>Xuất xứ</th>
                                        <th>Số lượng</th>
                                        <th>Chức năng</th>

                                    </tr>
                                    </thead>
                                    <tbody class="table-css" id="myTable">
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach($products as $product)
                                    <tr>

                                        <td>{{$i++}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->product_type->name}}</td>
                                        <td>{{number_format($product->entry_price)}} đ</td>
                                        <td class="rs-{{$product->id}}">
                                            @if($product->new == 1)
                                                <label style="margin-left: 20%;padding: 10px" class="btn-custon-rounded-four btn-danger">New <a href="javascript:void(0)" onclick="return DeleteNew({{$product->id}})" ><i style="color: white" class="glyphicon glyphicon-remove"></i></a></label>
                                            @endif
                                        </td>
                                        <td>{{$product->trademark}}</td>
                                        <td>{{$product->unit}}</td>

                                        <td class="datatable-ct">
                                          <button data-toggle="modal" data-target="#PrimaryModalalert-{{$product->id}}" class="btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                            <a href="{{route('get_edit_product_admin',$product->id)}}" ><button data-toggle="tooltip" title="Edit" class="btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            <a href="{{route('delete_product_admin',$product->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục sản phẩm này?');"><button data-toggle="tooltip" title="Delete" class="btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                        </td>
                                    </tr>
                            <div id="PrimaryModalalert-{{$product->id}}" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
                                <div class="modal-dialog" style="width: 60%;">
                                    <div class="modal-content">
                                        <div class="content-product mt-2 ml-2">
                                            <h3>{{$product->name}}</h3>
                                            <hr>
                                          <span style="font-weight: bold;" >Hình ảnh : </span>
                                          <div class="row" style="margin-top: 5px">
                                            @foreach($product->imagess as $image)
                                              <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <img src="/public/images/{{$image->images}}" style="width: 200px;height: 200px">
                                              </div>
                                            @endforeach
                                          </div>
                                          <div class="row">
                                          <div class="col-md-6">
                                            <p><span style="font-weight: bold;">Người tạo :</span> {{$product->user->name}}</p>
                                            <p><span style="font-weight: bold;">Loại : </span> {{$product->product_type->name}}</p>
                                          <p><span style="font-weight: bold;">Giá gốc :</span> {{number_format($product->entry_price)}} <span style="font-weight: bold;">đ</span></p>
                                            <p><span style="font-weight: bold;">Giá bán :</span> {{number_format($product->unit_price)}} <span style="font-weight: bold;">đ</span></p>
                                        </div>
                                          <div class="col-lg-6">
                                            @if($product->promotion_price !=0)
                                              <p><span style="font-weight: bold;">Giảm giá :</span> {{number_format($product->promotion_price)}} <span style="font-weight: bold;">đ</span></p>
                                            @endif
                                            <p><span style="font-weight: bold;">Số lượng  :</span> {{$product->unit}}</p>
                                            <p><span style="font-weight: bold;">Thời gian bảo hành : </span> {{$product->guarantee}}</p>
                                          </div>
                                          </div>
                                          <span style="font-weight: bold;">Mô tả : </span>
                                          <div class="description">
                                            {!! $product->description !!}
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a data-dismiss="modal" href="#">Đóng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    @endforeach
                                    </tbody>
                                </table>
                                 <div class="navigation" style="text-align: center">
                                   {{$products->links()}}
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop