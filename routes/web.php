<?php

Route::get('/', function () {
    return view('welcome');
});

Route::view('/login', 'Auth.login');
Route::post('/login', 'Auth\AuthController@login')->name('login');


Route::group(['prefix' => '/admin'], function () {
    Route::view('', '/admin.home');
});
