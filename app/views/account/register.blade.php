@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: Account Signup
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-lg-5">
        <div>
            <h3>Register</h3>
            <p>Registered users are allowed at add events, write a blog, post an article, or add a helpful resource.</p>
        </div>
        <form method="post" action="" class="">
            <!-- CSRF Token -->
            <input type="hidden" name="csrf_token" id="csrf_token" value="{{{ Session::getToken() }}}" />

            <!-- First Name -->
            <div class="form-group">
                <label for="first_name">First Name</label>

                    <input type="text" class="form-control" name="first_name" id="first_name" value="{{{ Request::old('first_name') }}}" />
                    <p><span class="text-danger">{{{ $errors->first('first_name') }}}</span></p>

            </div>
            <!-- ./ first name -->

            <!-- Last Name -->
            <div class="form-group">
                <label for="last_name">Last Name</label>

                    <input type="text" class="form-control" name="last_name" id="last_name" value="{{{ Request::old('last_name') }}}" />
                    <span class="text-danger">{{{ $errors->first('last_name') }}}</span>

            </div>
            <!-- ./ last name -->

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>

                    <input type="text" class="form-control" name="email" id="email" value="{{{ Request::old('email') }}}" />
                    <span class="text-danger">{{{ $errors->first('email') }}}</span>

            </div>
            <!-- ./ email -->

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>

                    <input type="password" class="form-control" name="password" id="password" value="" />
                    <span class="text-danger">{{{ $errors->first('password') }}}</span>
            </div>
            <!-- ./ password -->

            <!-- Password Confirm -->
            <div class="form-group">
                <label for="password_confirmation">Password Confirm</label>

                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="" />
                    <span class="text-danger">{{{ $errors->first('password_confirmation') }}}</span>

            </div>
            <!-- ./ password confirm -->

            <!-- Password Confirm -->
            <div class="form-group">
                <label for="captcha">Enter the text in this image below</label>

                <?php echo $captchaImage; ?>

                <input type="text" class="form-control" name="captcha" id="captcha" value="" />
                <span class="text-danger">{{{ $errors->first('captcha') }}}</span>

            </div>
            <!-- ./ password confirm -->

            <!-- Signup button -->
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-success">Sign Up</button>
                </div>
            </div>
            <!-- ./ signup button -->
        </form>
    </div>
</div>
@stop
