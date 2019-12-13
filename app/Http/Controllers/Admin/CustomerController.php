<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index(Request $request){
        $customers = is_null($request->get('search')) ? User::orderBy('id','DESC')->paginate(10) : User::where('name','LIKE','%'.$request->get('search').'%') ->paginate(10)
            ->appends(request()
                ->query());
        return view('admin.customer.index',compact('customers'));
    }
    public function unlockcustomer(Request $request){
        $id = $request->aId;
       $data = [
           'lock_customer' =>0
       ];
       $user = User::findOrFail($id);
       $user->update($data);
       echo "";
    }
    public function lockcustomer(){
        return view('admin.customer.lock');
    }
    public function postlockcustomer(Request $request){
        $email = $request->email;
        $user_find = User::where('email',$email)->first();
        if ($user_find != null){
            $id = $user_find->id;
            $user = User::findOrFail($id);
            $user->lock_customer = 1;
            $user->save();
            return redirect()->route('customer_index')->with('msg','Tài khoản '.$email.' đã bị khóa');
        }else{
            return redirect()->route('customer_lock')->with('msg','Không tìm thấy email này trong hệ thống');
        }
    }
    public function destroy($id){
        $user = User::findOrFail($id);
        $del_user = $user->delete();
        if ($del_user){
            return redirect()->route('customer_index')->with('msg','Xóa tài khoản thành công');
        }else{
            return redirect()->route('customer_index')->with('msg','Xóa tài khoản thất bại');
        }
    }
}
