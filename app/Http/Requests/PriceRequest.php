<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceRequest extends FormRequest
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
            'car_id' => 'required',
            'price' => 'required|numeric|min:1'
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
            'car_id.required' => 'Car is required',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be numeric',
            'price.min' => 'Size of engine must be greater than 0',
        ];
    }
}
