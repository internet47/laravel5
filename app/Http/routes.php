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
		Route::get('/showform', 'WelcomeController@showForm');
		Route::get('/contact', 'PagesController@contact');
		Route::get('/about', 'PagesController@aboutme');
		Route::resource('news', 'NewsController');
		Route::get('/profiles', 'ProfilesController@index');

 });


Route::filter('chungthuc', function()
		{
		    if (Auth::check())
		    {
		        //return Redirect::to('news');
		    }
		    else
		    {
		    	return Redirect::to('auth/login');
			}
		});



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);



Route::get('dangnhap', function() {
  return View('dangnhap.login');
});
Route::post('kiemtra', 'AccountController@login');

