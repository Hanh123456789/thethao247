<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class adminCreateRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'email'=>'required|unique:admins',
            'password'=>'required',

        ];
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên người dùng không được để trống',
            'email.required'   => 'Email không được để trống',
            'email.unique' =>'Email đã tồn tại',
            'password.required'=>'Password không được để trống'
        ];
    }
    public function getData(){
        $data = $this->only(['avatar', 'email','name', 'phone', 'address', 'position','password','lock_admin','remember_token']);
        return $data;
    }
}
