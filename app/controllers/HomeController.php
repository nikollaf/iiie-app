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


        $blogs = Blog::take(4)->orderBy('created_at', 'DESC')->get();
        $events = Event::take(4)->orderBy('created_at', 'DESC')->get();
        $articles = Article::take(4)->orderBy('created_at', 'DESC')->get();


        return View::make('home', array('blogs' => $blogs, 'events' => $events, 'articles' => $articles));
	}

}
