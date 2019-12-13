@extends('templates.admin.master')
@section('title','Tin tức')
@section('main')
  <div class="product-status mg-tb-15">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="sparkline13-list">
            <div class="sparkline13-hd">
              <h3>Quản lí tin tức</h3>
              @if(Session::has('msg'))
                <div id="msg" class="alert alert-success alert-st-one" role="alert">
                  <p class="message-mg-rt">{{Session::get('msg')}}</p>
                </div>
              @endif
              <div class="add-product">
                <a href="{{route('get_add_new')}}">Add</a>
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
                    <th>Name</th>
                    <th>Images</th>
                    <th>Count</th>
                    <th>Setting</th>
                  </tr>
                  <tbody class="table-css" id="myTable">
                  @php
                    $i=1;
                  @endphp
                  @foreach($news as $new)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$new->name}}</td>
                      <td>
                        <img style="width: 80px;height: 80px;" src="../images/{{$new->images}}">
                      </td>
                      <td>{{$new->count}}</td>
                      <td class="text-center">
                        <a href="{{route('get_edit_new',$new->id)}}" ><button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                        <a href="{{route('delete_new',$new->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục sản phẩm này?');"><button data-toggle="tooltip" title="Delete" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
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
                 {{$news->links()}}
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop