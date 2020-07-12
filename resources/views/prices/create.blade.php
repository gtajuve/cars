@extends('default')
@extends('nav-menu')

@section('content')

    <div class="content">
        <h2>New Car</h2>
        <div class="button-wrapper">
            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ isset($price) ? url('pricelist/update/'.$price->id) : url('pricelist') }}">
                @if( isset($price))
                    @method('put')
                @endif
                @csrf
                <div class="form-group">

                    <div>
                        <label for="car_id">Car</label>
                        <select name="car_id" {{isset($price)? 'disabled' : ''}} >
                            <option value="">Select Car</option>
                            @foreach($cars as $car)
                                <option value="{{$car->id}}" {{(isset($price) && $price->car->id == $car->id) || old('car_id') == $car->id ? 'selected=selected': ''}}>{{strtoupper($car->brand).' '.strtoupper($car->model).' '.strtoupper($car->bodywork).' '.$car->engine}}</option>
                            @endforeach
                        </select>
                        @error('car_id')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="price">Price</label>
                        <input type="number" name="price" value="{{isset($price)? $price->price :  old('price')}}" step="1">

                        @error('price')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit"> {{isset($price) ? 'Update' : 'Create'}}</button>

                </div>
            </form>

        </div>

    </div>

@stop