@extends('layouts.default')

@section('content')

        <div class="row">
        <h3 class="page-title"></h3>
      
      
          <a class="btn btn-add-blog" href="{{{ URL::to('notes/add') }}}"><span class="glyphicon glyphicon-plus"></span> Add A Note</a>
        
        </div>

        <div class="row">
            <h3 class="page-title"></h3>
            @if ($message = Session::get('success'))
            <div class="span12 alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Success</h4>
                {{{ $message }}}
            </div>
            @endif
        @foreach($blogs as $blog)
            <div class="col-md-5 margin-box front-content blog-color">

                 <h4><a href="{{{ URL::to('notes/note/'.$blog->id) }}}">{{ $blog->title}}</a></h4>
                 <p class="blog-cred">{{ $blog->user->fullName() . " - " . date("M j, Y", strtotime($blog->created_at))}}</p>
                 <p>{{ Purifier::clean(Str::limit($blog->content, 190)) }}</p>

            </div>
        @endforeach

         </div>
         <div class="row">
             <div class="col-md-offset-4">
                <ul class="pagination">
                    <li>{{ $blogs->links() }}</li>
                </ul>
             </div>
        </div>

@stop