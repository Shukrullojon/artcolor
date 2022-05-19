<?php

namespace App\Http\Requests\Admin\News;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
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
            'title_uz' => 'required' ,
            'title_ru' => 'required' ,
            'title_en' => 'required' ,
            'text_uz' => 'required' ,
            'text_ru' => 'required' ,
            'text_en' => 'required' ,
            'slug' => 'required' ,
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ];
    }
}
