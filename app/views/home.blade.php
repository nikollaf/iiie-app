@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-4 event-color">
            <h3><a href="{{{ URL::to('events') }}}">Events</a></h3>
            @foreach($events as $event)
            <div class="front-content ">
                <h4><a href="{{{ URL::to('events/event/'.$event->id) }}}">{{{ $event->event_title }}}</a></h4>
                <p>{{{ $event->address }}}<br>
                {{{ $event->start_date  }}}</p>
                <p class="bottom-author-date">
                <a class="event-link" href="{{{ URL::to('events/event/'.$event->id) }}}">More Info</a>
                </p>
            </div>
            @endforeach
        </div>


        <div class="col-md-4 blog-color">
            <h3><a href="{{{ URL::to('blogs') }}}">Blog</a></h3>
            @foreach($blogs as $blog)
                <div class="front-content blog-bloc">
                 <h4><a href="{{{ URL::to('blogs/blog/'.$blog->id) }}}">{{ $blog->title}}</a></h4>
                 <p>{{ Purifier::clean(Str::limit($blog->content, 70)) }}</p>
                    <p class="bottom-author-date">
                   <span class="blog-cred">by</span><a class="blog-author" href=""> {{{ $blog->user->fullName() }}}</a>
                   <span class="bloc-date">{{ date("M j, Y", strtotime($blog->created_at)) }}</span>
                    </p>
                </div>
            @endforeach
        </div>

        <div class="col-md-4 article-color">
            <h3><a href="">Articles</a></h3>
                @foreach($articles as $article)
                <div class="front-content">
                    <h4><a href="{{ $article->article_url }}">{{ $article->article_title}}</a></h4>
                    <p>{{ Str::limit($article->article_info, 67) }}</p>
                    <p class="bottom-author-date">
                    <span class="blog-cred">posted by</span> <a class="article-author" href="">{{{ $article->user->fullName() }}}</a>
                    <span class="bloc-date">{{ date("M j, Y", strtotime($article->created_at)) }}</span>
                    </p>
                </div>
                @endforeach
        </div>
    </div>
</div>
@stop
