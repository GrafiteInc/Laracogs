@extends('layouts.master')

@section('app-content')

        <div class="header">
            <h1>Password Reset</h1>
            <h2>Get your password reset</h2>
        </div>

        <div class="content">

            <form method="POST" action="/password/reset" class="pure-form pure-form-aligned">
                {!! csrf_field() !!}
                <input type="hidden" name="token" value="{{ $token }}">

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
                    <button class="btn btn-primary" type="submit">Reset Password</button>
                </div>
            </form>
        </div>

@stop