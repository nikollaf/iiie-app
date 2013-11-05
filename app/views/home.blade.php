@extends('layouts.default')

@section('content')
        @if (Auth::check() && Auth::user()->getRole() == 'admin')
        <!-- Modal -->
        <div class="modal fade" id="inReview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">In Review</h4>
                    </div>
                    <div class="modal-body">

                            <h4>Blogs</h4>

                            @foreach($in_review_blogs as $blog)
                                <p><a href="{{{ URL::to('notes/edit/'.$blog->id) }}}">{{ $blog->title}}</a></p>
                            @endforeach
                            <hr>
                            <h4>Events</h4>

                            @foreach($in_review_events as $event)

                                 <p><a href="{{{ URL::to('events/admin/'.$event->id) }}}">{{ $event->event_title}}</a></p>
                            @endforeach
                             <hr>
                            <h4>Articles</h4>

                            @foreach($in_review_articles as $article)
                                <p><a href="{{{ URL::to('articles/admin/'.$article->id) }}}">{{ $article->article_title}}</a></p>
                            @endforeach
                        </div>



                    <div class="modal-footer">
                        <!--
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                        -->
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
            <!-- /.modal-dialog -->
        <!-- /.modal -->
        @endif

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
            <h3><a href="{{{ URL::to('notes') }}}">Notes</a></h3>
            @foreach($blogs as $blog)
                <div class="front-content blog-bloc">
                 <h4><a href="{{{ URL::to('notes/note/'.$blog->id) }}}">{{ $blog->title}}</a></h4>
                 <p>{{ Purifier::clean(Str::limit($blog->content, 70)) }}</p>
                    <p class="bottom-author-date">
                   <span class="blog-cred">by</span><span class="blog-author"> {{{ $blog->user->fullName() }}}</span>
                   <span class="bloc-date">{{ date("M j, Y", strtotime($blog->created_at)) }}</span>
                    </p>
                </div>
            @endforeach
        </div>

        <div class="col-md-4 article-color">
            <h3><a href="{{{ URL::to('articles') }}}">Articles</a></h3>
                @foreach($articles as $article)
                <div class="front-content">
                    <h4><a href="{{ $article->article_url }}">{{ $article->article_title}}</a></h4>
                    <p>{{ Str::limit($article->article_info, 90) }}</p>
                    <p class="bottom-author-date">
                    <span class="blog-cred">posted by</span> <span class="article-author">{{{ $article->user->fullName() }}}</span>
                    <span class="bloc-date">{{ date("M j, Y", strtotime($article->created_at)) }}</span>
                    </p>
                </div>
                @endforeach
        </div>
    </div>
</div>
@stop
