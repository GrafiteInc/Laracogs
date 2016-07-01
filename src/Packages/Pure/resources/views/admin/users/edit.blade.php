@extends('dashboard')

@section('content')

    <div class="header">
            <h1>User Admin: Edit</h1>
            @if (! Session::get('original_user'))
                <a class="btn btn-default pull-right" href="/admin/users/switch/{{ $user->id }}">Login as this User</a>
            @endif

        </div>

        <div class="content">
            <form method="POST" action="/admin/users/{{ $user->id }}" class="pure-form pure-form-aligned">
                <input name="_method" type="hidden" value="PATCH">
                {!! csrf_field() !!}

                <div class="pure-control-group">
                    @input_maker_label('Email')
                    @input_maker_create('email', ['type' => 'string'], $user)
                </div>

                <div class="pure-control-group">
                    @input_maker_label('Name')
                    @input_maker_create('name', ['type' => 'string'], $user)
                </div>

                @include('user.meta')

                <div class="pure-control-group">
                    @input_maker_label('Role')
                    @input_maker_create('roles', ['type' => 'relationship', 'model' => 'App\Repositories\Role\Role', 'label' => 'label', 'value' => 'name'], $user)
                </div>

                <div class="pure-control-group">
                    <a class="button-secondary pure-button" href="{{ URL::previous() }}">Cancel</a>
                    <button class="pure-button pure-button-primary" type="submit">Save</button>
                </div>
            </form>
        </div>

@stop