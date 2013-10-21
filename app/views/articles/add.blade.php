@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: Account Signup
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <h3 class="page-title">Add Article</h3>
    <div class="col-md-8">
        <form role="form" method="post">

            <!-- CSRF Token -->
            <input type="hidden" name="csrf_token" id="csrf_token" value="{{{ Session::getToken() }}}" />

            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input name="article_title" placeholder="Enter title here."
                       value="{{{ Request::old('article_title') }}}"
                       class="form-control" placeholder="Enter name">
                <span class="text-danger">{{{ $errors->first('article_title') }}}</span>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Article URL</label>
                <input name="article_url" type="url" placeholder="Please copy and paste full url here."
                       value="{{{ Request::old('article_url') }}}"
                       class="form-control" placeholder="Enter name">
                <span class="text-danger">{{{ $errors->first('article_url') }}}</span>
            </div>

            <label>Description</label>
            <textarea class="form-control" placeholder="Write a short description about the article"
                      name="article_info" rows="4">{{{ Request::old('article_info') }}}</textarea>
            <span class="text-danger">{{{ $errors->first('article_info') }}}</span>
            <br>
            <button type="submit" class="btn btn-success">Post</button>

            <!-- user id -->
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        </form>
</div>
</div>
@stop
