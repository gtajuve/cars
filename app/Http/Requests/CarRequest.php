<?php

namespace App\Http\Requests;

use App\CarModel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CarRequest extends FormRequest
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
        $rules = [
            'brand_id' => 'required',
            'model_id' => 'required',
            'bodywork_id' => 'required',
            'price' => 'required|numeric'
        ];

        $model = CarModel::find($this->get('model_id'));

        if ($model->is_electric == 0){
            $rules['engine_id'] = 'required';
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
            'brand_id.required' => 'Brand is required',
            'model_id.required' => 'Model is required',
            'bodywork_id.required' => 'Bodywork is required'
        ];
    }


}
