<?php

namespace App\Http\Controllers;

use App\Brand;
use App\CarModel;
use App\Http\Requests\ModelRequest;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = CarModel::with('brand')->get();
        return view('models.index',compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('models.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModelRequest $request)
    {
        CarModel::create($request->all());
        return redirect('models')->with(['status' => 'Record successfully created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = Brand::all();

        $model = CarModel::with('brand')->findOrFail($id);
        return view('models.create',compact(['model','brands']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModelRequest $request, $id)
    {
        $model = CarModel::find($id);

        if (!$model) {
            return redirect('models')->with(['status' => 'Sorry, we couldn\'t find that car.']);
        }

        $model->update($request->all());
        return redirect('models')->with(['status' => 'Price was successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = CarModel::find($id);

        if (!$model) {
            return json_encode(array('statusCode'=>404));
        }

        $model->delete();
        return json_encode(array('statusCode'=>200));
    }

    /**
     * Get models by brand
     *
     * @param  int  $brandId
     * @return \Illuminate\Http\Response
     */
    public function getModelsByBrand($brandId)
    {
        $models = CarModel::getModelByBrandId($brandId);

        return json_encode(['statusCode'=>200,'data'=>$models]);
    }

}
