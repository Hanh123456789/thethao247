<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userCreateRequest extends FormRequest
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
            //
        ];
    }
    public function getData(){
        $data = $this->only(['name','password','lock_customer','phone','address','note','email','created_at','updated_at','remember_token']);
        return $data;
    }
}
