@extends('default')
@extends('nav-menu')
@section('content')

    @if (session('status'))
        <div class="alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="content">
        <h2>Cars</h2>
        <div class="button-wrapper">
            <div class="button"><a href="{{url('cars/create')}}">New</a></div>
        </div>
        <table class="table table-striped data-table-ajax" data-source="/report-requests">
            <thead>
            <tr>
                <th>Brand</th>
                <th>Model</th>
                <th>Body</th>
                <th>Engine</th>
                <th>Price</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($cars as $car)
                <tr>
                    <th>{{strtoupper( $car->brand->name)}}</th>
                    <th>{{strtoupper( $car->model->name)}}</th>
                    <th>{{strtoupper( $car->bodywork->name)}}</th>
                    <th>{{ isset($car->engine) ? strtoupper( $car->engine->type.' '.$car->engine->cc.' '.($car->engine->has_turbo == 1 ? 'turbo':'')): ''}}</th>
                    <th>{{$car->price}}</th>
                    <th><a href='{{url('cars/edit/'.$car->id)}}'>Edit</a>

                        <a href='' data-id="{{$car->id}}"  data-type="cars" class="delete">Delete</a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop