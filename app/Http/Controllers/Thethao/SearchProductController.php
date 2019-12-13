<?php

namespace App\Http\Controllers\Thethao;

use App\Models\Carts;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SearchProductController extends Controller
{
    public function search(Request $request){
        $name = $request->searchtong;
        $query_products = Product::where('name','LIKE','%'.$name.'%');
        $producttypes =ProductType::get();
        if (isset(Auth::user()->id)){
            $id_user = Auth::user()->id;
            $cart_header = Carts::where('id_user',$id_user)->get();
        }else{
            $cart_header = "";
        }

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
}
