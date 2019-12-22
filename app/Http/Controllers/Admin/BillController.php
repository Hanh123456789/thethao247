<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Carts;
use App\Models\Product;
use App\Models\Rating;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    public function index(Request $request){
        $customer = User::with('customer');
        $query_bills = Bill::with('customer');
        $bills = is_null($request->get('ngay')) ? $query_bills : $query_bills->where('date_order', $request->get('ngay'));
        if(!is_null($request->get('status'))){
            $bills = $bills->where('status',$request->get('status'));
        }
        $bills= $bills->orderBy('id', 'DESC')
            ->paginate(10)
            ->appends(request()
                ->query());

        return view('admin.bill.index',compact('bills','customer'));
    }
    public function detail($id){
        $bill = Bill::findOrFail($id);
        $bill_details = BillDetail::where('id_bill',$id)->get();
        return view('admin.bill.billdetail',compact('bill_details','bill'));

    }
    public function destroy($id){
        $bill= Bill::findOrFail($id);
        $detail_bills = BillDetail::where('id_bill',$id)->get();
        foreach ($detail_bills as $detail_bill){
            $id_detail = $detail_bill->id;
            $detailbill = BillDetail::findOrFail($id_detail);
            $detailbill->delete();
        }
        $del_bill=$bill->delete();
        if ($del_bill){
            return redirect()->route('bill_index')->with('msg','Xóa đơn hàng thành công');
        }
    }
    public function trangthai(Request $request){
        $trangThai = $request->aTrangthai;
        $id = $request->aId;

        if ($trangThai == 0) {
            $trangthai = 1;
        } else {
            $trangthai = 0;
        }
        if ($trangthai == 0) {

            echo "<a href='javascript:void(0)' onclick='return trangthai({$id},{$trangthai})'><img src='img/logo/de.png'></a>";
        } else {

            echo "<a href='javascript:void(0)'  onclick='return trangthai({$id},{$trangthai})'><img src='img/logo/ac.png'></a>";
        }
        $bill = Bill::findOrFail($id);
        $bill->status = $trangthai;
        $bill->save();

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
}
