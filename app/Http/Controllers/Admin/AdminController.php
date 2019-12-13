<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\adminCreateRequest;
use App\Http\Requests\adminUpdateRequest;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Images;
use App\Models\News;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function trangchu(){
        $khachhang =User::get();
        $nhanvien = Admin::get();
        $tintuc = News::get();
        $lienhe = Contact::get();
        return view('admin.index.index',compact('khachhang','nhanvien','tintuc','lienhe'));
    }
    public function index(Request $request){
       $admins = is_null($request->get('search')) ? Admin::orderBy('id','DESC')->paginate(10) : Admin::where('name','LIKE','%'.$request->get('search').'%') ->paginate(10)
            ->appends(request()
                ->query());
    	return view('admin.user.index')->with(compact('admins'));
    }
    public function create(){
        return view('admin.user.add');
    }
    public function store(adminCreateRequest $request){

        $data = $request->getData();
        $data['password'] = bcrypt($request->password);
        $data['remember_token'] = Str::random(60);
        $admin = Admin::create($data);
        $data['position'] = 1;
        if ($admin){
            return redirect()->route('member_index')->with('msg','Thêm nhân viên thành công');
        }else{
            return redirect()->route('member_index')->with('msg','Thêm nhân viên thất bại');
        }

    }
    public function edit($id){
         $user = Admin::findOrFail($id);
         $position = Admin::select('position')->distinct()->get();
        return view('admin.user.edit')->with(compact('user','id','position'));
    }
    public function update($id,adminUpdateRequest $request){
        $user = Admin::findOrFail($id);
        $data = $request->getData();
        if ($request->password != ""){
            $data['password'] = bcrypt($request->password);
        }else{
            $data['password']=$user->password;
        }
         $admin=$user->update($data);
        if ($admin){
            return redirect()->route('member_index')->with('msg','Sửa nhân viên thành công');
        }else{
            return view('member_index')->with('msg','Sửa nhân viên thất bại');
        }
    }

    public function destroy($id)
    {
            $admins = Admin::findOrFail($id);
        $product2 = Product::where('create_by',$id)->get();
        foreach ($product2 as $pro2){
            $prod2 = Product::findOrFail($pro2->id);
            $imagess = Images::where('id_product',$pro2->id)->get();
            foreach ($imagess as $image){
                $img = Images::findOrFail($image->id);
                $img->delete();
            }
            $prod2->delete();
        }
        $admin = $admins->delete();
        if ($admin){
            return redirect()->route('member_index')->with('msg','Xóa nhân viên thành công');
        }else{
            return view('member_index')->with('msg','Xóa nhân viên thất bại');
        }
    }
    public function unlockadmin(){
        return view('admin.user.unlock');
    }
    public function postunlockadmin(adminUpdateRequest $request)
    {
          $email  = $request->email;
          $m_admin = Admin::where('email',$email)->first();
          if ($m_admin != null) {
              $user = Admin::findOrFail($m_admin->id);
              $data = [
                  'lock_admin' => 0,
              ];
              $admin = $user->update($data);
              if ($admin){
                  return redirect()->route('member_index')->with('msg','Mở khóa tài khoản thành công');
              }else{
                  return redirect()->route('member_index')->with('msg','Mở khóa tài khoản thất bại');
              }
          }else{
              return redirect()->route('get_unlock_admin')->with('msg','Không tìm thấy tài khoản trong hệ thống');
          }
    }
    public function lockadmin(){
        return view('admin.user.lock');
    }
    public function postlockadmin(adminUpdateRequest $request)
    {
        $email  = $request->email;
        $m_admin = Admin::where('email',$email)->first();
        if ($m_admin != null) {
            $user = Admin::findOrFail($m_admin->id);
            $data = [
                'lock_admin' => 1,
            ];
            $admin = $user->update($data);
            if ($admin){
                return redirect()->route('member_index')->with('msg','Khóa tài khoản thành công');
            }else{
                return redirect()->route('member_index')->with('msg','Khóa tài khoản thất bại');
            }
        }else{
            return redirect()->route('get_lock_admin')->with('msg','Không tìm thấy tài khoản trong hệ thống');
        }
    }
    public function thongtin(){
        $id = Auth::guard('admin')->id();
        $admin = Admin::findOrFail($id);
        $position = Admin::select('position')->distinct()->get();
      return view('admin.user.profile',compact('admin','id','position'));
    }
    public function sua(){
        $id = Auth::guard('admin')->id();
        $admin = Admin::findOrFail($id);
        $position = Admin::select('position')->distinct()->get();
        return view('admin.user.update',compact('admin','id','position'));
    }
    public function postsua(adminUpdateRequest $request)
    {
        $data = $request->getData();
        $id = Auth::guard('admin')->id();
        $user = Admin::findOrFail($id);
        $data['remember_token'] = str_random(60);
        if ($request->password == "") {
            $data['password'] = $user->password;
        } else {
            $data['password'] = bcrypt($request->password);
        }

        $data['email'] = $user->email;
        $data['position'] = $user->position;
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $filename);
            $data['avatar'] = $filename;
        }
        $user->update($data);
        return redirect()->route('thongtintaikhoanadmin', $id)->with('msg', 'Cập nhập thông tin thành công');
    }
}
