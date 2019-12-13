@extends('templates.admin.master')
@section('title','Loại sản phẩm')
@section('main')
<div class="product-status mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline13-list">
                    <h3>Danh mục sản phẩm</h3>
                    @if(Session::has('msg'))
                    <div id="msg" class="alert alert-success alert-st-one" role="alert">
                        <p class="message-mg-rt">{{Session::get('msg')}}</p>
                    </div>
                    @endif
                    <div class="add-product">
                        <a href="{{route('get_add_product_type_admin')}}">Add</a>
                    </div>
                       <table class="header-table">
                         <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Setting</th>
                        </tr>
                        @foreach($producttypes as $producttype)
                           <tbody class="table-css" id="myTable">
                        <tr>
                            @if($producttype->parent_id==0)
                            <td>{{$producttype->id}}</td>
                            <td>
                             {{$producttype->name}}
                             <?php echo ham($producttypes,$producttype->id) ?>
                         </td>
                         <td>
                            <a href="{{route('get_edit_product_type_admin',$producttype->id)}}" ><button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                            <a href="{{route('delete_product_type_admin',$producttype->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục sản phẩm này?');"><button data-toggle="tooltip" title="Delete" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                        </td>
                        @endif
                        </tr>
                            </tbody>
                    @endforeach
                </table>
                <?php
                function ham($producttypes,$cat_id) {
                    foreach($producttypes as $producttype){
                        if($producttype->parent_id==$cat_id){
                            $urlEdit = route('get_edit_product_type_admin',$producttype->id);
                            $urlDel  = route('delete_product_type_admin', $producttype->id);
                            echo "<ul style='padding-left: 15px'>";
                            echo "<li>";
                            echo "{$producttype->name}";
                            ?>
                            <a href="{{$urlEdit}}" ><i style="margin-left: 5px" class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            || <a href="{{$urlDel}}" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục sản phẩm này ?');"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            <?php
                            ham($producttypes,$producttype->id);
                            echo "</li>";
                            echo "</ul>";
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
@stop
