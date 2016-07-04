@extends('layouts.master')

@section('app-content')

        <div class="header">
            <h1>Register</h1>
            <h2>Get access to this site</h2>
        </div>

        <div class="content">

            <form method="POST" action="/register" class="pure-form pure-form-aligned" id="login">
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
                    <a class="button-secondary pure-button" href="/login">Login</a>
                    <button class="pure-button pure-button-primary" type="submit">Register</button>
                </div>
            </form>

        </div>

@stop