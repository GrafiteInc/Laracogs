@extends('layouts.master')

@section('app-content')

    <div class="col-sm-3 col-md-2 sidebar">
        <div class="raw-margin-bottom-90">
            @include('dashboard.panel')
        </div>
    </div>

    <div class="col-sm-9 col-md-10 main">
        @yield('content')
    </div>

@stop
