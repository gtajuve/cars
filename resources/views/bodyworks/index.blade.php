@extends('default')
@extends('nav-menu')
@section('content')

    @if (session('status'))
        <div class="alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="content">
        <h2>Bodyworks</h2>
        <div class="button-wrapper">
            <div class="button"><a href="{{url('bodyworks/create')}}">New</a></div>
        </div>
        <table class="table table-striped data-table-ajax" data-source="/report-requests">
            <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($bodyworks as $bodywork)
                <tr>

                    <th>{{strtoupper( $bodywork->name)}}</th>

                    <th><a href='{{url('bodyworks/edit/'.$bodywork->id)}}'>Edit</a>

                        <a href='' data-id="{{$bodywork->id}}"  data-type="bodyworks" class="delete">Delete</a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop