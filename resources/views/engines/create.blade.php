@extends('default')
@extends('nav-menu')

@section('content')


    <div class="content">
        <h2>New Engine</h2>
        <div class="button-wrapper">
            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ isset($engine) ? url('engines/update/'.$engine->id) : url('engines') }}">
                @if( isset($engine))
                    @method('put')
                @endif
                @csrf
                <div class="form-group">
                    <div>
                        <label for="type">Type</label>
                        <select name="type">
                            <option value="">Select Type</option>
                            <option value="petrol" {{(isset($engine) && $engine->type == "petrol") || old('type') == "petrol" ? 'selected=selected': ''}}>{{strtoupper("petrol")}}</option>
                            <option value="diesel" {{(isset($engine) && $engine->type == "diesel") || old('type') == "diesel" ? 'selected=selected': ''}}>{{strtoupper("diesel")}}</option>
                            <option value="hybrid" {{(isset($engine) && $engine->type == "hybrid") || old('type') == "hybrid" ? 'selected=selected': ''}}>{{strtoupper("hybrid")}}</option>

                        </select>
                        @error('type')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="cc">CC</label>
                        <input type="number" name="cc" value="{{isset($engine)? $engine->cc :  old('cc')}}" step="100" min="100">
                        @error('cc')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="numbers_of_cylinders">Number of cylinders</label>
                        <input type="number" name="numbers_of_cylinders" value="{{isset($engine)? $engine->numbers_of_cylinders :  old('numbers_of_cylinders')}}" step="1" min="1">
                        @error('numbers_of_cylinders')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="has_turbo">Has Turbo</label>
                        <input type="checkbox" name="has_turbo"  {{isset($engine) && $engine->has_turbo == 1? "checked": ""}} >

                        @error('has_turbo')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit"> {{isset($engine) ? 'Update' : 'Create'}}</button>

                </div>
            </form>

        </div>

    </div>

@stop