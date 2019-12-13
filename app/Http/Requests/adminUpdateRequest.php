<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class adminUpdateRequest extends FormRequest
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
            'phone'=>'numeric'
        ];
        return $rules;
    }
    public function messages()
    {
        return [
          'phone.numeric'=>'Số điện thoại phải là số',
        ];
    }
    public function getData(){
        $data = $this->only(['avatar', 'email','name', 'phone', 'address', 'position','password','lock_admin','remember_token']);
        return $data;
    }
}
