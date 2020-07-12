<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModelRequest extends FormRequest
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
        $currentYear =date("Y");
        $rules = [
            'name' => 'required|unique:models',
            'manufacture_country' => 'required',
            'started_year' => 'required|numeric|min:1900|max:'.$currentYear,

        ];
        if ($this->get('ended_year')){
            $rules['ended_year'] = 'min:'.$this->get('started_year');
        }

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
            'manufacture_country.required' => 'Country is required',
            'started_year.required' => 'Year is required',
            'ended_year.min' => ' Ended year must be after Started year'
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

        if(!$this->get('is_electric')){
            $this->merge(['is_electric' => 0 ]);
        }
    }
}
