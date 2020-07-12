<?php

namespace App\Rules;

use App\Car;
use App\Http\Requests\CarRequest;
use Illuminate\Contracts\Validation\Rule;

class UniqueCar implements Rule
{
    private $request;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(CarRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $brand = $this->request->get('brand_id');
        $model = $this->request->get('model_id');
        $bodywork = $this->request->get('bodywork_id');
        $engine = $this->request->get('engine_id');
        $cars = Car::where([
            'brand_id' => $brand,
            'model_id' => $model,
            'bodywork_id' => $bodywork,
            'engine_id' => $engine
        ])->limit(1)->get();
        $isSameCar= true;
        if ($this->request->get('id') && $cars[0]->id != $this->request->get('id')){
            $isSameCar = false;
        }

        return count($cars) < 1 && $isSameCar;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The car already exist';
    }
}
