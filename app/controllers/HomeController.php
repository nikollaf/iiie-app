<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showIndex()
	{

        $admin = User::where('user_role', 'LIKE', 'admin')->get();

        $in_review_blogs        = Blog::where('blog_post_status','LIKE', 'IN REVIEW')->orderBy('created_at', 'DESC')->get();
        
        $in_review_events       = Event::where('event_status','LIKE', 'IN REVIEW')->orderBy('created_at', 'DESC')->get();
        $in_review_articles     = Article::where('article_status','LIKE', 'IN REVIEW')->orderBy('created_at', 'DESC')->get();



        $blogs      = Blog::where('blog_post_status','LIKE', 'APPROVED')->orderBy('created_at', 'DESC')->get();
        $events     = Event::where('event_status','LIKE', 'APPROVED')->orderBy('created_at', 'DESC')->get();
        $articles   = Article::where('article_status','LIKE', 'APPROVED')->orderBy('created_at', 'DESC')->get();


        return View::make('home', array('blogs' => $blogs,
            'events' => $events,
            'articles' => $articles,
            'admin' => $admin,
            'in_review_blogs' => $in_review_blogs,
            'in_review_events' => $in_review_events,
            'in_review_articles' => $in_review_articles
        ));
	}

}
