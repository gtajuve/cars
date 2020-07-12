@extends('default')
@extends('nav-menu')

@section('content')


    <div class="content">
        <h2>New Brand</h2>
        <div class="button-wrapper">
            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ isset($brand) ? url('brands/update/'.$brand->id) : url('brands') }}">
                @if( isset($brand))
                    @method('put')
                @endif
                @csrf
                <div class="form-group">

                    <div>
                        <label for="name">Brand</label>
                        <input type="text" name="name" value="{{isset($brand)? $brand->name : old('name')}}" placeholder="Name">
                        @error('name')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="country">Country</label>
                        <select name="country">
                            <option value="">Select Country</option>
                            <option value="germany" {{(isset($brand) && $brand->country == "germany") || old('country') == "germany" ? 'selected=selected': ''}}>{{strtoupper("germany")}}</option>
                            <option value="japan" {{(isset($brand) && $brand->country == "japan") || old('country') == "japan" ? 'selected=selected': ''}}>{{strtoupper("japan")}}</option>
                            <option value="usa" {{(isset($brand) && $brand->country == "usa") || old('country') == "usa" ? 'selected=selected': ''}}>{{strtoupper("usa")}}</option>
                            <option value="france" {{(isset($brand) && $brand->country == "france") || old('country') == "france" ? 'selected=selected': ''}}>{{strtoupper("france")}}</option>
                            <option value="italy" {{(isset($brand) && $brand->country == "italy") || old('country') == "italy" ? 'selected=selected': ''}}>{{strtoupper("italy")}}</option>

                        </select>
                        @error('country')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="created_year">Created Year</label>
                        <input type="number" name="created_year" value="{{isset($brand)? $brand->created_year :  old('created_year')}}" step="1" min="1900" max="{{date("Y")}}">

                        @error('created_year')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    @if( isset($brand))
                        <input type="hidden" name="id" value="{{$brand->id}}">
                    @endif
                    <button type="submit"> {{isset($brand) ? 'Update' : 'Create'}}</button>

                </div>
            </form>

        </div>

    </div>

@stop