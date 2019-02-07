<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//Auth::routes(['register' => false]);
Route::get('/login/{social}', 'Auth\SocialController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');
Route::get('/login/{social}/callback', 'Auth\SocialController@socialLoginCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

//Admin Routes
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
 	Route::name('admin.')->group(function () {
		Route::get('/login', 'Auth\LoginController@showLoginForm')->name('loginform');
		Route::post('/login', 'Auth\LoginController@login')->name('login');
		Route::middleware('auth:admin')->group(function(){
			Route::get('/home', 'DashboardController@index')->name('home');	
		});
		
	});
});

//Vendor Routes
Route::group(['prefix' => 'vendor', 'namespace' => 'Vendor'], function() {
 	Route::name('vendor.')->group(function () {
		Route::get('/login', 'Auth\LoginController@showLoginForm')->name('loginform');
		Route::post('/login', 'Auth\LoginController@login')->name('login');
		Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('registerform');
		Route::post('/register', 'Auth\RegisterController@register')->name('register');
		Route::middleware('auth:vendor')->group(function(){
			Route::get('/home', 'DashboardController@index')->name('home');	
		});
		
	});
});


Route::get('/home', 'HomeController@index')->name('home');
