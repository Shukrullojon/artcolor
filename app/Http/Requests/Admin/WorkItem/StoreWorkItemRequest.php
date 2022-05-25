<?php

namespace App\Http\Requests\Admin\WorkItem;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkItemRequest extends FormRequest
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
            'name_uz' => 'required' ,
            'name_ru' => 'required' ,
            'name_en' => 'required' ,
            'region_uz' => 'required' ,
            'region_ru' => 'required' ,
            'region_en' => 'required' ,
            'application_uz' => 'required' ,
            'application_ru' => 'required' ,
            'application_en' => 'required' ,
            'product_image' => 'required' ,
            'image' => 'required' ,
            'image_small' => 'required' ,
        ];
    }
}
