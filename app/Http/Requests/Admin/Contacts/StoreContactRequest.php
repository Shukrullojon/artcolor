<?php

namespace App\Http\Requests\Admin\Contacts;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'required' ,
            'title_uz' => 'required' ,
            'title_ru' => 'required' ,
            'title_en' => 'required' ,
            'phone_1' => 'required' ,
            'phone_2' => 'required' ,
            'email' => 'required' ,
            'timetable' => 'required' ,
            'telegram' => 'required' ,
            'youtube' => 'required' ,
            'instagram' => 'required' ,
            'facebook' => 'required' ,
        ];
    }
}
