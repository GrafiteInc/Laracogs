@extends('layouts.master')

@section('app-content')

    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            <h1 class="text-center">Register</h1>

            <form method="POST" action="/register">
                {!! csrf_field() !!}

                <div class="pure-control-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                </div>
                <div class="pure-control-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="pure-control-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="pure-control-group">
                    <label>Confirm Password</label>
                    <input class="form-control" type="password" name="password_confirmation">
                </div>
                <div class="pure-control-group">
                    <a class="btn btn-default pull-left" href="/login">Login</a>
                    <button class="btn btn-primary pull-right" type="submit">Register</button>
                </div>
            </form>

        </div>
    </div>

@stop