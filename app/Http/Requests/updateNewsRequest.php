<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateNewsRequest extends FormRequest
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
            'detail'=>'required',
            'description'=>'required',

        ];
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên tin tức không được để trống',
            'detail.required' => 'Chi tiết tin tức không được để trống',
            'description.required' => 'Mô tả tin tức không được để trống',
        ];
    }
    public function getData(){
        $data = $this->only(['id','name','images','description','detail','count','created_at','updated_at']);
        return $data;
    }
}
