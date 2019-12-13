<?php

namespace App\Http\Controllers\TheThao;

use App\Models\Carts;
use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function index(){
        $producttypes =ProductType::get();
        if (isset(Auth::user()->id)){
            $id_user = Auth::user()->id;
            $cart_header = Carts::where('id_user',$id_user)->get();
        }else{
            $cart_header = "";
        }
        return view('thethao.about.index',compact('producttypes','cart_header'));
    }
}
