@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: Account Signup
@stop

{{-- Content --}}
@section('content')

<div class="row">
    <h3 class="page-title">Share Your Idea</h3>
    <div class="col-md-8">
        <form role="form" method="post" action="">
            <!-- CSRF Token -->
            <input type="hidden" name="csrf_token" id="csrf_token" value="{{{ Session::getToken() }}}" />

            <!-- Title -->
            <div class="form-group {{{ $errors->has('first_name') ? 'text-error' : '' }}}">
                <label for="title">Title</label>
                    <input class="form-control" type="text" name="title" id="title" value="{{{ Request::old('title') }}}" />
                    <span class="text-danger">{{{ $errors->first('title') }}}</span>
            </div>
            <!-- ./ title -->

            <!-- Content -->
            <div class="form-group {{{ $errors->has('content') ? 'error' : '' }}}">
                <label for="content">Body</label>
                    <textarea class="blog-area form-control" rows="25" name="content" value="{{{ Request::old('content') }}}"></textarea>
                    {{{ $errors->first('content') }}}
            </div>


            <!-- user id -->
           <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">


            <!-- Signup button -->
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-success">Post</button>
                </div>
            </div>
            <!-- ./ signup button -->
        </form>
    </div>
</div>
@stop
