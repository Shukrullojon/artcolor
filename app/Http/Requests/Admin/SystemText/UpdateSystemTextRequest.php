<?php

namespace App\Http\Requests\Admin\SystemText;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSystemTextRequest extends FormRequest
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
        ];
    }
}
