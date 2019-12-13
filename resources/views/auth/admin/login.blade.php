<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>ADMIN | THETHAO247</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon
      ============================================ -->
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  <!-- Google Fonts
      ============================================ -->
  <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
  <!-- Bootstrap CSS
      ============================================ -->
  <link rel="stylesheet" href="/public/admin/css/bootstrap.min.css">
  <!-- Bootstrap CSS
      ============================================ -->
  <link rel="stylesheet" href="/public/admin/css/font-awesome.min.css">
  <!-- owl.carousel CSS
      ============================================ -->
  <link rel="stylesheet" href="/public/admin/css/owl.carousel.css">
  <link rel="stylesheet" href="/public/admin/css/owl.theme.css">
  <link rel="stylesheet" href="/public/admin/css/owl.transitions.css">
  <!-- animate CSS
      ============================================ -->
  <link rel="stylesheet" href="/public/admin/css/animate.css">
  <!-- normalize CSS
      ============================================ -->
  <link rel="stylesheet" href="/public/admin/css/normalize.css">
  <!-- meanmenu icon CSS
      ============================================ -->
  <link rel="stylesheet" href="/public/admin/css/meanmenu.min.css">
  <!-- main CSS
      ============================================ -->
  <link rel="stylesheet" href="/public/admin/css/main.css">
  <!-- morrisjs CSS
      ============================================ -->
  <link rel="stylesheet" href="/public/admin/css/morrisjs/morris.css">
  <!-- mCustomScrollbar CSS
      ============================================ -->
  <link rel="stylesheet" href="/public/admin/css/scrollbar/jquery.mCustomScrollbar.min.css">
  <!-- metisMenu CSS
      ============================================ -->
  <link rel="stylesheet" href="/public/admin/css/metisMenu/metisMenu.min.css">
  <link rel="stylesheet" href="/public/admin/css/metisMenu/metisMenu-vertical.css">
  <!-- calendar CSS
      ============================================ -->
  <link rel="stylesheet" href="/public/admin/css/calendar/fullcalendar.min.css">
  <link rel="stylesheet" href="/public/admin/css/calendar/fullcalendar.print.min.css">
  <!-- style CSS
      ============================================ -->
  <link rel="stylesheet" href="/public/admin/css/style.css">
  <!-- responsive CSS
      ============================================ -->
  <link rel="stylesheet" href="/public/admin/css/responsive.css">
  <!-- modernizr JS
      ============================================ -->
  <script src="/public/admin/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<div class="color-line"></div>
<div class="container-fluid " style="margin-top: 40px">
  <div class="row">

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
    <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
      <div class="text-center m-b-md custom-login">
        @if(Session::has('msg'))
          <div id="msg" class="alert alert-success alert-st-one" role="alert">
            <p style="font-size: 18px;color: #0B792F;" class="message-mg-rt">{{Session::get('msg')}}</p>
          </div>
        @endif
        <h3 style="color: red">Đăng Nhập</h3>
      </div>
      <div class="hpanel">
        <div class="panel-body">
          <form action="{{route('post_admin_login')}}" id="loginForm" method="post">
            <input name="_method" value="PUT" type="hidden">
            @csrf
            <div class="form-group">
              <label class="control-label" for="username">Email</label>
              <input type="email" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="email" id="username" class="form-control">
              <span class="help-block small">Your unique email to app</span>
            </div>
            <div class="form-group">
              <label class="control-label" for="password">Password</label>
              <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
              <span class="help-block small">Your password</span>
            </div>
            <div class="row">
              <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
                <a href="{{route('forget_pass_admin')}}" class="floatright" style="margin-top: 0px;margin-bottom: 5px"><span style="color: deepskyblue;font-size: 15px;">Quên mật khẩu</span></a>
              </div>
            </div>
            <button class="btn btn-success btn-block loginbtn">Login</button>
          </form>

        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
  </div>
</div>
<!-- jquery
    ============================================ -->
<script src="/public/admin/js/vendor/jquery-1.11.3.min.js"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="/public/admin/js/bootstrap.min.js"></script>
<!-- wow JS
    ============================================ -->
<script src="/public/admin/js/wow.min.js"></script>
<!-- price-slider JS
    ============================================ -->
<script src="/public/admin/js/jquery-price-slider.js"></script>
<!-- meanmenu JS
    ============================================ -->
<script src="/public/admin/js/jquery.meanmenu.js"></script>
<!-- owl.carousel JS
    ============================================ -->
<script src="/public/admin/js/owl.carousel.min.js"></script>
<!-- sticky JS
    ============================================ -->
<script src="/public/admin/js/jquery.sticky.js"></script>
<!-- scrollUp JS
    ============================================ -->
<script src="/public/admin/js/jquery.scrollUp.min.js"></script>
<!-- mCustomScrollbar JS
    ============================================ -->
<script src="/public/admin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/public/admin/js/scrollbar/mCustomScrollbar-active.js"></script>
<!-- metisMenu JS
    ============================================ -->
<script src="/public/admin/js/metisMenu/metisMenu.min.js"></script>
<script src="/public/admin/js/metisMenu/metisMenu-active.js"></script>
<!-- morrisjs JS
    ============================================ -->
<script src="/public/admin/js/sparkline/jquery.sparkline.min.js"></script>
<script src="/public/admin/js/sparkline/jquery.charts-sparkline.js"></script>
<!-- calendar JS
    ============================================ -->
<script src="/public/admin/js/calendar/moment.min.js"></script>
<script src="/public/admin/js/calendar/fullcalendar.min.js"></script>
<script src="/public/admin/js/calendar/fullcalendar-active.js"></script>
<!-- tab JS
    ============================================ -->
<script src="/public/admin/js/tab.js"></script>
<!-- wizard JS
    ============================================ -->
<script src="/public/admin/js/wizard/jquery.steps.js"></script>
<!-- plugins JS
    ============================================ -->
<script src="/public/admin/js/plugins.js"></script>
<!-- main JS
    ============================================ -->
<script src="/public/admin/js/main.js"></script>
</body>

</html>