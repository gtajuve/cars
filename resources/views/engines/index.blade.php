@extends('default')
@extends('nav-menu')
@section('content')

    @if (session('status'))
        <div class="alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="content">
        <h2>Engines</h2>
        <div class="button-wrapper">
            <div class="button"><a href="{{url('engines/create')}}">New</a></div>
        </div>
        <table class="table table-striped data-table-ajax" data-source="/report-requests">
            <thead>
            <tr>
                <th>Type</th>
                <th>CC</th>
                <th>Number of cylinders</th>
                <th>Has Turbo</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($engines as $engine)
                <tr>

                    <th>{{strtoupper( $engine->type)}}</th>
                    <th>{{strtoupper( $engine->cc)}}</th>
                    <th>{{strtoupper( $engine->numbers_of_cylinders)}}</th>
                    <th>{{$engine->has_turbo}}</th>
                    <th><a href='{{url('engines/edit/'.$engine->id)}}'>Edit</a>

                        <a href='' data-id="{{$engine->id}}"  data-type="engines" class="delete">Delete</a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop