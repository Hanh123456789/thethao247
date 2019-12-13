<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Product;
use App\Models\ProductType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  DB;

class ThongkeController extends Controller
{
    public function thongke1(Request $req){
        $date = Carbon::now();
        $datee = $date->toDateString();
        $ngay = !is_null($req->get('ngay')) ? Carbon::parse($req->get('ngay'))->toDateString() : $datee;
        $tongngay = Bill::where('status',1)->where('date_order',$ngay)->get();
        $start_month = $date->startOfMonth()->toDateString();
        $end_month = $date->endOfMonth()->toDateString();
        $from = !is_null($req->get('from')) ? Carbon::parse($req->get('from'))->toDateString() : $start_month;
        $to = !is_null($req->get('to')) ? Carbon::parse($req->get('to'))->toDateString() : $end_month;
        $tongthang = Bill::where('status',1)->whereBetween('date_order', [$from,$to])->get();
        $tongtienngay = 0;
        foreach ($tongngay as $ngay) {
            $bill_detail = BillDetail::with('product')->where('id_bill',$ngay->id)->get();
             foreach ($bill_detail as $bill){
                  $tongtienngay += $bill->product->entry_price*$bill->quantity;
              }
        }
        $tongtienthang = 0;
        foreach ($tongthang as $thang) {
            $bill_detail = BillDetail::with('product')->where('id_bill',$thang->id)->get();
            foreach ($bill_detail as $bill){
                $tongtienthang += $bill->product->entry_price*$bill->quantity;
            }
        }
        return view('admin.statistical.thongke1',compact('tongngay','tongthang','start_month','end_month','datee','tongtienngay','tongtienthang'));

    }
    public function thongke2(Request $req){

        $date = Carbon::now();
        $start_month = $date->startOfMonth()->toDateString();
        $end_month = $date->endOfMonth()->toDateString();
        $from = !is_null($req->get('from')) ? Carbon::parse($req->get('from'))->toDateString() : $start_month;
        $to = !is_null($req->get('to')) ? Carbon::parse($req->get('to'))->toDateString() : $end_month;
        $sanphambanchay = BillDetail::with('product')->whereHas('bill', function($q){
            $q->where('status','=',1);
        })->selectRaw('sum(quantity) as sum, id_product')->whereBetween('created_at',[$from,$to])->groupBy('id_product')->orderby('sum','DESC')
            ->pluck('sum','id_product')->take(5);
        $arrname = [];
        $arrso = [];
        $arrid =[];
        foreach ($sanphambanchay as $key=>$sanpham){
          $name = Product::where('id',$key)->first();
         array_push($arrname,$name->name);
        array_push($arrso,$sanpham);
        array_push($arrid,$key);
         }
        $sarrso = implode(",",$arrso);
        $sarrname = implode(",",$arrname);
        if (!isset($arrid[0])){
            $banchay1 = "";
            $arrso[0] = 0;
        }else{
            $banchay1 = Product::with('product_type')->where('id',$arrid[0])->first();
        }
        if (!isset($arrid[1])){
            $banchay2 ="" ;
            $arrso[1] = 0;
        }else{
            $banchay2 = Product::with('product_type')->where('id',$arrid[1])->first();
        }

        if (!isset($arrid[2])){
            $banchay3 ="" ;
            $arrso[2] = 0;
        }else{
            $banchay3 = Product::with('product_type')->where('id',$arrid[2])->first();
        }

        if (!isset($arrid[3])){
            $banchay4 ="" ;
            $arrso[3] = 0;
        }else{
            $banchay4 = Product::with('product_type')->where('id',$arrid[3])->first();
        }

        if (!isset($arrid[4])){
            $banchay5 ="" ;
            $arrso[4] = 0;
        }else{
            $banchay5 = Product::with('product_type')->where('id',$arrid[4])->first();
        }
        $sanphamcodanhthucao = BillDetail::with('product','bill')->whereHas('bill', function($q){
            $q->where('status','=',1);
        })->selectRaw('sum(unit_price) as sum, id_product')->whereBetween('created_at',[$from,$to])->groupBy('id_product')->orderby('sum','DESC')
                    ->pluck('sum','id_product')->take(5);
        $arrnamedoanhthu = [];
        $arrsodoanhthu = [];
        $arrid_doanhthu = [];
        foreach ($sanphamcodanhthucao as $key=>$sanpham){
            $name = Product::where('id',$key)->first();
            array_push($arrnamedoanhthu,$name->name);
            array_push($arrsodoanhthu,$sanpham);
            array_push($arrid_doanhthu,$key);
        }
        $sarrsodoanhthu = implode(",",$arrsodoanhthu);
        $sarrnamedoanhthu = implode(",",$arrnamedoanhthu);

        if (!isset($arrid_doanhthu[0])){
            $sodoanhthu1 ="" ;
        }else{
            $sodoanhthu1 = Product::with('product_type')->where('id',$arrid_doanhthu[0])->first();
        }
        if (!isset($arrid_doanhthu[1])){
            $sodoanhthu2 ="" ;
        }else{
            $sodoanhthu2 = Product::with('product_type')->where('id',$arrid_doanhthu[1])->first();
        }

        if (!isset($arrid_doanhthu[2])){
            $sodoanhthu3 ="" ;
        }else{
            $sodoanhthu3 = Product::with('product_type')->where('id',$arrid_doanhthu[2])->first();
        }

        if (!isset($arrid_doanhthu[3])){
            $sodoanhthu4 ="";
        }else{
            $sodoanhthu4 = Product::with('product_type')->where('id',$arrid_doanhthu[3])->first();
        }

        if (!isset($arrid_doanhthu[4])){
            $sodoanhthu5 ="" ;
        }else{
            $sodoanhthu5 = Product::with('product_type')->where('id',$arrid_doanhthu[4])->first();
        }
        $soluongbanradoanhthu1 = 0;
        if (!isset($arrid_doanhthu[0])){
        }else{
            $arrbanradoanhthu1 = BillDetail::where('id_product',$arrid_doanhthu[0])->whereBetween('created_at',[$from,$to])->get();
            foreach ($arrbanradoanhthu1 as $doanhthu){
                $banradoanhthu1 = $doanhthu->quantity;
                $soluongbanradoanhthu1 += $banradoanhthu1;
            }
        }

        $soluongbanradoanhthu2 = 0;
        if (!isset($arrid_doanhthu[1])){
        }else {
            $arrbanradoanhthu2 = BillDetail::where('id_product', $arrid_doanhthu[1])->whereBetween('created_at', [$from, $to])->get();
            foreach ($arrbanradoanhthu2 as $doanhthu){
                $banradoanhthu2 = $doanhthu->quantity;
                $soluongbanradoanhthu2 += $banradoanhthu2;
            }
        }

        $soluongbanradoanhthu3 = 0;
        if (!isset($arrid_doanhthu[2])){
        }else {
            $arrbanradoanhthu3 = BillDetail::where('id_product', $arrid_doanhthu[2])->whereBetween('created_at', [$from, $to])->get();
            foreach ($arrbanradoanhthu3 as $doanhthu){
                $banradoanhthu3 = $doanhthu->quantity;
                $soluongbanradoanhthu3 += $banradoanhthu3;
            }
        }
        $soluongbanradoanhthu4 = 0;
        if (!isset($arrid_doanhthu[3])){
        }else {
            $arrbanradoanhthu4 = BillDetail::where('id_product', $arrid_doanhthu[3])->whereBetween('created_at', [$from, $to])->get();
            foreach ($arrbanradoanhthu4 as $doanhthu){
                $banradoanhthu4 = $doanhthu->quantity;
                $soluongbanradoanhthu4 += $banradoanhthu4;
            }
        }
        $soluongbanradoanhthu5 = 0;
        if (!isset($arrid_doanhthu[4])){
        }else {
            $arrbanradoanhthu5 = BillDetail::where('id_product', $arrid_doanhthu[4])->whereBetween('created_at', [$from, $to])->get();
            foreach ($arrbanradoanhthu5 as $doanhthu){
                $banradoanhthu5 = $doanhthu->quantity;
                $soluongbanradoanhthu5 += $banradoanhthu5;
            }
        }



        return view('admin.statistical.thongke2' ,compact('sarrso','sarrname','start_month','end_month','sarrsodoanhthu','sarrnamedoanhthu','banchay1','banchay2','banchay3','banchay4','banchay5','arrso','sodoanhthu1','sodoanhthu2','sodoanhthu3','sodoanhthu4','sodoanhthu5','arrsodoanhthu','soluongbanradoanhthu1','soluongbanradoanhthu2','soluongbanradoanhthu3','soluongbanradoanhthu4','soluongbanradoanhthu5'));

    }
    public function thongke3(Request $req){
        $query_products =Product::with('product_type');
        $products = is_null($req->get('cate_seclect')) ? $query_products : $query_products->where('id_type', $req->get('cate_seclect'));
        $status = $req->get('search');
        if(!is_null($status)){ $products = $products->where('name','LIKE','%'.$status.'%'); }
        $productss = Product::with('product_type')->where('unit','>',0)->get();
             $total = 0;
             $number = 0;
             foreach ($productss as $product){
                 $total1 = $product->entry_price*$product->unit;
                 $total += $total1;
                 $number1 = $product->unit;
                 $number += $number1;
             }
        $cate_product =ProductType::has('product')->get();
             $products = $products->where('unit','>',0)->orderBy('id', 'DESC')
                 ->paginate(10)
                 ->appends(request()
                     ->query());
             return view('admin.statistical.thongke3',compact('products','total','number','cate_product'));
    }
}
