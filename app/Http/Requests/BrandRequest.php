<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        $currentYear = date("Y");
        $rules = [
            'name' => 'required|min:2|unique:brands',
            'country' => 'required',
            'created_year' => 'required|numeric|min:1900|max:'.$currentYear,

        ];
        if ($this->get('id')){
            $rules['name'] .= (',name,'.$this->get('id'));
        }
        return $rules;
    }
    /**
     * Get the validation rules messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.unique' => 'Name is exist already',
            'country.required' => 'Country is required',
            'created_year.required' => 'Year is required',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */

    protected function prepareForValidation()
    {
        $this->merge(['name' => strtolower( $this->get('name'))]);
    }
}
