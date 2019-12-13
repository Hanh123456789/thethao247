<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateProfileRequest extends FormRequest
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
            'address'=>'required',

        ];
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'address.required' => 'Địa chỉ không  được để trống',

        ];
    }
    public function getData(){
        $data = $this->only(['name','phone','address','sex','email','images','birthday','password','remember_token','created_at','updated_at']);
        return $data;
    }
}
