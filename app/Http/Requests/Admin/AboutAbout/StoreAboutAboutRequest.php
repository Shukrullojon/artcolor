<?php

namespace App\Http\Requests\Admin\AboutAbout;

use Illuminate\Foundation\Http\FormRequest;

class StoreAboutAboutRequest extends FormRequest
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
            'title_uz' => "required" ,
            'title_ru' => "required" ,
            'title_en' => "required" ,
            'info_uz' => "required" ,
            'info_ru' => "required" ,
            'info_en' => "required" ,
            'image' => "required" ,
            'text_uz' => "required" ,
            'text_ru' => "required" ,
            'text_en' => "required" ,
        ];
    }
}
