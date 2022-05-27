<?php

namespace App\Http\Requests\Admin\ServiceHeader;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceHeaderRequest extends FormRequest
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
            'service_id' => 'required' ,
            'title_uz' => 'required' ,
            'title_ru' => 'required' ,
            'title_en' => 'required' ,
            'button_uz' => 'required' ,
            'button_ru' => 'required' ,
            'button_en' => 'required' ,
            'button_url' => 'required' ,
        ];
    }
}
