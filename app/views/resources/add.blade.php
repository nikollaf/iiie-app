@extends('layouts.default')



{{-- Content --}}
@section('content')
<div class="row">
    <h3 class="page-title">Add Resource</h3>
    <div class="col-md-8">
        <form role="form" method="post">

            <!-- CSRF Token -->
            <input type="hidden" name="csrf_token" id="csrf_token" value="{{{ Session::getToken() }}}" />

            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input name="resource_title" placeholder="Enter title here."
                       value="{{{ Request::old('resource_title') }}}"
                       class="form-control" placeholder="Enter name">
            </div>

            <label>Pick Level of Resource</label>
            <select class="form-control" name="level">
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate </option>
                <option value="Advanced">Advanced</option>
            </select>
            <br>

            <div class="form-group">
                <label for="exampleInputEmail1">URL</label>
                <input name="resource_url" type="url" placeholder="Please copy and paste full url here."
                       value="{{{ Request::old('resource_url') }}}"
                       class="form-control" placeholder="Enter name">
            </div>


            <br>
            <button type="submit" class="btn btn-success">Post</button>

            <!-- user id -->
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        </form>
    </div>
</div>
@stop