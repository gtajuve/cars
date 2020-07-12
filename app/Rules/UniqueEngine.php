<?php

namespace App\Rules;

use App\Engine;
use App\Http\Requests\EngineRequest;
use Illuminate\Contracts\Validation\Rule;

class UniqueEngine implements Rule
{
    private $request;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(EngineRequest $request)
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
        $type = $this->request->get('type');
        $cc = $this->request->get('cc');
        $numberOfCylinders = $this->request->get('numbers_of_cylinders');
        $hasTurbo = $this->request->get('has_turbo');
        $engineCount = Engine::where([
            'type' => $type,
            'cc' => $cc,
            'numbers_of_cylinders' => $numberOfCylinders,
            'has_turbo' => $hasTurbo
        ])->count();
        return $engineCount < 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Engine already exist.';
    }
}
