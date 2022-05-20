<?php

namespace App\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryTourRequest extends FormRequest
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
        if($this->method() == 'POST'){
            return [
                'title' => ['required', 'max:255'],
                'status' => ['required', 'integer'],
                'sort' => ['required', 'integer']
            ];
        }else{
            return [
                'title' => 'required|max:255',
                'status' => 'required|in:0,1',
                'sort' => 'required|integer|min:0',
                'id' => ['required', 'exists:App\Models\CategoryTour,id']
            ];
        }
        
    }

    public function attributes(){
        return [
            'title' => 'Tên danh mục',
            'status' => 'Trạng thái',
            'sort' => 'Thứ tự'
        ];
    }

    public function messages(){
        return [
            'title.required' => ':attribute không được để trống', 
            'title.max' => ':attribute không được quá 255 ký tự', 
            'status.required' => ':attribute không được để trống', 
            'status.integer' => ':attribute phải là số', 
            'sort.required' => ':attribute không được để trống', 
            'sort.integer' => ':attribute phải là số', 
            
        ];
    }
}
