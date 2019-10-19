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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/guide',function () {
return view('applicationguide');
});

Route::post('/register', [
'uses' => 'Auth\RegisterController@register'
])->middleware('check');

Route::put('/register/{$id}', [
'uses' => 'Auth\RegisterController@recieve',
'as' => 'auth.registered'
]);

Route::get('/events',[
  'uses' => 'EventController@index',
  'as' => 'events'
]);
