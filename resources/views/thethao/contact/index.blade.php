@extends('templates.thethao.master')
@section('main')
@section('title','Liên hệ')
  <div class="breadcrumbs-section plr-200 mb-80"style="background: url('thethao/images/bg/contact.jpg');background-size: cover;height:300px;background-repeat: round;">
    <div class="breadcrumbs overlay-bg">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="breadcrumbs-inner">
              <h1 class="breadcrumbs-title" style="color: white;padding: 138px 0 85px !important;">Liên Hệ Với Chúng Tôi</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- BREADCRUMBS SETCTION END -->

  <!-- Start page content -->
  <section id="page-content" class="page-wrapper">

    <!-- ADDRESS SECTION START -->
    <div class="address-section mb-80">
      <div class="container">
        <div class="row">
          <div class="col-sm-4 col-xs-12">
            <div class="contact-address box-shadow">
              <i class="zmdi zmdi-pin"></i>
              <h6>08, Hà Văn Tính, ,phường Hòa Khánh Bắc,</h6>
              <h6>Liên Chiểu, Đà Nẵng</h6>
            </div>
          </div>
          <div class="col-sm-4 col-xs-12">
            <div class="contact-address box-shadow">
              <i class="zmdi zmdi-phone"></i>
              <h6><a href="tel:555-555-1212">086-555-6800</a></h6>
              <h6><a href="tel:555-555-1212">038-622-6722</a></h6>
            </div>
          </div>
          <div class="col-sm-4 col-xs-12">
            <div class="contact-address box-shadow">
              <i class="zmdi zmdi-email"></i>
              <h6>thethao247@gmail.com</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ADDRESS SECTION END -->

    <!-- GOOGLE MAP SECTION START -->
    <div class="google-map-section">
      <div class="container-fluid">
        <div class="google-map plr-185">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4830.4712392786405!2d108.15177076962132!3d16.068199677875455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142192868ca4d4d%3A0x1166c4ac23be8418!2zOCBIw6AgVsSDbiBUw61uaCwgSG_DoCBLaMOhbmggTmFtLCBMacOqbiBDaGnhu4N1LCDEkMOgIE7hurVuZyA1NTAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1575615596997!5m2!1svi!2s" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
      </div>
    </div>
    <!-- GOOGLE MAP SECTION END -->

    <!-- MESSAGE BOX SECTION START -->
    <div class="message-box-section mt--50 mb-80">
      <div class="container">
        @if ($errors->any())
          <div class="alert alert-danger"style="margin-top: 50px">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        @if(Session::has('msg'))
          <div class="alert alert-success"style="margin-top: 50px">
            {{Session::get('msg')}}
          </div>
        @endif
        <div class="row">
          <div class="col-md-12">
            <div class="message-box box-shadow white-bg">
              <form id="contact-form" action="{{route('post_lienhe')}}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <h4 class="blog-section-title border-left mb-30">Gửi Liên Hệ</h4>
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="name" placeholder="Your name here">
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="email" placeholder="Your email here">
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="subject" placeholder="Subject here">
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="phone" placeholder="Your phone here">
                  </div>
                  <div class="col-md-12">
                    <textarea class="custom-textarea" name="message" placeholder="Message"></textarea>
                    <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">Gửi Thông Tin</button>
                  </div>
                </div>
              </form>
              <p class="form-messege"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- MESSAGE BOX SECTION END -->
  </section>
@stop