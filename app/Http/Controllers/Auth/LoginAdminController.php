<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\adminResetPassword;
use App\Mail\sendMail;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginAdminController extends Controller
{
    use AuthenticatesUsers;
      public function __construct()
        {
            $this->middleware('guest:admin')->except('logout');
        }
     protected $redirectTo = '/admin';
    public function getLogin(){
        return view('auth.admin.login');
    }
    public function  logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('login_path_admin');
    }
    public function postLogin(Request $request){
            $email = $request->input('email');
            $password = $request->input('password');
            if(Auth::guard('admin')->attempt(['email' => $email, 'password' =>$password])) {
             return redirect()->route('trangchu');
            } else {
                return redirect()->route('login_path_admin')->with('msg','Email hoặc Password không đúng vui lòng kiểm tra lại !!!');
            }
}
public function getForget(){
        return view('auth.admin.resetpassword');
}
public function postForget(Request $request){

        $email = $request->email;
       $m_email = Admin::where('email',$email)->first();
       if ($m_email!=null) {
           $token = $m_email->remember_token;
           Mail::to($email)->send(new sendMail($token));
           return redirect()->route('forget_pass_admin')->with('msg', 'Chúng tôi đã gửi yêu cầu xác nhận vào email của.Bạn hãy kiểm tra email và thực hiện xác thực theo hướng dẫn !!!');
       }else{
           return redirect()->route('forget_pass_admin')->with('msg', 'Chúng tôi không tìm thấy email của bạn trong hệ thống!!!');
       }

    }
    public function getReset($token){
        return view('auth.admin.formreset',compact('token'));
    }
    public function postReset($token,adminResetPassword $request){
           $admin = Admin::where('remember_token',$token);
        $data = $request->getData();
        $data['password'] = bcrypt($request->password);
        $data['remember_token'] = Str::random(60);
         $updateadmin = $admin->update($data);
         if ($updateadmin){
             return redirect()->route('login_path_admin')->with('msg','Cập nhập mật khẩu thành công.Vui lòng đăng nhập để sử dụng');
         }else{
             return redirect()->route('login_path_admin')->with('msg','Cập nhập mật khẩu thất bại.Vui lòng cập nhập lại mật khẩu để sử dụng');
         }
    }
    public function thongtin(){
       echo "hihi";
    }
}
