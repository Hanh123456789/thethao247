<?php

namespace App\Http\Controllers\TheThao;

use App\Models\Carts;
use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SellController extends Controller
{
    public function index(){
        $producttypes =ProductType::get();
        if (isset(Auth::user()->id)){
            $id_user = Auth::user()->id;
            $cart_header = Carts::where('id_user',$id_user)->get();
        }else{
            $cart_header = "";
        }
        return view('thethao.sell.index',compact('producttypes','cart_header'));
    }
    public function chinhsachbaomat(){
        $producttypes =ProductType::get();
        if (isset(Auth::user()->id)){
            $id_user = Auth::user()->id;
            $cart_header = Carts::where('id_user',$id_user)->get();
        }else{
            $cart_header = "";
        }
        return view('thethao.sell.chinhsachbaomat',compact('producttypes','cart_header'));
    }
    public function chinhsachbaohanh(){
        $producttypes =ProductType::get();
        if (isset(Auth::user()->id)){
            $id_user = Auth::user()->id;
            $cart_header = Carts::where('id_user',$id_user)->get();
        }else{
            $cart_header = "";
        }
        return view('thethao.sell.chinhsachbaohanh',compact('producttypes','cart_header'));
    }
    public function chinhsachdoitra(){
        $producttypes =ProductType::get();
        if (isset(Auth::user()->id)){
            $id_user = Auth::user()->id;
            $cart_header = Carts::where('id_user',$id_user)->get();
        }else{
            $cart_header = "";
        }
        return view('thethao.sell.chinhsachdoitra',compact('producttypes','cart_header'));
    }
    public function chinhsachvanchuyen(){
        $producttypes =ProductType::get();
        if (isset(Auth::user()->id)){
            $id_user = Auth::user()->id;
            $cart_header = Carts::where('id_user',$id_user)->get();
        }else{
            $cart_header = "";
        }
        return view('thethao.sell.chinhsachvanchuyen',compact('producttypes','cart_header'));
    }
    public function baomatcanhan(){
        $producttypes =ProductType::get();
        if (isset(Auth::user()->id)){
            $id_user = Auth::user()->id;
            $cart_header = Carts::where('id_user',$id_user)->get();
        }else{
            $cart_header = "";
        }
        return view('thethao.sell.baomatcanhan',compact('producttypes','cart_header'));
    }
    public function quydinhsudung(){
        $producttypes =ProductType::get();
        if (isset(Auth::user()->id)){
            $id_user = Auth::user()->id;
            $cart_header = Carts::where('id_user',$id_user)->get();
        }else{
            $cart_header = "";
        }
        return view('thethao.sell.quydinhsudung',compact('producttypes','cart_header'));
    }
    public function camketkhachhang(){
        $producttypes =ProductType::get();
        if (isset(Auth::user()->id)){
            $id_user = Auth::user()->id;
            $cart_header = Carts::where('id_user',$id_user)->get();
        }else{
            $cart_header = "";
        }
        return view('thethao.sell.camketkhachhang',compact('producttypes','cart_header'));
    }
    public function huongdandathang(){
        $producttypes =ProductType::get();
        if (isset(Auth::user()->id)){
            $id_user = Auth::user()->id;
            $cart_header = Carts::where('id_user',$id_user)->get();
        }else{
            $cart_header = "";
        }
        return view('thethao.sell.huongdandathang',compact('producttypes','cart_header'));
    }
    public function huongdanmuahang(){
        $producttypes =ProductType::get();
        if (isset(Auth::user()->id)){
            $id_user = Auth::user()->id;
            $cart_header = Carts::where('id_user',$id_user)->get();
        }else{
            $cart_header = "";
        }
        return view('thethao.sell.huongdanmuahang',compact('producttypes','cart_header'));
    }
    public function phuongthucthanhtoan(){
        $producttypes =ProductType::get();
        if (isset(Auth::user()->id)){
            $id_user = Auth::user()->id;
            $cart_header = Carts::where('id_user',$id_user)->get();
        }else{
            $cart_header = "";
        }
        return view('thethao.sell.phuongthucthanhtoan',compact('producttypes','cart_header'));
    }
}
