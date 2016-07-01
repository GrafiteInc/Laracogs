@extends('dashboard')

@section('content')

        <div class="header">
            <h1>Password Reset</h1>
            <h2>Change password here</h2>
        </div>

        <div class="content">
        <form method="POST" action="/user/password" class="pure-form pure-form-aligned">
            {!! csrf_field() !!}

            <div class="pure-control-group">
                @input_maker_label('Old Password')
                @input_maker_create('old_password', ['type' => 'password', 'placeholder' => 'Old Password'])
            </div>

            <div class="pure-control-group">
                @input_maker_label('New Password')
                @input_maker_create('new_password', ['type' => 'password', 'placeholder' => 'New Password'])
            </div>

            <div class="pure-control-group">
                @input_maker_label('Confirm Password')
                @input_maker_create('new_password_confirmation', ['type' => 'password', 'placeholder' => 'Confirm Password'])
            </div>

            <div class="pure-control-group">
                <a class="btn btn-default pull-left" href="{{ URL::previous() }}">Cancel</a>
                <button class="btn btn-primary pull-right" type="submit">Save</button>
            </div>
        </form>
    </div>

@stop
