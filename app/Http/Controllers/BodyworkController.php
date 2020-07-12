<?php

namespace App\Http\Controllers;

use App\Bodywork;
use App\Http\Requests\BodyworkRequest;
use Illuminate\Http\Request;

class BodyworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bodyworks = Bodywork::all();
        return view('bodyworks.index',compact('bodyworks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bodyworks.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BodyworkRequest $request)
    {
        $bodyworks = Bodywork::create($request->all());
        return redirect('bodyworks')->with(['status' => 'Bodyworks was successfully created!']);
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
        $bodywork = Bodywork::find($id);
        return view('bodyworks.create',compact(['bodywork']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BodyworkRequest $request, $id)
    {
        $bodywork = Bodywork::find($id);

        if (!$bodywork) {
            return redirect('bodyworks')->with(['status' => 'Sorry, we couldn\'t find that bodywork.']);
        }

        $bodywork->update($request->all());
        return redirect('bodyworks')->with(['status' => 'Bodywork was successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bodywork = Bodywork::find($id);

        if (!$bodywork) {
            return json_encode(array('statusCode'=>404));
        }

        $bodywork->delete();
        return json_encode(array('statusCode'=>200));
    }
}
