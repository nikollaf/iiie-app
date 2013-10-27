@extends('layouts.default')

@section('content')
    <div class="row">
        <h3 class="page-title"></h3>
      
      
          <a class="btn btn-add-article" href="{{{ URL::to('articles/add') }}}"><span class="glyphicon glyphicon-plus"></span> Add An Article</a>
        
    </div>

    <div class="row">
        
        @foreach($articles as $article)
        <div class="col-lg-5 front-content margin-box article-color">
                <h4><a href="{{ $article->article_url }}">{{ $article->article_title}}</a></h4>

                 <p>{{ $article->article_info}}</p>

            <p class="blog-cred bottom-bloc">Posted By: {{  $article->user->fullName() }}</p>

        </div>


        @endforeach
        <div class="row">
            <div class="col-md-offset-4">
                <ul class="pagination">
                    <li>{{ $articles->links() }}</li>
                </ul>
            </div>
        </div>
    </div>

@stop