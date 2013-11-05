@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: Account Signup
@stop

{{-- Content --}}
@section('content')

<div class="row">
    <h3 class="page-title">Post Your Notes</h3>
    <div class="col-md-8">
        <form role="form" method="post" action="">
            <!-- CSRF Token -->
            <input type="hidden" name="csrf_token" id="csrf_token" value="{{{ Session::getToken() }}}" />


            @if (Request::is('notes/edit/*'))
               
                    <div class="form-group">
                        <label class="checkbox-inline">
                          <input type="radio" name="blog_post_status" id="inlineCheckbox1" value="APPROVED"> 
                          <span class="btn-lg btn-success">APPROVE</span>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="blog_post_status" id="inlineCheckbox2" value="DENY"> 
                          <span class="btn-danger btn-lg">DENY</span>
                        </label>


                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                
            @endif

            <!-- Title -->
            <div class="form-group {{{ $errors->has('first_name') ? 'text-error' : '' }}}">
                <label for="title">Title</label>
                    <input class="form-control" type="text" name="title" id="title" 
                    @if (Request::is('notes/edit/*'))
                    value="{{ Request::old('title', $blog->title) }}" 
                    @elseif
                     value="{{ Request::old('title') }}"
                     @endif/>
                    <span class="text-danger">{{{ $errors->first('title') }}}</span>
            </div>
            <!-- ./ title -->

            <!-- Content -->
            <div class="form-group {{{ $errors->has('content') ? 'error' : '' }}}">
                <label for="content">Body</label>
                    <textarea class="blog-area form-control" rows="25" name="content" value="{{{ Request::old('content') }}}">
                    @if (Request::is('notes/edit/*'))
                        {{ Purifier::clean($blog->content) }}
                    @endif
                    </textarea>
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
