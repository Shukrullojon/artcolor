<?php

namespace App\Http\Requests\Admin\Team;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fio_uz' => 'required',
            'fio_ru' => 'required',
            'fio_en' => 'required',
            'position_uz' => 'required',
            'position_ru' => 'required',
            'position_en' => 'required',
            'status' => 'required|integer',
        ];
    }
}
