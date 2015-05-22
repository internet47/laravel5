<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

 Route::group(array('before'=>'chungthuc'), function()
 {
		Route::get('/', 'WelcomeController@index');

		Route::get('home', 'HomeController@index');
		// Route::get('/contact', 'WelcomeController@contact');
		// Route::get('/about', 'WelcomeController@about');
		Route::get('/showform', 'WelcomeController@showForm');


		// Route::get('/contact', 'ContactController@index');
		// Route::get('/showlist', 'ContactController@showlist');


		Route::get('/contact', 'PagesController@contact');
		Route::get('/about', 'PagesController@aboutme');



		Route::filter('auth', function()
		{
		    if (Auth::check())
		    {
		        return Redirect::to('news');
		    }
		    Redirect::to('auth/login');
		});


		Route::filter('chungthuc', function()
		{
			echo 'vao roi';

		    if (Auth::check())
		    {
		    	echo 'da chung thuc';
		        //return Redirect::to('news');
		    }
		    else
		    {
		    	echo 'chưa chung thuc';
		    	return Redirect::to('auth/login');
			}
		});

		//Route::get('news', array('before' => 'chungthuc', 'uses' => 'NewsController@index'));

		 //Route::get('news',  array('before'=>'auth','uses'=>'NewsController@index'));
		// Route::get('/news/create', 'NewsController@create');
		// Route::post('/news/save', 'NewsController@store');
		// Route::post('/news/{news}/edit', 'NewsController@edit');


		Route::resource('news', 'NewsController');

 });



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);



Route::get('dangnhap', function() {
  return View('dangnhap.login');
});
Route::post('kiemtra', 'AccountController@login');