@extends('layouts.default')

@section('content')

<div class="row">



    <div class="col-md-8">
        <h3 class="page-title"></h3>
        <div class="front-content blog">

                <h3 class="">{{{ $blog->title }}}</h3>
                <p class="blog-cred"><small>by</small><strong> {{{ $blog->user->fullName() }}}</strong>
                    <small>published</small><strong> {{{  date("F j, Y", strtotime($blog->created_at)) }}}</strong></p>
                <p class="blog-area">{{ Purifier::clean($blog->content) }}</p>

         </div>
    </div>





</div>
@stop
