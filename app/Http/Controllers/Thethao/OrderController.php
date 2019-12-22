<?php

namespace App\Http\Controllers\Thethao;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Carts;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $producttypes =ProductType::get();
        $id = Auth::user()->id;
        $cart_header = Carts::where('id_user',$id)->get();
        $bills = Bill::with('bill_detail','customer')->where('id_customer',$id)->orderBy('id','DESC')->get();
       return view('thethao.statusorder',compact('producttypes','cart_header','bills'));
    }
    public function deletetotal($id){
         $bill = Bill::findOrFail($id);
         $bill_details = BillDetail::where('id_bill',$id)->get();
         foreach ($bill_details as $bill_detail){
             $del_bill_detail = BillDetail::findOrFail($bill_detail->id);
             $soluong = $del_bill_detail->quantity;
             $id_product =$del_bill_detail->id_product;
             $product = Product::findOrFail($id_product);
             $soluongco = $product->unit;
             $data = [
                 'unit'=>$soluong+$soluongco,
             ];
             $product->update($data);
             $bill_detail->delete();
         }
         $bill->delete();
        return redirect()->back()->with('msg','Bạn đã hủy đơn hàng thành công');
    }
    public function detailorder($id){
        $producttypes =ProductType::get();
        $id_user = Auth::user()->id;
        $cart_header = Carts::where('id_user',$id_user)->get();
        $bill_details = BillDetail::where('id_bill',$id)->orderBy('id','DESC')->get();
        return view('thethao.singleorder',compact('bill_details','producttypes','cart_header'));
    }
    public function deletesingle($id){
        $bill_detail =BillDetail::findOrFail($id);
        $bill = Bill::findOrFail($bill_detail->id_bill);
        $giacu = $bill->total;
        $giamoi = $giacu-$bill_detail->unit_price;
        $bill->total = $giamoi;
        $sokm = $bill->km;
        $tien =$giamoi;
        if ($sokm <= 2 && $tien <= 100000) {
            $tienship = $sokm * 5000;
        }elseif ($sokm<=2 && $tien>100000){
            $tienship=0;
        }elseif ($tien<5000000){
            $tienship = $sokm*3000;
        }else{
            $tienship = 0;
        }
        $bill->shipmoney = $tienship;

        $soluong = $bill_detail->quantity;
        $id_product = $bill_detail->id_product;
        $product = Product::findOrFail($id_product);
        $soluongco = $product->unit;
        $data = [
            'unit'=>$soluong+$soluongco,
        ];
        $product->update($data);
        $bill_detail->delete();
        if ($giamoi != 0) {
            $bill->save();

        }else{
            $bill->delete();
        }

        return redirect()->route('donhangcuaban')->with('Bạn đã hủy đơn hàng thành công');
    }
}
