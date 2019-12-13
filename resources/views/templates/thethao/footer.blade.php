
        <!-- START FOOTER AREA -->
        <footer id="footer" class="footer-area">
            <div class="footer-top">
                <div class="container-fluid" style="padding: 0px !important;">
                    <div class="plr-185" style="padding: 0px !important;">
                        <div class="footer-top-inner theme-bg">
                            <div class="row">
                                <div class="col-lg-3 col-md-5 col-sm-4">
                                    <div class="single-footer footer-about">
                                        <div class="footer-logo">
                                            <img src="thethao/img/logo/logo.png" alt="" style="width: 100%">
                                        </div>
                                        <ul class="footer-social">
                                            <li>
                                                <a class="facebook" href="#" title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a class="google-plus" href="#" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a>
                                            </li>
                                            <li>
                                                <a class="twitter" href="#" title="Twitter"><i class="zmdi zmdi-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a class="rss" href="#" title="RSS"><i class="zmdi zmdi-rss"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3 hidden-md hidden-sm">
                                    <div class="single-footer">
                                        <h4 class="footer-title border-left map-view">Liên Hệ</h4>
                                        <ul class="footer-menu">
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span> Địa chỉ: phường Hòa Khánh Bắc,Quận Liên Chiểu,Thành phố Đà Nẵng.</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span style="font-family: Arial, Helvetica, sans-serif">0865556800 - 0386226722</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3 footer-block footer-block-3">
                                    <h4 class="footer-title border-left map-view">MUA HÀNG TRỰC TUYẾN</h4>
                                    <ul class="footer-list-delivery">
                                        <li style="margin-bottom: 5px"><a class="delivery-item ico-delivery-1 borderRadius" title="Tìm và đặt hàng dễ dàng">Tìm và đặt hàng dễ dàng</a></li>
                                        <li style="margin-bottom: 5px"><a class="delivery-item  ico-delivery-2 borderRadius">Giao hàng nhanh nhất</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 footer-block footer-block-3">
                                    <h4 class="footer-title border-left map-view">ĐẢM BẢO CHẤT LƯỢNG</h4>
                                    <ul class="footer-list-delivery">
                                        <li style="margin-bottom: 5px"><a class="delivery-item  ico-delivery-3 borderRadius" title="Hoàn tiền 100% đảm bảo">Hoàn tiền 100% đảm bảo</a></li>
                                        <li style="margin-bottom: 5px"><a class="delivery-item  ico-delivery-4 borderRadius" title="1 đổi 1 trong 15 ngày">1 đổi 1 trong 15 ngày</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom black-bg">
                <div class="container-fluid">
                    <div class="plr-185">
                        <div class="copyright">
                            <div class="row" style="height: 40px;">
                                <div class="col-sm-6 col-xs-12">

                                </div>
                                <div class="col-sm-6 col-xs-12">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END FOOTER AREA -->


    </div>
        <!-- Main js file that contents all jQuery plugins activation. -->
        <script src="thethao/js/vendor/jquery-3.1.1.min.js"></script>
        <script src="thethao/js/bootstrap.min.js"></script>
        <script src="thethao/lib/js/jquery.nivo.slider.js"></script>
        <script src="thethao/js/plugins.js"></script>
        <script src="thethao/js/main.js"></script>
        <script type="text/javascript">
        $(".btn-group, .dropdown").hover(
                        function () {
                            $('>.dropdown-menu', this).stop(true, true).fadeIn("fast");
                            $(this).addClass('open');
                        },
                        function () {
                            $('>.dropdown-menu', this).stop(true, true).fadeOut("fast");
                            $(this).removeClass('open');
                        });
        </script>
            <script>
            $(document).ready(function(){
                $(".add-to-cart").click(function(){
                    var x = document.getElementById("snackbar");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2000);
                });
            });
        </script>
        <script>
            $(document).ready(function(){
                $(".error-zerro").click(function(){
                    var x = document.getElementById("snackbar1");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2000);
                });
            });
        </script>
        <script type="text/javascript">

            function addcart(id){

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('add_to_cart')}}",
                    type: 'POST',  // POST or GET
                    cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
                    data: {
                       aId:id
                    },
                    success: function(data){ // dữ liệu lấy qua biến data
                        $('#haha').html(data);
                    },

                    error: function (){
                        alert('Có lỗi xảy ra');
                    }
                });
                return false;
            }
        </script>
        <script>
            $(document).ready(function() {
                $('#choose-sick').on('change', function() {
                    $('#form-sick').submit();
                });
            });
        </script>

        <script type="text/javascript">

            function haha(id){
                alert(id);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('add_to_cart')}}",
                    type: 'POST',  // POST or GET
                    cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
                    data: {
                        aId:id
                    },
                    success: function(data){ // dữ liệu lấy qua biến data
                        $('#haha').html(data);
                    },

                    error: function (){
                        alert('Có lỗi xảy ra');
                    }
                });
                return false;
            }
        </script>
        <script>
            function add(id) {
                var soluong = parseInt(document.getElementById("soluong-"+id).value);
                var tongtien = parseInt(document.getElementById('tongao').innerHTML);
                var cartsl = parseInt(document.getElementById('haha').innerHTML);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('update_to_cart')}}",
                    type: 'POST',  // POST or GET
                    cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
                    data: {
                        aId: id,
                        soLuong:soluong,
                        tongTien:tongtien,
                    },
                    success: function (data) { // dữ liệu lấy qua biến data
                        $('.cart-'+id).html(data);
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "{{route('update_to_cart1')}}",
                            type: 'POST',  // POST or GET
                            cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
                            data: {
                                aId: id,
                                soLuong:soluong,
                                tongTien:tongtien,
                            },
                            success: function (data) { // dữ liệu lấy qua biến data
                                var index = data.indexOf('-');
                                var data1 = data.slice(0,index);
                                var data2 = data.slice(index+1)
                                $('.hihi123').html(data1);
                                $('#tongao').html(data2);
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    url: "{{route('update_to_cart2')}}",
                                    type: 'POST',  // POST or GET
                                    cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
                                    data: {
                                        aId: id,
                                        soLuong:soluong,
                                        tongTien:tongtien,
                                        cartSl:cartsl
                                    },
                                    success: function (data) { // dữ liệu lấy qua biến data
                                        $('#haha').html(data);
                                    },

                                    error: function () {
                                        alert('Có lỗi xảy ra');
                                    }
                                });
                            },

                            error: function () {
                                alert('Có lỗi xảy ra');
                            }
                        });

                    },

                    error: function () {
                        alert('Có lỗi xảy ra');
                    }
                });
            }

        </script>

        <script>
            function addsub(id) {
                var soluong = parseInt(document.getElementById("soluong-"+id).value);
                var tongtien = parseInt(document.getElementById('tongao').innerHTML);
                var cartsl = parseInt(document.getElementById('haha').innerHTML);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('update_to_cart3')}}",
                    type: 'POST',  // POST or GET
                    cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
                    data: {
                        aId: id,
                        soLuong:soluong,
                        tongTien:tongtien,
                    },
                    success: function (data) { // dữ liệu lấy qua biến data
                        $('.cart-'+id).html(data);
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "{{route('update_to_cart4')}}",
                            type: 'POST',  // POST or GET
                            cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
                            data: {
                                aId: id,
                                soLuong:soluong,
                                tongTien:tongtien,
                            },
                            success: function (data) { // dữ liệu lấy qua biến data
                                var index = data.indexOf('-');
                                var data1 = data.slice(0,index);
                                var data2 = data.slice(index+1);
                                $('.hihi123').html(data1);
                                $('#tongao').html(data2);
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    url: "{{route('update_to_cart5')}}",
                                    type: 'POST',  // POST or GET
                                    cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
                                    data: {
                                        aId: id,
                                        soLuong:soluong,
                                        tongTien:tongtien,
                                        cartSl:cartsl
                                    },
                                    success: function (data) { // dữ liệu lấy qua biến data
                                        $('#haha').html(data);
                                    },

                                    error: function () {
                                        alert('Có lỗi xảy ra');
                                    }
                                });
                            },

                            error: function () {
                                alert('Có lỗi xảy ra');
                            }
                        });

                    },

                    error: function () {
                        alert('Có lỗi xảy ra');
                    }
                });
            }

        </script>
        <script>
            $(document).ready(function() {
                $('#choose-categories').on('change', function() {
                    $('#form-search').submit();
                });
            });
        </script>
        <script>
            $(function(){
                $('#choose-have').on('change',function(){
                    $('#form-search').submit();
                });
            });
        </script>
        <script>
            $(function(){
                $('#choose-new').on('change',function(){
                    $('#form-search').submit();
                });
            });
        </script>
        <script>
            function addmuangay(id) {
                var soluong = parseInt(document.getElementById("soluong-"+id).value);
                var gia = parseInt(document.getElementById('gia').innerHTML);
                var so = soluong+1;
                var giahi = so*gia;
                 var haha =giahi.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
                $("#total").html(haha);
                var inputVal = $('#tonggia').val(giahi);

            }
        </script>
        <script>
            function addsubmuangay(id) {
                var soluong = parseInt(document.getElementById("soluong-"+id).value);
                var gia = parseInt(document.getElementById('gia').innerHTML);
                var so = soluong-1;
                var giahi = so*gia;
                var haha =giahi.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
                $("#total").html(haha);
                var inputVal = $('#tonggia').val(giahi);

            }
        </script>

        <script type="text/javascript">

            function addlike(id,trangthai){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('themyeuthich')}}",
                    type: 'POST',  // POST or GET
                    cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
                    data: {
                        aId:id,
                        aTrangthai:trangthai,
                    },
                    success: function(data){ // dữ liệu lấy qua biến data
                        $('#yeuthich-'+id).html(data);
                    },

                    error: function (){
                        alert('Có lỗi xảy ra');
                    }
                });
                return false;
            }
        </script>
        <script type="text/javascript">

            function addlikenew(id,trangthai){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('themyeuthichnew')}}",
                    type: 'POST',  // POST or GET
                    cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
                    data: {
                        aId:id,
                        aTrangthai:trangthai,
                    },
                    success: function(data){ // dữ liệu lấy qua biến data
                        $('#yeuthichnew-'+id).html(data);
                    },

                    error: function (){
                        alert('Có lỗi xảy ra');
                    }
                });
                return false;
            }
        </script>

        <script>
            function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 8,
                    center: {lat: 16.066708, lng: 108.213120}
                });
                var geocoder = new google.maps.Geocoder();

                document.getElementById('submit').addEventListener('click', function() {
                    geocodeAddress(geocoder, map);
                });
            }

            function geocodeAddress(geocoder, resultsMap) {
                var address = document.getElementById('address').value;
                var tien = document.getElementById('tien').value;
                geocoder.geocode({'address': address}, function(results, status) {

                    if (results[0]) {
                        var lat = results[0].geometry.location.lat ();
                        var lon = results[0].geometry.location.lng ();
                        if (status === 'OK') {
                            resultsMap.setCenter(results[0].geometry.location);
                            var marker = new google.maps.Marker({
                                map: resultsMap,
                                position: results[0].geometry.location
                            });
                        }
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "{{route('khoangcach')}}",
                            type: 'POST',  // POST or GET
                            cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
                            data: {
                                aLat:lat,
                                aLon:lon,
                                aTien:tien,
                            },
                            success: function(data){ // dữ liệu lấy qua biến data
                                var datam = data.split('-')
                                var data1 = datam[0]
                                var data2 = datam[1]
                                var data3 = datam[2]
                                var data4 = datam[3]
                                $('#khoangcach').html(data1);
                                $('#khoangcach1').val(data2);
                                $('#tongtien').html(data3);
                                $('#sokm').val(data4);
                            },

                            error: function (){
                                alert('Có lỗi xảy ra');
                            }
                        });
                        return false;

                    }else{
                        alert("Chúng tôi không tìm thấy địa chỉ bạn nhập vào");
                    }
                });
            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXF9PpYh__77Bse8b-Vb7cBEjW8x34r-E&callback=initMap">
        </script>
        <script>
            $(document).ready(function () {

                $('.uk-icon-angle-down').on('click', function () {

                    $('html, body').animate({
                        scrollTop: $("#section2").offset().top - 240
                    }, 1500);
                });

                var scroll = $(window).scrollTop();
                if (scroll >= 70) {
                    $(".static_header").addClass('active');
                }

                $(window).scroll(function () {
                    var scroll = $(window).scrollTop();

                    if (scroll >= 70) {
                        $(".static_header").addClass('active');
                    } else {
                        $(".static_header").removeClass('active');
                    }
                })
            });
        </script>
        <script type="text/javascript">

            function yeuthichbongda(id,trangthai){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('yeuthichbongda')}}",
                    type: 'POST',  // POST or GET
                    cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
                    data: {
                        aId:id,
                        aTrangthai:trangthai,
                    },
                    success: function(data){ // dữ liệu lấy qua biến data
                        $('#yeuthichbongda-'+id).html(data);
                    },

                    error: function (){
                        alert('Có lỗi xảy ra');
                    }
                });
                return false;
            }
        </script>
        <script type="text/javascript">

            function yeuthichmaychaybo(id,trangthai){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('yeuthichmaychaybo')}}",
                    type: 'POST',  // POST or GET
                    cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
                    data: {
                        aId:id,
                        aTrangthai:trangthai,
                    },
                    success: function(data){ // dữ liệu lấy qua biến data
                        $('#yeuthichmaychaybo-'+id).html(data);
                    },

                    error: function (){
                        alert('Có lỗi xảy ra');
                    }
                });
                return false;
            }
        </script>
        <script type="text/javascript">

            function yeuthichgym(id,trangthai){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('yeuthichgym')}}",
                    type: 'POST',  // POST or GET
                    cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
                    data: {
                        aId:id,
                        aTrangthai:trangthai,
                    },
                    success: function(data){ // dữ liệu lấy qua biến data
                        $('#yeuthichgym-'+id).html(data);
                    },

                    error: function (){
                        alert('Có lỗi xảy ra');
                    }
                });
                return false;
            }
        </script>
        <script type="text/javascript">

            function yeuthichxedap(id,trangthai){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('yeuthichxedap')}}",
                    type: 'POST',  // POST or GET
                    cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
                    data: {
                        aId:id,
                        aTrangthai:trangthai,
                    },
                    success: function(data){ // dữ liệu lấy qua biến data
                        $('#yeuthichxedap-'+id).html(data);
                    },

                    error: function (){
                        alert('Có lỗi xảy ra');
                    }
                });
                return false;
            }
        </script>
        </body>
</html>