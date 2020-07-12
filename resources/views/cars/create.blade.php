@extends('default')
@extends('nav-menu')

@section('content')


    <div class="content">
        <h2>New Car</h2>
        <div class="button-wrapper">
            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ isset($car) ? url('cars/update/'.$car->id) : url('cars') }}">
                @if( isset($car))
                    @method('put')
                @endif
                @csrf
                <div class="form-group">
                    <div>
                        <label for="brand_id">Brand</label>
                        <select name="brand_id" class="brand">
                            <option value="">Select Brand</option>
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}" {{(isset($car) && $car->brand_id == $brand->id) || old('brand_id') == $brand->id ? 'selected=selected': ''}}>{{strtoupper($brand->name)}}</option>
                            @endforeach
                        </select>
                        @error('brand_id')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="model">Model</label>
                        <select name="model_id" id="selectModel">
                            <option value="">Select Model</option>
                            @if( isset($car))
                                @foreach($models as $model)
                                    <option value="{{$model->id}}" {{(isset($car) && $car->model_id == $model->id) || old('model_id') == $model->id ? 'selected=selected': ''}}>{{strtoupper($model->name)}}</option>
                                @endforeach
                            @endif

                        </select>
                        @error('model_id')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="bodywork">BodyWork</label>
                        <select name="bodywork_id">
                            <option value="">Select Bodywork</option>
                            @foreach($bodyworks as $bodywork)
                                <option value="{{$bodywork->id}}" {{(isset($car) && $car->bodywork_id == $bodywork->id) || old('bodywork_id') == $bodywork->id ? 'selected=selected': ''}}>{{strtoupper($bodywork->name)}}</option>
                            @endforeach
                        </select>
                        @error('bodywork_id')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="engine_id">Engine</label>
                        <select name="engine_id">
                            <option value="">Select Engine</option>
                            @foreach($engines as $engine)
                                <option value="{{$engine->id}}" {{(isset($car) && $car->engine_id == $engine->id) || old('engine_id') == $engine->id ? 'selected=selected': ''}}>{{strtoupper($engine->type.' '.$engine->cc)}}</option>
                            @endforeach
                        </select>
                        @error('engine_id')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="price">Price</label>
                        <input type="number" name="price" value="{{isset($car)? $car->price :  old('engine')}}" step="0.1">

                        @error('price')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    @if( isset($car))
                        <input type="hidden" name="id" value="{{$car->id}}">
                    @endif
                    <button type="submit"> {{isset($car) ? 'Update' : 'Create'}}</button>

                </div>
            </form>

        </div>

    </div>

@stop