<?php

namespace App\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class CategoryPostRequest extends FormRequest
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
                'title' => ['required', 'string', 'max:255'],
                // 'slug' => ['required', 'max:255', 'unique:App\Models\CategoryPost,slug'],
            ];
        }
        elseif($this->method() == 'PUT'){
            return [
                'title' => ['required', 'string', 'max:255'],
                // 'slug' => ['required', 'max:255', 'unique:App\Models\CategoryPost,slug'],
            ];
        }
    }

    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được bỏ trống',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        if($this->ajax()){
            throw new HttpResponseException(
                response()->json([
                    'status' => 416,
                    'message' => $errors], 416
                )
            );
        }else{
            throw (new ValidationException($validator))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
        }
    }
}
