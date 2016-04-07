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

Route::resource('event','EventController');
Route::resource('user','UserController');

Route::get('event/{id}/register','EventController@getSignup');
Route::post('event/{id}/register','EventController@postSignup');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about',function(){
    return view('pages/about');
});
Route::get('/terms',function(){
    return view('pages/terms');
});