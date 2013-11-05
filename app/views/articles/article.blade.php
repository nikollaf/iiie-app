@extends('layouts.default')

@section('content')


<div class="row">


    <div class="col-md-6 front-content">
        <h3 class="page-title">{{ $article->article_title}}</h3>
        <div class="col-md-6">

            <p>Social Link</p>
            <a href="{{{ $article->article_url }}}">{{{ $article->article_url }}}</a>

    </div>
    </div>
</div>


<div class="row">
    <h3 class="page-title"></h3>

    <form role="form" method="post" action="">
        <input type="hidden" name="csrf_token" id="csrf_token" value="{{{ Session::getToken() }}}" />

        <label class="checkbox-inline">
            <input type="radio" name="article_status" id="inlineCheckbox1" value="APPROVED">
            <span class="btn-lg btn-success">APPROVE</span>
        </label>
        <label class="checkbox-inline">
            <input type="radio" name="article_status" id="inlineCheckbox2" value="DENY">
            <span class="btn-danger btn-lg">DENY</span>
        </label>

        <input type="hidden" name="article_id" value="{{ $article->id }}">

        <br><br>
        <button type="submit" class="btn btn-success">Post</button>
    </form>

</div>

@stop
