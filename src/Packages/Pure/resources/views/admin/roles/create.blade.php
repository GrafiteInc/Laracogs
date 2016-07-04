@extends('dashboard')

@section('content')

    <div class="header">
            <h1>Role Admin: Create</h1>
        </div>

        <div class="content">
            <form method="POST" action="/admin/roles" class="pure-form pure-form-aligned">
                {!! csrf_field() !!}

                <div class="pure-control-group">
                    @input_maker_label('Name')
                    @input_maker_create('name', ['type' => 'string'])
                </div>

                <div class="pure-control-group">
                    @input_maker_label('Label')
                    @input_maker_create('label', ['type' => 'string'])
                </div>

                <div class="pure-control-group">
                    <a class="button-secondary pure-button" href="{{ URL::previous() }}">Cancel</a>
                    <button class="pure-button pure-button-primary" type="submit">Create</button>
                </div>
            </form>
        </div>
@stop