<?php

namespace App\Http\Controllers\TheThao;

use App\Models\Carts;
use App\Models\LikeProducts;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LikeProductsController extends Controller
{
    public function addlike(Request $request){
       $trangThai = $request->aTrangthai;
        $id = $request->aId;
        $id_user = Auth::user()->id;
       if ($trangThai == 0) {
            $trangthai = 1;
        } else {
            $trangthai = 0;
        }
        if ($trangthai == 1) {
          echo "<a style='background-color: #ff7f00' class='add-to-like' href='javascript:void(0)' onclick='return addlike({$id},{$trangthai})' title='Bỏ yêu thích'><i style='color:white;' class='zmdi zmdi-favorite'></i></a>";
        } else {
            echo "<a  class='add-to-like' href='javascript:void(0)' onclick='return addlike({$id},{$trangthai})' title='Yêu thích'><i  class='zmdi zmdi-favorite'></i></a>";
        }
        $data = [
            'id_product'=>$id,
            'id_user'=>$id_user,
        ];
        if ($trangthai==0){

            $like = LikeProducts::where('id_product',$id)->where('id_user',$id_user)->first();
            if ($like != "") {
                $like_del = LikeProducts::findOrFail($like->id);
                $like_del->delete();
            }
        }else{
            LikeProducts::create($data);
        }

    }
    public function list(Request $request,$scope=null){
            $producttypes =ProductType::get();
            $id_user = Auth::user()->id;
            $cart_header = Carts::where('id_user',$id_user)->get();
        $query_products = Product::whereHas('likeproduct', function ($query) {
            $query->where('id_user',Auth::user()->id);
        });
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

        return view('thethao.listlike',compact('producttypes','cart_header','products'));
    }
    public function addlikenew(Request $request){
        $trangThai = $request->aTrangthai;
        $id = $request->aId;
        $id_user = Auth::user()->id;
        if ($trangThai == 0) {
            $trangthai = 1;
        } else {
            $trangthai = 0;
        }
        if ($trangthai == 1) {
            echo "<a style='background-color: #ff7f00' class='add-to-like' href='javascript:void(0)' onclick='return addlikenew({$id},{$trangthai})' title='Bỏ yêu thích'><i style='color:white;' class='zmdi zmdi-favorite'></i></a>";
        } else {
            echo "<a  class='add-to-like' href='javascript:void(0)' onclick='return addlikenew({$id},{$trangthai})' title='Yêu thích'><i  class='zmdi zmdi-favorite'></i></a>";
        }
        $data = [
            'id_product'=>$id,
            'id_user'=>$id_user,
        ];
        if ($trangthai==0){
            $like = LikeProducts::where('id_product',$id)->where('id_user',$id_user)->first();
            if ($like != "") {
                $like_del = LikeProducts::findOrFail($like->id);
                $like_del->delete();
            }
        }else{
            LikeProducts::create($data);
        }

    }
    public function yeuthichbongda(Request $request){
        $trangThai = $request->aTrangthai;
        $id = $request->aId;
        $id_user = Auth::user()->id;
        if ($trangThai == 0) {
            $trangthai = 1;
        } else {
            $trangthai = 0;
        }
        if ($trangthai == 1) {
            echo "<a style='background-color: #ff7f00' class='add-to-like' href='javascript:void(0)' onclick='return yeuthichbongda({$id},{$trangthai})' title='Bỏ yêu thích'><i style='color:white;' class='zmdi zmdi-favorite'></i></a>";
        } else {
            echo "<a  class='add-to-like' href='javascript:void(0)' onclick='return yeuthichbongda({$id},{$trangthai})' title='Yêu thích'><i  class='zmdi zmdi-favorite'></i></a>";
        }
        $data = [
            'id_product'=>$id,
            'id_user'=>$id_user,
        ];
        if ($trangthai==0){
            $like = LikeProducts::where('id_product',$id)->where('id_user',$id_user)->first();
            if ($like != "") {
                $like_del = LikeProducts::findOrFail($like->id);
                $like_del->delete();
            }
        }else{
            LikeProducts::create($data);
        }

    }
    public function yeuthichmaychaybo(Request $request){
        $trangThai = $request->aTrangthai;
        $id = $request->aId;
        $id_user = Auth::user()->id;
        if ($trangThai == 0) {
            $trangthai = 1;
        } else {
            $trangthai = 0;
        }
        if ($trangthai == 1) {
            echo "<a style='background-color: #ff7f00' class='add-to-like' href='javascript:void(0)' onclick='return yeuthichmaychaybo({$id},{$trangthai})' title='Bỏ yêu thích'><i style='color:white;' class='zmdi zmdi-favorite'></i></a>";
        } else {
            echo "<a  class='add-to-like' href='javascript:void(0)' onclick='return yeuthichmaychaybo({$id},{$trangthai})' title='Yêu thích'><i  class='zmdi zmdi-favorite'></i></a>";
        }
        $data = [
            'id_product'=>$id,
            'id_user'=>$id_user,
        ];
        if ($trangthai==0){
            $like = LikeProducts::where('id_product',$id)->where('id_user',$id_user)->first();
            if ($like != "") {
                $like_del = LikeProducts::findOrFail($like->id);
                $like_del->delete();
            }
        }else{
            LikeProducts::create($data);
        }

    }
    public function yeuthichgym(Request $request){
        $trangThai = $request->aTrangthai;
        $id = $request->aId;
        $id_user = Auth::user()->id;
        if ($trangThai == 0) {
            $trangthai = 1;
        } else {
            $trangthai = 0;
        }
        if ($trangthai == 1) {
            echo "<a style='background-color: #ff7f00' class='add-to-like' href='javascript:void(0)' onclick='return yeuthichgym({$id},{$trangthai})' title='Bỏ yêu thích'><i style='color:white;' class='zmdi zmdi-favorite'></i></a>";
        } else {
            echo "<a  class='add-to-like' href='javascript:void(0)' onclick='return yeuthichgym({$id},{$trangthai})' title='Yêu thích'><i  class='zmdi zmdi-favorite'></i></a>";
        }
        $data = [
            'id_product'=>$id,
            'id_user'=>$id_user,
        ];
        if ($trangthai==0){
            $like = LikeProducts::where('id_product',$id)->where('id_user',$id_user)->first();
            if ($like != "") {
                $like_del = LikeProducts::findOrFail($like->id);
                $like_del->delete();
            }
        }else{
            LikeProducts::create($data);
        }

    }
    public function yeuthichxedap(Request $request){
        $trangThai = $request->aTrangthai;
        $id = $request->aId;
        $id_user = Auth::user()->id;
        if ($trangThai == 0) {
            $trangthai = 1;
        } else {
            $trangthai = 0;
        }
        if ($trangthai == 1) {
            echo "<a style='background-color: #ff7f00' class='add-to-like' href='javascript:void(0)' onclick='return yeuthichxedap({$id},{$trangthai})' title='Bỏ yêu thích'><i style='color:white;' class='zmdi zmdi-favorite'></i></a>";
        } else {
            echo "<a  class='add-to-like' href='javascript:void(0)' onclick='return yeuthichxedap({$id},{$trangthai})' title='Yêu thích'><i  class='zmdi zmdi-favorite'></i></a>";
        }
        $data = [
            'id_product'=>$id,
            'id_user'=>$id_user,
        ];
        if ($trangthai==0){
            $like = LikeProducts::where('id_product',$id)->where('id_user',$id_user)->first();
            if ($like != "") {
                $like_del = LikeProducts::findOrFail($like->id);
                $like_del->delete();
            }
        }else{
            LikeProducts::create($data);
        }

    }
}
