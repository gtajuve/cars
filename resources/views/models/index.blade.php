@extends('default')
@extends('nav-menu')
@section('content')
    @if (session('status'))
        <div class="alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="content">
        <h2>Models</h2>
        <div class="button-wrapper">
            <div class="button"><a href="{{url('models/create')}}">New</a></div>
        </div>
        <table class="table table-striped data-table-ajax" data-source="/report-requests">
            <thead>
            <tr>
                <th>Brand</th>
                <th>Model</th>
                <th>Manufacture Country</th>
                <th>Is Electric</th>
                <th>Started Year</th>
                <th>Ended Year</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($models as $model)
                <tr>

                    <th>{{strtoupper( $model->brand->name)}}</th>
                    <th>{{strtoupper( $model->name)}}</th>
                    <th>{{strtoupper( $model->manufacture_country)}}</th>
                    <th>{{$model->is_electric}}</th>
                    <th>{{$model->started_year}}</th>
                    <th>{{$model->ended_year}}</th>
                    <th><a href='{{url('models/edit/'.$model->id)}}'>Edit</a>

                        <a href='' data-id="{{$model->id}}"  data-type="models" class="delete">Delete</a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop