@extends('layouts.default')

@section('content')

        <div class="row">
            <h3 class="page-title">Blog</h3>
        @foreach($blogs as $blog)

            <div class="col-md-5 margin-box front-content blog-color">

                 <h4><a href="{{{ URL::to('blogs/blog/'.$blog->id) }}}">{{ $blog->title}}</a></h4>
                 <p class="blog-cred">{{ $blog->user->fullName() . " - " . date("M j, Y", strtotime($blog->created_at))}}</p>
                 <p>{{ Purifier::clean(Str::limit($blog->content, 180)) }}</p>

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