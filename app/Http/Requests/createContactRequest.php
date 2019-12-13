<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createContactRequest extends FormRequest
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
            'email'=>'required|email',
            'subject'=>'required',
            'phone'=>'required|numeric',
            'message'=>'required'

        ];
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên người dùng không được để trống',
            'email.required'   => 'Email không được để trống',
            'email.email'   => 'Email không đúng định dạng',
            'subject.required'=>'Tiêu đề không được để trống',
            'phone.required'=>'Số điện thoại không được để trống',
            'phone.numeric'=>'Số điện thoại không đúng định dạng',
             'message.required' =>'Message không được để trống',
        ];
    }
    public function getData(){
        $data = $this->only(['id','name','subject','phone','message','email','status']);
        return $data;
    }
}
