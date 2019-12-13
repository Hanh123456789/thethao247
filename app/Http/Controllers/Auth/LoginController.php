<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\userCreateRequest;
use App\Mail\sendMail;
use App\Mail\userMail;
use App\Models\Admin;
use App\Models\ProductType;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function getLogin(){
        $producttypes =ProductType::get();
        return view('auth.user.login',compact('producttypes'));
    }

    public function postLogin(Request $request){
        $rules = [
            'email' =>'required|email',
            'password' => 'required'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');

            if( Auth::attempt(['email' => $email, 'password' =>$password])) {
                return redirect()->route('the_thao_index');
            } else {
              return redirect()->route('login_path_user')->with('msg','Sai email hoặc mật khẩu !!!');
            }
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login_path_user');
    }
    public function getregister(){
        $producttypes =ProductType::get();
        return view('auth.user.register',compact('producttypes'));
    }
    public function postregister(userCreateRequest $request){
        $rules = [
            'name'=>'required',
            'email' =>'required|email|unique:users',
            'password' => 'required',
            'confirmpassword'=>'same:password'
        ];
        $messages = [
            'name.required'=>'Tên là trường bắt buộc',
            'email.required' => 'Email là trường bắt buộc',
            'email.unique' => 'Email đã tồn tại trong hệ thống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'confirmpassword.same' => 'Mật khẩu phải trùng với mật khẩu đã nhập'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data = $request->getData();
            $data['password'] = bcrypt($request->password);
            User::create($data);
           return redirect()->route('login_path_user');
        }
    }
    public function getForget(){
        $producttypes =ProductType::get();
        return view('auth.user.fogetpass',compact('producttypes'));
    }
    public function postForget(Request $request){

        $email = $request->email;
        $m_email = User::where('email',$email)->first();
        if ($m_email!=null) {
            $token = $m_email->remember_token;
            Mail::to($email)->send(new userMail($token));
            return redirect()->route('forget_pass_user')->with('msg', 'Chúng tôi đã gửi yêu cầu xác nhận vào email của.Bạn hãy kiểm tra email và thực hiện xác thực theo hướng dẫn !!!');
        }else{
            return redirect()->route('forget_pass_user')->with('msg', 'Chúng tôi không tìm thấy email của bạn trong hệ thống!!!');
        }

    }
    public function getReset($token){
        $producttypes =ProductType::get();
        return view('auth.user.resetpass',compact('token','producttypes'));
    }
    public function postReset($token,Request $request){
        $rules = [
            'password' => 'required',
            'confirmpass'=>'same:password'
        ];
        $messages = [
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'confirmpass.same' => 'Mật khẩu phải trùng với mật khẩu đã nhập'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $admin = User::where('remember_token', $token);
            $pass = bcrypt($request->password);
            $renmember = Str::random(60);
            $data = [
                'password'=>$pass,
                'remember_token'=>$renmember,
            ];
            $updateadmin = $admin->update($data);
            if ($updateadmin) {
                return redirect()->route('login_path_user')->with('msg', 'Cập nhập mật khẩu thành công.Vui lòng đăng nhập để sử dụng');
            } else {
                return redirect()->route('login_path_user')->with('msg', 'Cập nhập mật khẩu thất bại.Vui lòng cập nhập lại mật khẩu để sử dụng');
            }
        }

    }
}
