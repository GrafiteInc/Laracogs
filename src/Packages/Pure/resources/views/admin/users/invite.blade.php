@extends('dashboard')

@section('content')


    <div class="header">
            <h1>User Admin: Invite</h1>
        </div>

        <div class="content">
            <form method="POST" action="/admin/users/invite" class="pure-form pure-form-aligned">
                {!! csrf_field() !!}

                <div class="pure-control-group">
                    @input_maker_label('Email')
                    @input_maker_create('email', ['type' => 'string'])
                </div>

                <div class="pure-control-group">
                    @input_maker_label('Name')
                    @input_maker_create('name', ['type' => 'string'])
                </div>

                <div class="pure-control-group">
                    @input_maker_label('Role')
                    @input_maker_create('roles', ['type' => 'relationship', 'model' => 'App\Repositories\Role\Role', 'label' => 'label', 'value' => 'name'])
                </div>

                <div class="pure-control-group">
                    <a class="button-secondary pure-button" href="{{ URL::previous() }}">Cancel</a>
                    <button class="pure-button pure-button-primary" type="submit">Invite</button>
                </div>
            </form>
        </div>

@stop