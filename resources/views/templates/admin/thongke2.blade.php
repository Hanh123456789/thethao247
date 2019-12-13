@include('templates.admin.header')
@include('templates.admin.leftbar')
@include('templates.admin.header1')
@yield('main')
<div class="footer-copyright-area">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="footer-copy-right">
          <p>Copyright &copy; 2019 <a href="https://colorlib.com/wp/templates/">Thethao247.holaku.vn</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- jquery
    ============================================ -->
<script src="/public/admin/js/vendor/jquery-1.11.3.min.js"></script>
<script src="/public/admin/js/bootstrap.min.js"></script>
<script src="/public/admin/js/jquery.sticky.js"></script>
<script src="/public/admin/js/canvasjs.min.js"></script>
<script src="/public/admin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/public/admin/js/scrollbar/mCustomScrollbar-active.js"></script>s
<script src="/public/admin/js/data-table/bootstrap-table.js"></script>
<script>
    function goBack() {
        window.history.back()
    }
</script>
<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<script>
    function closecustomBox() {
        $('#msg').hide();
    }
    setTimeout(function() {
        closecustomBox();
    }, 2000)
</script>

<script src="/public/ckeditor/ckeditor.js"></script>
<script>CKEDITOR.replace( 'editor1', {
        filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    } ); </script>
<script type="text/javascript">

    function DeleteNew(id){
        $.ajax({
            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            },
            url: "{{route('delete_new_product')}}",
            type: 'POST',  // POST or GET
            cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
            data: {
                aId: id
            },
            success: function(data){ // dữ liệu lấy qua biến data

                $('.rs-'+id).html(data);
            },

            error: function (){
                alert('Có lỗi xảy ra');
            }
        });
        return false;
    }
</script>
<script type="text/javascript">


    $(document).ready(function() {

        $(".add-images").click(function(){
            var html = $(".clone").html();
            $(".increment").after(html);
        });

        $("body").on("click",".remove-images",function(){
            $(this).parents(".control-group ").remove();
        });

    });

</script>
<script type="text/javascript">

    function unlockcustomer(id){
        $.ajax({
            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            },
            url: "{{route('customer_unlock')}}",
            type: 'POST',  // POST or GET
            cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
            data: {
                aId: id
            },
            success: function(data){ // dữ liệu lấy qua biến data

                $('.rs-'+id).html(data);
            },

            error: function (){
                alert('Có lỗi xảy ra');
            }
        });
        return false;
    }
</script>
<script>
    $('.date_plans').on('change', function(){
        $('#form-plans').submit();
    });
</script>
<script>
    window.onload = function () {
        var a = Array({{$sarrso}});
        if (a==""){
            alert('Không có sản phẩm nào')
        } else {
            var b = "{{$sarrname}}";
            var c = b.split(',');
            var dataPoint = [];
            for (var i = 1; i <= a.length; i++) {
                dataPoint.push({x: i, y: a[i - 1], label: c[i - 1]})
            }
            var d = Array({{$sarrsodoanhthu}});
            var e = "{{$sarrnamedoanhthu}}";
            var f = e.split(',');
            var dataPoint1 = [];
            for (var i = 1; i <= d.length; i++) {
                dataPoint1.push({x: i, y: d[i - 1], label: f[i - 1]})
            }
            var chart2 = new CanvasJS.Chart("chartContainer",
                {
                    title: {
                        fontColor: 'blue',
                        fontFamily: '"Play", sans-serif',
                        text: "Sản phẩm bán chạy"
                    },
                    axisY: {
                        title: "Số lượng đặt hàng",
                        fontSize: 14,
                        fontColor: 'blue',

                    },
                    legend: {
                        verticalAlign: "bottom",
                        horizontalAlign: "center"
                    },
                    data: [

                        {
                            color: "#17a2b8",
                            type: "column",
                            showInLegend: true,
                            legendMarkerType: "none",
                            legendText: "Tên sản phẩm",
                            dataPoints: dataPoint
                        }
                    ]
                });
            var chart1 = new CanvasJS.Chart("doanhthu",
                {
                    title: {
                        fontColor: 'blue',
                        fontFamily: '"Play", sans-serif',
                        text: "Sản phẩm có doanh thu cao"
                    },
                    axisY: {
                        title: "Doanh thu"
                    },
                    legend: {
                        verticalAlign: "bottom",
                        horizontalAlign: "center"
                    },
                    data: [

                        {
                            color: "#17a2b8",
                            type: "column",
                            showInLegend: true,
                            legendMarkerType: "none",
                            legendText: "Sản phẩm",
                            dataPoints: dataPoint1
                        }
                    ]
                });

            chart1.render();
            chart2.render();
        }
    }
</script>

</body>

</html>