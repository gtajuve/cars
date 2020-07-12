@extends('default')
@extends('nav-menu')
@section('content')

    @if (session('status'))
        <div class="alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="content">
        <h2>Brands</h2>
        <div class="button-wrapper">
            <div class="button"><a href="{{url('brands/create')}}">New</a></div>
        </div>
        <table class="table table-striped data-table-ajax" data-source="/report-requests">
            <thead>
            <tr>
                <th>Brand</th>
                <th>Country</th>
                <th>Created Year</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($brands as $brand)
                <tr>

                    <th>{{strtoupper( $brand->name)}}</th>
                    <th>{{strtoupper( $brand->country)}}</th>
                    <th>{{strtoupper( $brand->created_year)}}</th>
                    <th><a href='{{url('brands/edit/'.$brand->id)}}'>Edit</a>

                        <a href='' data-id="{{$brand->id}}"  data-type="brands" class="delete">Delete</a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop