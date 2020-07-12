@extends('default')
@extends('nav-menu')
@section('content')
    @if (session('status'))
        <div class="alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="content">
        <h2>Price List</h2>
        <div class="button-wrapper">
            <div class="button"><a href="{{url('pricelist/create')}}">New</a></div>
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
            @foreach($carsPriceList as $price)
                <tr>

                    <th>{{strtoupper( $price->car->brand)}}</th>
                    <th>{{strtoupper( $price->car->model)}}</th>
                    <th>{{strtoupper( $price->car->bodywork)}}</th>
                    <th>{{$price->car->engine}}</th>
                    <th>{{$price->price}}</th>
                    <th><a href='{{url('pricelist/edit/'.$price->id)}}'>Edit</a>

                        <a href='' data-id="{{$price->id}}"  data-type="pricelist" class="delete">Delete</a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop