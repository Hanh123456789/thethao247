@extends('templates.admin.master')
@section('title','Khách hàng')
@section('main')
  <div class="product-status mg-tb-15">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="sparkline13-list">
            <div class="sparkline13-hd">
              <h3>Quản lí liên hệ</h3>
              @if(Session::has('sussces'))
                <div id="msg" class="alert alert-info alert-st-one" role="alert">
                  <p class="message-mg-rt">Bạn đã phản hồi thành công !!!</p>
                </div>
              @endif
              <form id="form-search">
                <div class="row">
                  <div class="col-lg-2">
                    <b>Tìm kiếm</b>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <select class="form-control" id="cate" name="status">
                        <option value="">Tất cả</option>
                          <option value="1"
                              @php
                                if (request()->get('status')==1){
                                        echo 'selected';
                                }else{
                                echo "";
                                }
                              @endphp>Chưa liên hệ</option>
                        <option value="2"
                            @php
                              if (request()->get('status')==2){
                                      echo 'selected';
                              }else{
                              echo "";
                              }
                            @endphp>Đã liên hệ</option>
                      </select>
                    </div>
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
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Tiêu đề</th>
                    <th>Nội dung</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                  </tr>
                  <tbody class="table-css" id="myTable">
                  @php
                    $i=1;
                  @endphp
                  @foreach($contacts as $contact)
                    <tr>
                      <td>
                        {{$i++}}
                      </td>
                      <td>
                        {{$contact->name}}
                      </td>
                      <td>
                        {{$contact->phone}}
                      </td>
                      <td>
                        {{$contact->email}}
                      </td>
                      <td>
                        {{$contact->subject}}
                      </td>
                      <td>
                        {{$contact->message}}
                      </td>
                      <td>
                        @if($contact->status ==1)
                          <button type="button" class="btn btn-warning">Chưa liên hệ</button>
                        @else
                          <button type="button" class="btn btn-success">Đã liên hệ</button>
                          @endif
                      </td>
                      <td>
                        <a data-id="{{$contact->id}}" data-mytitle="{{$contact->email}}" data-toggle="modal" data-target="#edit" href="" ><button data-toggle="tooltip" title="Edit" class="btn-info"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></button></a>
                        <a href="{{route('admin.contact.destroy',$contact->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa liên hệ này?');"><button data-toggle="tooltip" title="Delete" class="btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div>
                  {{$contacts->links()}}
                </div>
              </div>
            </div>
            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Gửi liên hệ</h4>
                  </div>

                  <form action="{{route('admin.contact.sendcontact')}}" method="post">
                    @csrf
                    <div class="modal-body">
                      <input type="hidden" id="id_send" name="id" class="form-control">
                      <div class="form-group">
                        <label for="name">Tên email</label>
                        <input disabled  type="text" id="title" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="name">Tiêu đề</label>
                        <input type="text" name="sub" class="form-control" placeholder="Nhập tiêu đề" >
                      </div>
                      <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control" rows="3" name="noidung"></textarea>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      {{--                <button type="button" class="btn btn-primary">Save</button>--}}
                      <input type="submit" value="Gửi" class="btn btn-success" />
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="custom-pagination text-center">
              <nav aria-label="Page navigation example">

              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop