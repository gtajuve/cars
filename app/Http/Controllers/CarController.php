<?php

namespace App\Http\Controllers;

use App\Bodywork;
use App\Brand;
use App\Car;
use App\CarModel;
use App\Engine;
use App\Http\Requests\CarRequest;
use App\Rules\UniqueCar;
use App\Rules\UniqueModel;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        return view('cars.index',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $bodyworks = Bodywork::all();
        $engines = Engine::all();
        return view('cars.create',compact(['bodyworks', 'brands', 'engines']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request)
    {
        $this->validate($request, ['model_id' => new UniqueCar($request)]);

        $cars = Car::create($request->all());
        return redirect('cars')->with(['status' => 'Record successfully created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
        $brands = Brand::all();
        $bodyworks = Bodywork::all();
        $engines = Engine::all();
        $models = CarModel::getModelByBrandId($car->brand->id);
        return view('cars.create',compact(['car','bodyworks', 'brands', 'engines', 'models']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CarRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarRequest $request, $id)
    {
        $this->validate($request, ['brand' => new UniqueCar($request)]);
        $car = Car::find($id);

        if (!$car) {
            return redirect('cars')->with(['status' => 'Sorry, we couldn\'t find that car.']);
        }

        $car->update($request->all());
        return redirect('cars')->with(['status' => 'Price was successfully updated!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);

        if (!$car) {
            return json_encode(array('statusCode'=>404));
        }

        $car->delete();
        return json_encode(array('statusCode'=>200));

//        return redirect('cars')->with(['success' => 'Car was successfully deleted!']);
    }
}
