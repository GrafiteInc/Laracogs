@extends('dashboard')

@section('content')

    <div class="header">
            <h1>Role Admin: Edit</h1>
        </div>

        <div class="content">
            <form method="POST" action="/admin/roles/{{ $role->id }}" class="pure-form pure-form-aligned">
                <input name="_method" type="hidden" value="PATCH">
                {!! csrf_field() !!}

                <div class="pure-control-group">
                    @input_maker_label('Name')
                    @input_maker_create('name', ['type' => 'string'], $role)
                </div>

                <div class="pure-control-group">
                    @input_maker_label('Label')
                    @input_maker_create('label', ['type' => 'string'], $role)
                </div>

                <div class="pure-control-group">
                    <a class="button-secondary pure-button" href="{{ URL::previous() }}">Cancel</a>
                    <button class="pure-button pure-button-primary" type="submit">Save</button>
                </div>
            </form>
        </div>

@stop