<?php

namespace App\Http\Controllers;

use App\Engine;
use App\Http\Requests\EngineRequest;
use App\Rules\UniqueEngine;
use Illuminate\Http\Request;

class EngineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $engines = Engine::all();
        return view('engines.index',compact('engines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('engines.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EngineRequest $request)
    {
        $this->validate($request, ['type' => new UniqueEngine($request)]);

        $engine = Engine::create($request->all());
        return redirect('engines')->with(['status' => 'Record was successfully created!']);
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
        $engine = Engine::find($id);
        return view('engines.create',compact(['engine']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EngineRequest $request, $id)
    {
        $this->validate($request, ['type' => new UniqueEngine($request)]);

        $engine = Engine::find($id);

        if (!$engine) {
            return redirect('engines')->with(['status' => 'Sorry, we couldn\'t find that engine.']);
        }

        $engine->update($request->all());
        return redirect('engines')->with(['status' => 'Engines was successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $engine = Engine::find($id);

        if (!$engine) {
            return json_encode(array('statusCode'=>404));
        }

        $engine->delete();
        return json_encode(array('statusCode'=>200));
    }
}
