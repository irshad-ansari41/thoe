<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'title_en' => 'required|min:3',
            'title_ar' => 'required|min:3',
            'description_en' => 'required|min:3',
            'description_ar' => 'required|min:3',
            'section_en' => 'required|min:3',
            'section_ar' => 'required|min:3',
        ];
    }

}
