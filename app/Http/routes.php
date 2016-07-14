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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();


Route::get('/home', 'HomeController@index');


Route::post('/home/show', 'HomeController@show');


//Route::get('/home/show2', 'HomeController@show2');
//Route::get('/home/show1', 'HomeController@show1');

//Route::get('/home/show', 'HomeController@query');
//Route::get('/home/show', 'HomeController@select');

//Route::get('home', 'HomeController@show1');