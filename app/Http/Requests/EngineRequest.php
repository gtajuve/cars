<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EngineRequest extends FormRequest
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
            'type' => 'required',
            'cc' => 'required|numeric|min:100',
            'numbers_of_cylinders' => 'required|numeric|min:1|max:255'
        ];
    }
    /**
     * Get the validation rules messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {

        if(!$this->get('has_turbo')){
            $this->merge(['has_turbo' => 0 ]);
        }
    }
}
