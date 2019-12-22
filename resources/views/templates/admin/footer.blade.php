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
            $(function(){
                $('#cate').on('change',function(){
                    $('#form-search').submit();
                });
            });
        </script>
        <script>
            $(function(){
                $('#cate1').on('change',function(){
                    $('#form-search').submit();
                });
            });
        </script>
        <script>
            $('#edit').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var title = button.data('mytitle')
                var id_send = button.data('id')
                // var title1 = button.data('mytitle1')// Extract info from data-* attributes

                var modal = $(this)

                modal.find('.modal-body #title').val(title)
                modal.find('.modal-body #id_send').val(id_send)
                // modal.find('.modal-body #title1').val(title1)
            })
        </script>
        <script type="text/javascript">

            function trangthai(id,trangthai){
                $.ajax({
                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    },
                    url: "{{route('trangthai')}}",
                    type: 'POST',  // POST or GET
                    cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
                    data: {
                        aId: id,
                        aTrangthai: trangthai
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
            $(document).ready(function(){

                /* 1. Visualizing things on Hover - See next part for action on click */
                $('#stars li').on('mouseover', function(){
                    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

                    // Now highlight all the stars that's not after the current hovered star
                    $(this).parent().children('li.star').each(function(e){
                        if (e < onStar) {
                            $(this).addClass('hover');
                        }
                        else {
                            $(this).removeClass('hover');
                        }
                    });

                }).on('mouseout', function(){
                    $(this).parent().children('li.star').each(function(e){
                        $(this).removeClass('hover');
                    });
                });


                /* 2. Action to perform on click */
                $('#stars li').on('click', function(){
                    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                    var stars = $(this).parent().children('li.star');

                    for (i = 0; i < stars.length; i++) {
                        $(stars[i]).removeClass('selected');
                    }

                    for (i = 0; i < onStar; i++) {
                        $(stars[i]).addClass('selected');
                    }

                    // JUST RESPONSE (Not needed)
                    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
                    var msg = ratingValue;
                    responseMessage(msg);

                });


            });
        </script>
        <script>
            function responseMessage(msg) {
                $('.success-box').fadeIn(200);
                $('.success-box div.text-message').html("<span>" + msg + "</span>");

                    l = msg;
                    $.ajax({
                        headers: {

                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        },
                        url: "{{route('danh-gia-sao')}}",
                        type: 'POST',  // POST or GET
                        data: {
                            mess: l,
                            bid: bid

                        },
                        success: function (data) { // dữ liệu lấy qua biến data
                            alert(data);
                        }
                    })
                return false;
            }
        </script>
</body>
</html>