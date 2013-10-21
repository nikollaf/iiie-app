<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::controller('account','AccountController' );
Route::get('/', 'HomeController@showIndex');

Route::controller('blogs','BlogController');


Route::controller('events','EventController' );

Route::controller('articles', 'ArticleController');

Route::controller('resources', 'ResourceController');
