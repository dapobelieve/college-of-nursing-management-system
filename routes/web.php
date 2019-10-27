<?php

Route::get('/', function () {
    return view('welcome');
});

Route::view('/login', 'Auth.login');
Route::post('/login', 'Auth\AuthController@login')->name('login');

// The admin panel routes
Route::group(['prefix' => '/admin'], function () {
    Route::view('', '/admin.home', ['section' => 'dashboard']);
    Route::view('roles', '/admin.roles', ['section' => 'roles']);
    Route::view('admins', '/admin.admins', ['section' => 'admins']);
    Route::view('students', '/admin.students', ['section' => 'students']);
    Route::view('news', '/admin.news', ['section' => 'news']);
    Route::view('system-settings', '/admin.system_settings', ['section' => 'settings']);
});
