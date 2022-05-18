<?php

namespace App\Http\Requests\Admin\Activity;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivityRequest extends FormRequest
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
            'short_text_uz' => 'required' ,
            'short_text_ru' => 'required' ,
            'short_text_en' => 'required' ,
            'text_uz' => 'required' ,
            'text_ru' => 'required' ,
            'text_en' => 'required' ,
        ];
    }
}
