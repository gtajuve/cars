<?php

namespace App\Http\Controllers;

use App\Car;
use App\CarPrice;
use App\Http\Requests\PriceRequest;
use Illuminate\Http\Request;

class CarPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carsPriceList = CarPrice::with('car')->get();
        return view('prices.index',compact('carsPriceList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::all();
        return view('prices.create',compact('cars'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PriceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PriceRequest $request)
    {
        $price = CarPrice::create($request->all());
        return redirect('pricelist')->with(['status' => 'Record successfully created!']);
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
        $cars = Car::all();
        $price = CarPrice::find($id);
        return view('prices.create',compact(['cars','price']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\PriceRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PriceRequest $request, $id)
    {
        $price = CarPrice::find($id);

        if (!$price) {
            return redirect('pricelist')->with(['status' => 'Sorry, we couldn\'t find that price.']);
        }

        $price->update($request->all());
        return redirect('pricelist')->with(['status' => 'Price was successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price = CarPrice::find($id);

        if (!$price) {
            return json_encode(array('statusCode'=>404));
        }

        $price->delete();
        return json_encode(array('statusCode'=>200));
    }
}
