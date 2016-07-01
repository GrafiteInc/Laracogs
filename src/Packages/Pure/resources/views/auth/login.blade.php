@extends('layouts.master')

@section('app-content')

        <div class="header">
            <h1>Login</h1>
            <h2>Access your site here</h2>
        </div>

        <div class="content">

            <form method="POST" action="/login" class="pure-form pure-form-aligned">
                {!! csrf_field() !!}
                <div class="pure-control-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="pure-control-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="pure-control-group">
                    <label>
                        Remember Me <input type="checkbox" name="remember">
                    </label>
                </div>
                <div class="pure-control-group">
                    <a class="button-secondary pure-button" href="/password/email">Forgot Password</a>
                    <button class="pure-button pure-button-primary" type="submit">Login</button>
                </div>

                <div class="pure-control-group">
                    <a class="pure-button button-info" href="/register">Register</a>
                </div>
            </form>

        </div>

@stop

