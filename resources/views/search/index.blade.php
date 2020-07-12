@extends('default')
@extends('nav-menu')
@section('content')


    <div class="content">
        <h2>Search Cars</h2>
        <div class="row">
            <h4>Choose bodywork</h4>
            @foreach($bodyworks as $bodywork)
                <div class="bodywork" data-type="{{$bodywork->id}}">{{strtoupper($bodywork->name)}}</div>
            @endforeach
        </div>
        <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="">

            @csrf
            <div class="form-group">

                <div>
                    <label for="brand">Brand</label>
                    <select name="brand" id="selectBrand" class="searchableSelect brand">
                        <option value="">Select Brand</option>
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}" {{ old('brand') == $brand->id ? 'selected=selected': ''}}>{{strtoupper($brand->name)}}</option>
                        @endforeach
                    </select>
                    @error('brand')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="model">Model</label>
                    <select name="model" id="selectModel" class="searchableSelect">
                        <option value="">Select Model</option>
                    </select>
                    @error('model')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="engine">Engine</label>
                    <select name="engine" id="selectEngine" class="searchableSelect">
                        <option value="">Select Engine</option>
                        @foreach($engines as $engine)
                            <option value="{{$engine}}" {{ old('engine') == $engine ? 'selected=selected': ''}}>{{strtoupper( $engine->type.' '.$engine->cc.' '.($engine->has_turbo == 1 ? 'turbo':''))}}</option>
                        @endforeach
                    </select>
                    @error('engine')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <p>
                    <label for = "price">Price range:</label>
                    <input type = "text" id = "price"
                           style = "border:0; color:blue; font-weight:bold;">

                    <div id = "slider-3"></div>
                </p>
                <input type="hidden" name="bodywork">
                <input type="hidden" name="min_price">
                <input type="hidden" name="max_price">
                <button type="submit"> Show Cars</button>

                <p id="result"></p>

            </div>
        </form>

    </div>

@stop