<?php

namespace App\Rules;

use App\Car;
use App\Http\Requests\CarRequest;
use Illuminate\Contracts\Validation\Rule;

class UniqueModel implements Rule
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
        $brand = $this->request->get('brand');
        $model = $this->request->get('model');

        $carsBrand = Car::select('brand')->where([
            'model' => $model
        ])->distinct()->orderBy('brand')->get();

        return count($carsBrand) == 0 || $carsBrand[0]->brand == $brand;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Model is assigned to other brand';
    }
}
