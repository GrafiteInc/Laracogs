@extends('layouts.master')

@section('app-content')

        <div class="header">
            <h1>Forgot Password</h1>
            <h2>Get a new password</h2>
        </div>

        <div class="content">

            <form method="POST" action="/password/email" class="pure-form pure-form-aligned">
                {!! csrf_field() !!}
                @include('partials.errors')
                @include('partials.status')
                <div class="pure-control-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" placeholder="Email Address" value="{{ old('email') }}">
                </div>
                <div class="pure-control-group">
                    <a class="button-secondary pure-button" href="/login">Wait I remember!</a>
                    <button class="pure-button pure-button-primary" type="submit" class="button">Send Password Reset Link</button>
                </div>
            </form>

        </div>

@stop
