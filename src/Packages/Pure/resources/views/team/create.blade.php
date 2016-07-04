@extends('dashboard')

@section('content')

        <div class="header">
            <h1>Team Creator</h1>
        </div>
        <div class="content">
            @include('partials.errors')
            @include('partials.message')
             {!! Form::open(['route' => 'teams.store', 'class' => 'pure-form pure-form-aligned']) !!}

                @form_maker_table("teams", ['name' => 'string'])

                {!! Form::submit('Save', ['class' => 'pure-button pure-button-primary']) !!}

                {!! Form::close() !!}
        </div>


@stop