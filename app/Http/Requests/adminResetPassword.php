<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class adminResetPassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password'=>'required',
            'confirm_password'=>'same:password'
        ];
    }
    public function messages()
    {
        return [
            'confirm_password.same' => 'Mật khẩu phải trùng với mật khẩu đã nhập',
        ];
    }
    public function getData(){
        $data = $this->only(['avatar', 'email','name','lock_admin', 'phone', 'images', 'position','birtday','password','remember_token']);
        return $data;
    }
}
