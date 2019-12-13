<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productTypeCreateRequest extends FormRequest
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
            'name' => 'required|unique:type_products',

        ];
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique'   => 'Tên danh mục đã tồn tại'
        ];
    }
    public function getData(){
        $data = $this->only(['name','parent_id','created_at','updated_at']);
        return $data;
    }
}
