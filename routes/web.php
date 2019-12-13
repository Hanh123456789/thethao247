<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::pattern('slug','(.*)');
Route::pattern('id','([0-9]*)');
//login admin
Route::get('khoa-tai-khoan','LockController@index')->name('lock_tai_khoan');
Route::get('admin/login','Auth\LoginAdminController@getLogin')->name('login_path_admin');
Route::put('admin/login','Auth\LoginAdminController@postLogin')->name('post_admin_login');
Route::get('admin/forgetpassword','Auth\LoginAdminController@getForget')->name('forget_pass_admin');
Route::put('admin/forgetpassword','Auth\LoginAdminController@postForget')->name('post_forget_pass_admin');
Route::get('admin/resetpassword/{token}','Auth\LoginAdminController@getReset')->name('reset_pass_admin');
Route::put('admin/resetpassword/{token}','Auth\LoginAdminController@postReset')->name('post_reset_pass_admin');
Route::get('admin/logout','Auth\LoginAdminController@logout')->name('logout_path_admin');
Route::get('admin/thong-tin-tai-khoan','Admin\AdminController@thongtin')->name('thongtintaikhoanadmin');
Route::get('admin/sua-thong-tin-tai-khoan','Admin\AdminController@sua')->name('suathongtin');
Route::post('admin/sua-thong-tin-tai-khoan','Admin\AdminController@postsua')->name('postsuathongtin');
Route::group([
	'middleware' => 'admin',
], function () {
    Route::get('/admin/trangchu','Admin\AdminController@trangchu')->name('trangchu');
    Route::get('/admin/mo-khoa-thanh-vien','Admin\AdminController@unlockadmin')->name('get_unlock_admin');
    Route::put('/admin/mo-khoa-thanh-vien','Admin\AdminController@postunlockadmin')->name('post_unlock_admin');
    Route::get('/admin/khoa-thanh-vien','Admin\AdminController@lockadmin')->name('get_lock_admin');
    Route::put('/admin/khoa-thanh-vien','Admin\AdminController@postlockadmin')->name('post_lock_admin');
	Route::get('/admin/thanhvien','Admin\AdminController@index')->name('member_index');
	Route::get('/admin/them-thanh-vien','Admin\AdminController@create')->name('get_add_member_admin');
	Route::put('/admin/them-thanh-vien','Admin\AdminController@store')->name('post_add_member_admin');
	Route::get('/admin/sua-thanh-vien/{id}','Admin\AdminController@edit')->name('get_edit_member_admin')->where('id', '[0-9]+');
	Route::put('/admin/sua-thanh-vien/{id}','Admin\AdminController@update')->name('post_edit_member_admin')->where('id', '[0-9]+');
	Route::get('/admin/thanhvien/{id}','Admin\AdminController@destroy')
	->name('delete_member_admin')->where('id', '[0-9]+');
	Route::get('/admin/danh-muc-san-pham','Admin\ProductTypeController@index')->name('product_type_index');
	Route::get('/admin/danh-muc-san-pham/them-danh-muc-san-pham','Admin\ProductTypeController@create')->name('get_add_product_type_admin');
	Route::put('/admin/danh-muc-san-pham/them-danh-muc-san-pham','Admin\ProductTypeController@store')->name('post_add_product_type_admin');
	Route::get('/admin/danh-muc-san-pham/sua-danh-muc-san-pham/{id}','Admin\ProductTypeController@edit')->name('get_edit_product_type_admin')->where('id','[0-9]+');
	Route::put('/admin/danh-muc-san-pham/sua-danh-muc-san-pham/{id}','Admin\ProductTypeController@update')->name('post_edit_product_type_admin')->where('id','[0-9]+');
    Route::get('/admin/danh-muc-san-pham/xoa-danh-muc-san-pham/{id}','Admin\ProductTypeController@destroy')->name('delete_product_type_admin')->where('id','[0-9]+');

    Route::get('/admin/san-pham','Admin\ProductController@index')->name('product_index');
    Route::get('/admin/san-pham/them-san-pham','Admin\ProductController@create')->name('get_add_product_admin');
    Route::put('/admin/san-pham/them-san-pham','Admin\ProductController@store')->name('post_add_product_admin');
    Route::get('/admin/san-pham/sua-san-pham/{id}','Admin\ProductController@edit')->name('get_edit_product_admin')->where('id','[0-9]+');
    Route::put('/admin/san-pham/sua-san-pham/{id}','Admin\ProductController@update')->name('post_edit_product_admin')->where('id','[0-9]+');
    Route::get('/admin/san-pham/xoa-san-pham/{id}','Admin\ProductController@destroy')->name('delete_product_admin')->where('id','[0-9]+');
    Route::post('/admin/san-pham/xoa_trangthai_new','Admin\ProductController@deletenew')->name('delete_new_product');

    //Bill
    Route::get('/admin/hoa-don','Admin\BillController@index')->name('bill_index');
    Route::get('/admin/hoa-don/chi-tiet-hoa-don/{id}','Admin\BillController@detail')->name('bill_detail')->where('id','[0-9]+');
    Route::get('/admin/hoa-don/huy-don-hang/{id}','Admin\BillController@deletetotal')->name('huydonhangtongadmin')->where('id','[0-9]+');
    Route::get('/admin/xoa-hoa-don/{id}','Admin\BillController@destroy')->name('bill_delete')->where('id','[0-9]+');
    //Khách hàng
    Route::get('/admin/khach-hang','Admin\CustomerController@index')->name('customer_index');
    Route::get('/admin/xoa-khach-hang/{id}','Admin\CustomerController@destroy')->name('customer_del')->where('id','[0-9]+');
    Route::get('/admin/khach-hang/khoa-khach','Admin\CustomerController@lockcustomer')->name('customer_lock');
    Route::put('/admin/khach-hang/khoa-khach','Admin\CustomerController@postlockcustomer')->name('post_customer_lock');
    Route::post('/admin/khach-hang/mo-khoa-khach','Admin\CustomerController@unlockcustomer')->name('customer_unlock');

    //Tin-tuc
    Route::get('/admin/tin-tuc','Admin\NewsController@index')->name('new_index');
    Route::get('/admin/tin-tuc/them-tin-tuc','Admin\NewsController@create')->name('get_add_new');
    Route::put('/admin/tin-tuc/them-tin-tuc','Admin\NewsController@store')->name('post_add_new');
    Route::get('/admin/tin-tuc/sua-tin-tuc/{id}','Admin\NewsController@edit')->name('get_edit_new')->where('id','[0-9]+');
    Route::put('/admin/tin-tuc/sua-tin-tuc/{id}','Admin\NewsController@update')->name('post_edit_new')->where('id','[0-9]+');
    Route::get('/admin/tin-tuc/xoa-tin-tuc/{id}','Admin\NewsController@destroy')->name('delete_new')->where('id','[0-9]+');

    //thống kê
    Route::get('/admin/thongke','Admin\ThongkeController@thongke1')->name('thongke1');
    Route::get('/admin/thongke2','Admin\ThongkeController@thongke2')->name('thongke2');
    Route::get('/admin/thongke3','Admin\ThongkeController@thongke3')->name('thongke3');
    //liên-hệ
    Route::get('/admin/quan-li-lien-he','Admin\ContactController@index')->name('admin.contact.index');
    Route::get('/admin/xoa-lien-he/{id}','Admin\ContactController@destroy')->name('admin.contact.destroy')->where('id','[0-9]+');
    Route::post('/admin/tra-loi','Admin\ContactController@sendcontact')->name('admin.contact.sendcontact');

});

//login user

Route::get('user/login','Auth\LoginController@getLogin')->name('login_path_user');
Route::post('user/login','Auth\LoginController@postLogin')->name('post_user_login');
Route::get('user/register','Auth\LoginController@getregister')->name('get_user_register');
Route::post('user/register','Auth\LoginController@postregister')->name('post_user_register');
Route::get('user/forgetpassword','Auth\LoginController@getForget')->name('forget_pass_user');
Route::post('user/forgetpassword','Auth\LoginController@postForget')->name('post_forget_pass_user');
Route::get('user/resetpassword/{token}','Auth\LoginController@getReset')->name('reset_pass_user');
Route::post('user/resetpassword/{token}','Auth\LoginController@postReset')->name('post_reset_pass_user');
Route::get('user/logout','Auth\LoginController@logout')->name('logout_path_user');
Route::group([
	'middleware' => 'auth',
], function () {
	Route::get('/abc','Admin\AdminController@thu');
});

//thethao

Route::get('/','Thethao\IndexController@index')->name('the_thao_index');
Route::get('/muahang/{id}','Thethao\IndexController@addcart')->name('add_cart')->where('id','[0-9]+');
Route::get('/gio-hang','Thethao\IndexController@cart')->name('cart');
Route::get('/xoa-hang/{id}', 'Thethao\IndexController@delproduct')->name('xoasanpham');
Route::get('/giam/{id}', 'Thethao\IndexController@giam')->name('giam')->where('id','[0-9]+');
Route::post('/them-hang','Thethao\IndexController@addstatus')->name('add_to_cart');
Route::get('/xem-gio-hang/{id}','Thethao\IndexController@getcart')->name('get_cart')->where('id','[0-9]+');
Route::post('/sua-gio-hang','Thethao\IndexController@updatestatus')->name('update_to_cart');
Route::post('/sua-gio-hang1','Thethao\IndexController@updatestatus1')->name('update_to_cart1');
Route::post('/sua-gio-hang2','Thethao\IndexController@updatestatus2')->name('update_to_cart2');
Route::post('/sua-gio-hang3','Thethao\IndexController@updatestatus3')->name('update_to_cart3');
Route::post('/sua-gio-hang4','Thethao\IndexController@updatestatus4')->name('update_to_cart4');
Route::post('/sua-gio-hang5','Thethao\IndexController@updatestatus5')->name('update_to_cart5');
Route::get('/chi-tiet-san-pham/{slug}-{id}','Thethao\IndexController@singleproduct')->name('singleproduct');
Route::get('/danh-muc-san-pham/{slug}-{id}','Thethao\IndexController@categoriproduct')->name('categoriproduct');
Route::get('/thong-tin-ca-nhan/{id}','Thethao\IndexController@profile')->name('profile')->where('id','[0-9]+');
Route::post('/thong-tin-ca-nhan/{id}','Thethao\IndexController@updateprofile')->name('updateprofile')->where('id','[0-9]+');
Route::get('/thanhtoan','Thethao\IndexController@thanhtoan')->name('thanhtoan');
Route::post('/thanhtoandonhang','Thethao\IndexController@dathang')->name('dathang');
Route::post('/thanhtoandonhangngay','Thethao\IndexController@dathangngay')->name('dathangngay');

//Lien-he
Route::get('/lien-he','Thethao\ContactController@index')->name('lienhe');
Route::post('/lien-he','Thethao\ContactController@postcontact')->name('post_lienhe');
//Gioi-thieu
Route::get('/gioi-thieu','Thethao\AboutController@index')->name('gioithieu');
//Chinh-sach-ban-hang
Route::get('/chinh-sach-ban-hang','Thethao\SellController@index')->name('chinhsach');
Route::get('/chinh-sach-ban-hang/chinh-sach-bao-mat','Thethao\SellController@chinhsachbaomat')->name('chinhsachbaomat');
Route::get('/chinh-sach-ban-hang/chinh-sach-bao-hanh','Thethao\SellController@chinhsachbaohanh')->name('chinhsachbaohanh');
Route::get('/chinh-sach-ban-hang/chinh-sach-doi-tra','Thethao\SellController@chinhsachdoitra')->name('chinhsachdoitra');
Route::get('/chinh-sach-ban-hang/chinh-sach-van-chuyen','Thethao\SellController@chinhsachvanchuyen')->name('chinhsachvanchuyen');
Route::get('/chinh-sach-ban-hang/bao-mat-ca-nhan','Thethao\SellController@baomatcanhan')->name('baomatcanhan');
Route::get('/chinh-sach-ban-hang/quy-dinh-su-dung','Thethao\SellController@quydinhsudung')->name('quydinhsudung');
Route::get('/chinh-sach-ban-hang/cam-ket-khach-hang','Thethao\SellController@camketkhachhang')->name('camketkhachhang');
Route::get('/chinh-sach-ban-hang/huong-dan-mua-hang','Thethao\SellController@huongdanmuahang')->name('huongdanmuahang');
Route::get('/chinh-sach-ban-hang/huong-dan-dat-hang','Thethao\SellController@huongdandathang')->name('huongdandathang');
Route::get('/chinh-sach-ban-hang/phuong-thuc-thanh-toan','Thethao\SellController@phuongthucthanhtoan')->name('phuongthucthanhtoan');
//tin-tuc
Route::get('/tin-tuc/','Thethao\NewsController@index')->name('tintuc');
Route::get('/tin-tuc/chi-tiet/{slug}-{id}','Thethao\NewsController@detail')->name('chitiettintuc');
//binh-luan-new
Route::post('/binh-luan-new-1','Thethao\CommentNewController@comment1')->name('binh-luan-new-1');
Route::post('/binh-luan-new-2','Thethao\CommentNewController@comment2')->name('binh-luan-new-2');
Route::post('/binh-luan-product-1','Thethao\CommentProductController@comment1')->name('binh-luan-product-1');
Route::post('/binh-luan-product-2','Thethao\CommentProductController@comment2')->name('binh-luan-product-2');
Route::post('/danh-gia-sao','Thethao\RatingController@danhgia')->name('danh-gia-sao');
Route::get('/mua-hang/{slug}-{id}','Thethao\IndexController@muangay')->name('muangay');
Route::get('/thanh-toan-hang','Thethao\IndexController@thanhtoanngay')->name('thanhtoanngay');
Route::post('/them-yeu-thich','Thethao\LikeProductsController@addlike')->name('themyeuthich');
Route::post('/them-yeu-thich-new','Thethao\LikeProductsController@addlikenew')->name('themyeuthichnew');
Route::post('/yeu-thich-bong-da','Thethao\LikeProductsController@yeuthichbongda')->name('yeuthichbongda');
Route::post('/yeu-thich-may-chay-bo','Thethao\LikeProductsController@yeuthichmaychaybo')->name('yeuthichmaychaybo');
Route::post('/yeu-thich-gym','Thethao\LikeProductsController@yeuthichgym')->name('yeuthichgym');
Route::post('/yeu-thich-xe-dap','Thethao\LikeProductsController@yeuthichxedap')->name('yeuthichxedap');
Route::get('/danh-sach-san-pham-yeu-thich-cua-ban/{scope?}','Thethao\LikeProductsController@list')->name('listsanphamlike');
Route::get('/tim-kiem-san-pham','Thethao\SearchProductController@search')->name('searchsanpham');
Route::get('/don-hang-cua-ban','Thethao\OrderController@index')->name('donhangcuaban');
Route::get('/huy-don-hang-cua-ban/{id}','Thethao\OrderController@deletetotal')->name('huydonhangtong')->where('id','[0-9]+');
Route::get('/chi-tiet-don-hang/{id}','Thethao\OrderController@detailorder')->name('chitietdonhang')->where('id','[0-9]+');
Route::get('/huy-hang-da-dat/{id}','Thethao\OrderController@deletesingle')->name('xoadonhang')->where('id','[0-9]+');
Route::post('/admin/trangthai','Admin\BillController@trangthai')->name('trangthai');
Route::post('/khoang-cach','Thethao\KhoangcachController@khoangcach')->name('khoangcach');
