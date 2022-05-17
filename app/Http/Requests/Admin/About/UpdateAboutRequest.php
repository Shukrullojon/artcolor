<?php

namespace App\Http\Requests\Admin\About;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutRequest extends FormRequest
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
            'short_title_uz' => 'required' ,
            'short_title_ru' => 'required' ,
            'short_title_en' => 'required' ,
            'text_uz' => 'required' ,
            'text_ru' => 'required' ,
            'text_en' => 'required' ,
            'right_text_uz' => 'required' ,
            'right_text_ru' => 'required' ,
            'right_text_en' => 'required' ,
            'video_link' => 'required' ,
        ];
    }
}
