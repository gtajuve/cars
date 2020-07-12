@extends('default')
@extends('nav-menu')

@section('content')


    <div class="content">
        <h2>New Car</h2>
        <div class="button-wrapper">
            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ isset($bodywork) ? url('bodyworks/update/'.$bodywork->id) : url('bodyworks') }}">
                @if( isset($bodywork))
                    @method('put')
                @endif
                @csrf
                <div class="form-group">
                    <div>
                        <label for="name">Brand</label>
                        <input type="text" name="name" value="{{isset($bodywork)? $bodywork->name : old('name')}}" >
                        @error('name')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit"> {{isset($bodywork) ? 'Update' : 'Create'}}</button>

                </div>
            </form>

        </div>

    </div>

@stop