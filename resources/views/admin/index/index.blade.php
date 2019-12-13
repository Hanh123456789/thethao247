@extends('templates.admin.master')
@section('title','Trang chủ')
@section('main')
<div class="trangchu">
  <div class="trangchu1">
     <div class="trangchu2">
       <p class="chutrangchu">Trang chủ</p>
     </div>
     <div class="row" style="margin-right: 5%;margin-left: 10%">
     <div class="col-md-3">
       <img class="anh" src="css/img/nb_nha_dau_tu.png">
       <p class="so">{{count($khachhang)}}</p>
       <p class="ten">Khách hàng</p>
     </div>
       <div class="col-md-3">
         <img class="anh" src="css/img/nb_y_tuong.png">
         <p class="so">{{count($nhanvien)}}</p>
         <p class="ten">Thành viên</p>
       </div>
       <div class="col-md-3">
         <img class="anh" src="css/img/nb_startup.png">
         <p class="so">{{count($tintuc)}}</p>
         <p class="ten" style="margin-left: 27px">Tin tức</p>
       </div>
       <div class="col-md-3">
         <img class="anh" src="css/img/nb_quy_dau_tu.png">
         <p class="so">{{count($lienhe)}}</p>
         <p class="ten" style="margin-left: 27px">Liên Hệ</p>
       </div>
     </div>
   </div>
</div>
@stop