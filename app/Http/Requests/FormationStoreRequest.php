<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormationStoreRequest extends FormRequest
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
            'title' => 'required|string|min:10',
            'description' => 'required|string',
            'type' => 'required|string',
            'price' => 'required|integer',
            'picture' => 'required|image',
            'checkboxCategories' => 'nullable',
            'cours' => 'required|string|min:10'
        ];
    }
}
