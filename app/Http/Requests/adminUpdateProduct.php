<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class adminUpdateProduct extends FormRequest
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
            'description'=>'required',
            'unit_price'=>'required|integer',
            'promotion_price'=>'required|integer',
            'unit'=>'required|integer',
            'guarantee'=>'required',
            'trademark'=>'required',
            'entry_price'=>'required|integer'




        ];
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'description.required' => 'Mô tả không được để trống',
            'unit_price.required' => 'Giá không được để trống',
            'promotion_price.required' => 'Giá khuyến mãi không được để trống',
            'unit_price.integer' => 'Dữ liệu nhập vào phải là số',
            'unit.required' => 'Số lượng không được để trống',
            'promotion_price.integer' => 'Dữ liệu nhập vào phải là số',
            'unit.integer' => 'Dữ liệu nhập vào phải là số',
            'guarantee.required' => 'Thời gian bảo hành không được để trống',
            'trademark.required' => 'Nơi sản suất không được để trống',
            'entry_price.integer' => 'Dữ liệu nhập vào phải là số',
            'entry_price.required' => 'Giá nhập không được để trống',

        ];
    }
    public function getData(){
        $data = $this->only(['name','id_type','entry_price','description','unit_price','promotion_price','unit','new','guarantee','trademark','sold','created_at','updated_at','video']);
        return $data;
    }
}
