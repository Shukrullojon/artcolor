<?php

namespace App\Http\Requests\Admin\Agent;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function rules()
    {
        return [
            'code' =>'required|unique:agents',
        ];
    }
}
