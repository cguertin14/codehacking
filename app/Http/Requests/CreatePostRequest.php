<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title'         => 'required',
            'category_id'   => 'required',
            'photo_id'      => 'required',
            'body'          => 'required',
        ];
    }


     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required'       => 'A title is required',
            'category_id.required' => 'A category is required',
            'photo_id.required'    => 'A photo is required',
            'body.required'        => 'A message is required',
        ];
    }
}
