@extends('default')
@extends('nav-menu')

@section('content')


    <div class="content">
        <h2>New Model</h2>
        <div class="button-wrapper">
            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ isset($model) ? url('models/update/'.$model->id) : url('models') }}">
                @if( isset($model))
                    @method('put')
                @endif
                @csrf
                <div class="form-group">
                    <div>
                        <select name="brand_id">
                            <option value="">Select Brand</option>
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}" {{(isset($model) && $model->brand_id == $brand->id) || old('brand_id') == $brand->id ? 'selected=selected': ''}}>{{strtoupper($brand->name)}}</option>
                            @endforeach
                        </select>
                        @error('brand_id')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="model">Name</label>
                        <input type="text" name="name" value="{{isset($model)? $model->name : old('name')}}">
                        @error('name')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="manufacture_country">Manufacture Country</label>
                        <select name="manufacture_country">
                            <option value="">Select Country</option>
                            <option value="germany" {{(isset($model) && $model->manufacture_country == "germany") || old('manufacture_country') == "germany" ? 'selected=selected': ''}}>{{strtoupper("germany")}}</option>
                            <option value="japan" {{(isset($model) && $model->manufacture_country == "japan") || old('manufacture_country') == "japan" ? 'selected=selected': ''}}>{{strtoupper("japan")}}</option>
                            <option value="usa" {{(isset($model) && $model->manufacture_country == "usa") || old('manufacture_country') == "usa" ? 'selected=selected': ''}}>{{strtoupper("usa")}}</option>
                            <option value="france" {{(isset($model) && $model->manufacture_country == "france") || old('manufacture_country') == "france" ? 'selected=selected': ''}}>{{strtoupper("france")}}</option>
                            <option value="italy" {{(isset($model) && $model->manufacture_country == "italy") || old('manufacture_country') == "italy" ? 'selected=selected': ''}}>{{strtoupper("italy")}}</option>
                            <option value="china" {{(isset($model) && $model->manufacture_country == "china") || old('manufacture_country') == "china" ? 'selected=selected': ''}}>{{strtoupper("china")}}</option>
                            <option value="turkey" {{(isset($model) && $model->manufacture_country == "turkey") || old('manufacture_country') == "turkey" ? 'selected=selected': ''}}>{{strtoupper("turkey")}}</option>
                        </select>
                        @error('manufacture_country')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="started_year">Stared Year</label>
                        <input type="number" name="started_year" value="{{isset($model)? $model->started_year :  old('started_year')}}" step="1" min="1900" max="{{date("Y")}}">

                        @error('started_year')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="ended_year">Ended Year</label>
                        <input type="number" name="ended_year" value="{{isset($model)? $model->created_year :  old('ended_year')}}" step="1" min="1900" max="{{date("Y")}}">

                        @error('ended_year')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="is_electric">Is Electric</label>
                        <input type="checkbox" name="is_electric"  {{isset($model) && $model->is_electric == 1? "checked": ""}} >

                        @error('is_electric')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    @if( isset($model))
                        <input type="hidden" name="id" value="{{$model->id}}">
                    @endif
                    <button type="submit"> {{isset($model) ? 'Update' : 'Create'}}</button>

                </div>
            </form>

        </div>

    </div>

@stop