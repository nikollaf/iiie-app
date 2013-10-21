@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: Account Login
@stop

{{-- Content --}}
@section('content')
<div class="row">

    <div class="col-md-5">
        <div class="">
            <h3>Please log in.</h3>
        </div>
        <form method="post" action="" class="">

            <!-- CSRF Token -->
            <input type="hidden" name="csrf_token" id="csrf_token" value="{{{ Session::getToken() }}}" />



            <div class="form-group">
                <label for="Email" class="">Email</label>

                <input name="email" type="text" class="form-control" placeholder="Enter email" value="{{{ Input::old('email') }}}">
                {{{ $errors->first('email') }}}
            </div>
            <!-- ./ email -->

            <!-- Password -->
            <div class="form-group">
                <label for="Email">Password</label>
                <input name="password" type="password" class="form-control" placeholder="Enter password" value="">
                {{{ $errors->first('password') }}}
            </div>
            <!-- ./ password -->


            <!-- ./ login button -->

            <p>If you do not already have an account, please click <strong><a href="{{{ URL::to('account/register')}}}">here to register.</a></strong></p>

            <!-- Login button -->
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-success">Login</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-5">

    </div>
</div>
@stop
