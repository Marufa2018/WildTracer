<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstanceRequest extends FormRequest
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
            'submitted_by' => 'required|max:255',
            'mobile' => 'required|min:11|max:11',
            'animal_type' => 'required',
            'location' => 'required',
            'month' => 'required',
            'year' => 'required|max:4|min:4',
        ];
    }
}
