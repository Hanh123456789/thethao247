<?php

namespace App\Http\Controllers\Thethao;

use App\Http\Requests\updateProfileRequest;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Carts;
use App\Models\CommentNew;
use App\Models\CommentProducts;
use App\Models\Images;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Rating;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use Illuminate\Support\Facades\Auth;


class IndexController extends Controller
{
    public function index(){
        $producttypes =ProductType::get();
        $products = Product::with('imagess')->get();
        if (isset(Auth::user()->id)){
            $id_user = Auth::user()->id;
            $cart_header = Carts::where('id_user',$id_user)->get();
        }else{
            $cart_header = "";
        }
        $product_selling =BillDetail::whereHas('bill', function($q){
                $q->where('status','=',1);
            })->select('id_product')->with('product')->orderBy('quantity','DESC')->distinct()->take(10)->get();

        $arr_banchay = [];
        foreach ($product_selling as $product ){
            array_push($arr_banchay,$product->id);
        }
        $product_maychaybodiens = Product::where('id_type',43)->take(8)->get();
        $product_tapgyms  = Product::where('id_type',52)->take(8)->get();
        $product_xedaps = Product::where('id_type',44)->take(8)->get();
        $product_bongdas = Product::where('id_type',58)->take(8)->get();
        $products_news = Product::with('imagess')->where('new',1)->take(10)->get();
    	return view('thethao.index',compact('producttypes','products','cart_header','products_news','product_selling','product_maychaybodiens','product_tapgyms','product_xedaps','product_bongdas'));

    }
    public function addcart($id) {
        $product = Product::find($id);
        Cart::add($id, $product->name,1,$product->unit_price);
        Cart::destroy();
        return redirect()->route('cart');

    }
    public function cart(){
        $detailcarts = Cart::content();
        $producttypes =ProductType::get();
        return view('thethao.cart',compact('detailcarts','producttypes'));
    }
    public function delproduct($id){
        $id_user = Auth::user()->id;
  $product = Carts::where('id_product',$id)->get();
     foreach ($product as $pro){
         $del = Carts::findOrFail($pro->id);
         $del->delete();
     }
     return redirect()->route('get_cart',$id_user);
    }
    public function addstatus(Request $request){
        $id = $request->aId;
       $product = Product::find($id);
        Cart::add($id, $product->name,1,$product->unit_price);
        $id_user = Auth::user()->id;
        $data = [
            'id_user'=>$id_user ,
            'id_product'=>$id
        ];
        Carts::create($data);
    $cart = Carts::where('id_user',$id_user)->get();
    $count = count($cart);
    echo $count;

    }
    public function getcart($id){

        $cartss = Carts::with('user','product')->where('id_user',$id)->orderBy('id','DESC')->get();
        $cart = [];
        $item = [];
       foreach ($cartss as $carts){
           if (in_array($carts->product->id, $item)){

           }else {
               array_push($item, $carts->product->id);
               array_push($cart, $carts);
           }

       }
       $soluong = Carts::where('id_user',$id)->get();
        $arrso =[];
       foreach ($soluong as $so){
           $sol = $so->id_product;
           array_push($arrso, $sol);
       }
       $producttypes =ProductType::get();
        $arrsoluong = array_count_values($arrso);
        if (isset(Auth::user()->id)){
            $id_user = Auth::user()->id;
            $cart_header = Carts::where('id_user',$id_user)->get();
        }else{
            $cart_header = "";
        }
        return view('thethao.cart',compact('cart', 'arrsoluong','producttypes','cart_header'));
    }
    public function updatestatus(Request $request){
          $id_pro =$request->aId;
          $soluong =$request->soLuong;
          $soluong = $soluong+1;
          $products = Product::findOrFail($id_pro);
          if ($products->promotion_price != 0) {
              $price = $products->promotion_price;
          }else{
              $price = $products->unit_price;
          }
          $id_user = Auth::user()->id;
          $data = [
              'id_user'=>$id_user,
              'id_product'=>$id_pro
          ];
          Carts::create($data);
        echo number_format($price*$soluong);
    }
    public function updatestatus1(Request $request){
        $id_pro =$request->aId;
        $soluong =$request->soLuong;
        $tongtien = $request->tongTien;
        $soluong = $soluong+1;
        $products = Product::findOrFail($id_pro);
        if ($products->promotion_price != 0) {
            $price = $products->promotion_price;
        }else{
            $price = $products->unit_price;
        }
        echo number_format($tongtien+$price),'-', $tongtien+$price;
    }
    public function updatestatus2(Request $request){
        $cart = $request->cartSl;
        $cartsl =$cart+1;
        echo $cartsl;
    }
    public function updatestatus3(Request $request){
        $id_pro =$request->aId;
        $soluong =$request->soLuong;
        $soluong = $soluong-1;
        $products = Product::findOrFail($id_pro);
        if ($products->promotion_price != 0) {
            $price = $products->promotion_price;
        }else{
            $price = $products->unit_price;
        }
        $delpro = Carts::where('id_product',$id_pro)->first();
        $delpro->delete();
        echo number_format($price*$soluong);
    }
    public function updatestatus4(Request $request){
        $id_pro =$request->aId;
        $soluong =$request->soLuong;
        $tongtien = $request->tongTien;
        $products = Product::findOrFail($id_pro);
        if ($products->promotion_price != 0) {
            $price = $products->promotion_price;
        }else{
            $price = $products->unit_price;
        }
        echo number_format($tongtien-$price),'-', $tongtien-$price;
    }
    public function updatestatus5(Request $request){
        $cart = $request->cartSl;
        $cartsl =$cart-1;
        echo $cartsl;
    }

    public function singleproduct($str,$id){

        $producttypes =ProductType::get();
        if (isset(Auth::user()->id)){
            $id_user = Auth::user()->id;
            $cart_header = Carts::where('id_user',$id_user)->get();
            $start_id = Rating::where('id_user',$id_user)->where('id_product',$id)->first();

            if(isset($start_id)){
                $start = $start_id->vote;
            }else{
                $start = "";
            }
            $userhave = Bill::where('id_customer',$id_user)->get();
            $haha = false;
            foreach ($userhave as $user){
                $id_bill = BillDetail::where('id_bill',$user->id)->where('id_product',$id)->first();
                if (isset($id_bill)){
                    $haha = true;
                }
            }
        }else{
            $haha = false;
            $cart_header = "";
            $start = "";
        }
         $rating = Rating::where('id_product',$id)->avg('vote');

        $count_rating = Rating::where('id_product',$id)->get();
        $product = Product::findOrFail($id);
        $image_product = Images::where('id_product',$id)->first();
        $images_product = Images::where('id_product',$id)->get();
         $product_defirents = Product::where('id_type',$product->id_type)->where('id','!=',$id)->get();
        $comments_parent = CommentProducts::with('product','user')->where('id_parent',0)->where('id_product',$id)->get();
        $comments_con= CommentProducts::with('product','user')->where('id_parent','!=',0)->where('id_product',$id)->get();
        return view('thethao.productsingle',compact('producttypes','product','cart_header','image_product','images_product','product_defirents','comments_con','comments_parent','start','haha','rating','count_rating'));
    }
    public function categoriproduct($str,$id,Request $request){
        $producttypes =ProductType::get();
        if (isset(Auth::user()->id)){
            $id_user = Auth::user()->id;
            $cart_header = Carts::where('id_user',$id_user)->get();
        }else{
            $cart_header = "";
        }

        $query_products = Product::where('id_type',$id);
        if ($request->get('pricesort') == null){
            $products = $query_products;
        }elseif ($request->get('pricesort')=="giamdan"){
            $products=$query_products->orderBy('unit_price','DESC');
        }else{
            $products =$query_products->orderBy('unit_price','ASC');
        }
        if(!is_null($request->get('conhang'))){ $products = $products->where('unit','>',0); }
        if(!is_null($request->get('hangmoi'))){ $products = $products->where('new',1); }
        if(!is_null($request->get('search'))){ $products = $products->where('name','LIKE','%'.$request->search.'%'); }
        if (!is_null($request->get('price'))){
            $gia = $request->price;
            $giasau = explode("-",$gia);
            $from = $giasau[0];
            $to =$giasau[1];
            $giafrom = explode(",",$from);
            $tu = implode($giafrom);
            $giato = explode(",",$to);
            $den= implode($giato);
            $products = $products->whereBetween('unit_price', [$tu,$den]);
        }

        $products = $products
            ->paginate(6)
            ->appends(request()
                ->query());
        return view('thethao.shoplist',compact('producttypes','cart_header','products'));
    }
    public function profile(){
        $producttypes =ProductType::get();
            $id_user = Auth::user()->id;
            $cart_header = Carts::where('id_user',$id_user)->get();
        $user = User::findOrFail($id_user);
        return view('thethao.profile',compact('producttypes','cart_header','user'));
    }
    public function updateprofile(updateProfileRequest $request,$id){
        $data = $request->getData();
        $user = User::findOrFail($id);
        $data['remember_token']=str_random(60);
        if($request->password == ""){
            $data['password']= $user->password;
        }else{
            $data['password']=bcrypt($request->password);
        }

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $filename);
            $data['images'] = $filename;
        }
        $user->update($data);
        return redirect()->route('profile',$id)->with('msg','Cập nhập thông tin thành công');

    }
    public function thanhtoan(){
        $producttypes =ProductType::get();
        $id_user = Auth::user()->id;
        $cart_header = Carts::where('id_user',$id_user)->get();
        $user = User::findOrFail($id_user);
        $cartss = Carts::with('user','product')->where('id_user',$id_user)->get();
        $cart = [];
        $item = [];
        foreach ($cartss as $carts){
            if (in_array($carts->product->id, $item)){

            }else {
                array_push($item, $carts->product->id);
                array_push($cart, $carts);
            }

        }
        $soluong = Carts::where('id_user',$id_user)->get();
        $arrso =[];
        foreach ($soluong as $so){
            $sol = $so->id_product;
            array_push($arrso, $sol);
        };
        $arrsoluong = array_count_values($arrso);
        $total = 0;
       foreach ($cart as $detailcart){
           if($detailcart->product->promotion_price !=0){
               $a = $arrsoluong[$detailcart->id_product]*$detailcart->product->promotion_price;
           }
           else{
               $a = $arrsoluong[$detailcart->id_product]*$detailcart->product->unit_price;
           }
           $total += $a;
       }
        return view('thethao.thanhtoan',compact('producttypes','cart_header','user','total'));
    }
   public function dathang(Request $request){
    if ($request->phone==""){
        return redirect()->back()->with('msg','Số điện thoại không được để trống');
    }
    if (!is_numeric($request->phone)){
        return redirect()->back()->with('msg','Số điện thoại phải là số');
    }
    if ($request->address == ""){
        return redirect()->back()->with('msg','Địa chỉ không được để trống');
    }
       if ($request->km == ""){
           return redirect()->back()->with('msg','Vui lòng kích vào tìm kiếm địa chỉ');
       }
    $id = Auth::user()->id;
    $user = User::findOrFail($id);
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->save();
    $total = $request->total;
    $ship = $request->shipmoney;
    $km = $request->km;
    $date = Carbon::now('Asia/Ho_Chi_Minh');
    $data = [
        'id_customer'=>$id,
        'date_order'=>$date,
        'total'=>$total,
        'status'=>0,
        'shipmoney'=>$ship,
        'km'=>$km,

    ];
     $bill = Bill::create($data);
       $producttypes =ProductType::get();
       $cart_header = Carts::where('id_user',$id)->get();
       $cartss = Carts::with('user','product')->where('id_user',$id)->get();
       $cart = [];
       $item = [];
       foreach ($cartss as $carts){
           if (in_array($carts->product->id, $item)){

           }else {
               array_push($item, $carts->product->id);
               array_push($cart, $carts);
           }

       }
       $soluong = Carts::where('id_user',$id)->get();
       $arrso =[];
       foreach ($soluong as $so){
           $sol = $so->id_product;
           array_push($arrso, $sol);
       };
       $arrsoluong = array_count_values($arrso);
       $id_bill = $bill->id;
    foreach ($arrsoluong as $key=>$so){
        $product = Product::findOrFail($key);
        if ($product->promotion_price != 0){
            $gia =$product->promotion_price;
        }else{
            $gia =$product->unit_price;
        }
        $data = [
             'id_bill'=>$id_bill,
            'id_product'=>$key,
            'quantity'=>$so,
            'unit_price'=>$gia*$so,
        ];
        BillDetail::create($data);
        $soluongconlai = $product->unit - $so;
        $sosp = [
            'unit'=>$soluongconlai,
        ];
        $product->update($sosp);
    }
    foreach ($cartss as $delcart){
        $id = $delcart->id;
        $del =Carts::findOrFail($id);
        $del->delete();
    }
       return view('thethao.hoanthanh',compact('producttypes','cart_header','user','total'));
    }
    public function muangay($slug,$id){
        $producttypes =ProductType::get();

        if (isset(Auth::user()->id)){
            $id_user = Auth::user()->id;
            $cart_header = Carts::where('id_user',$id_user)->get();
        }else{
            $cart_header = "";
        }
        $product = Product::findOrFail($id);
        return view('thethao.cartmuangay',compact('producttypes','cart_header','product'));
    }
    public function thanhtoanngay(Request $request){
         $soluong =$request->qtybutton;
          $gia = $request->tonggia;
          $id_product = $request->id_product;
        $producttypes =ProductType::get();
            $id_user = Auth::user()->id;
            $cart_header = Carts::where('id_user',$id_user)->get();
        $user = User::findOrFail($id_user);
        return view('thethao.thanhtoanngay',compact('producttypes','cart_header','gia','user','soluong','id_product'));
    }
    public function dathangngay(Request $request){
        if ($request->phone==""){
            return redirect()->back()->with('msg','Số điện thoại không được để trống');
        }
        if (!is_numeric($request->phone)){
            return redirect()->back()->with('msg','Số điện thoại phải là số');
        }
        if ($request->address == ""){
            return redirect()->back()->with('msg','Địa chỉ không được để trống');
        }
        if ($request->km == ""){
            return redirect()->back()->with('msg','Vui lòng kích vào tìm kiếm địa chỉ');
        }
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        $total = $request->total;
        $ship = $request->shipmoney;
        $km = $request->km;
        $date = Carbon::now();
        $data = [
            'id_customer'=>$id,
            'date_order'=>$date,
            'total'=>$total,
            'status'=>0,
            'shipmoney'=>$ship,
            'km'=>$km,

        ];
        $bill = Bill::create($data);
        $producttypes =ProductType::get();
        $cart_header = Carts::where('id_user',$id)->get();
        $so = $request->soluongdathang;
        $id_product = $request->id_product;
        $id_bill = $bill->id;
            $data1 = [
                'id_bill'=>$id_bill,
                'id_product'=>$id_product,
                'quantity'=>$so,
                'unit_price'=>$total,
            ];
            BillDetail::create($data1);
            $product = Product::findOrFail($id_product);
            $soluongconlai = $product->unit - $so;
            $sosp = [
                'unit'=>$soluongconlai,
            ];
            $product->update($sosp);
        return view('thethao.hoanthanh',compact('producttypes','cart_header','user','total'));
    }
}
