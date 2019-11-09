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



Auth::routes();

Route::get('/', 'Frontpages\WelcomeController@index')->name('welcome');

Route::get('about', 'Frontpages\AboutController@index')->name('about');

Route::get('portal/home', 'HomeController@index')->name('portal.home');

Route::post('portal/store', 'HomeController@store')->name('portal.biodata');

Route::get('portal/coursereg', 'CourseController@index')->name('portal.coursereg');

Route::post('portal/coursereg', 'CourseController@store')->name('portal.coursereg');

Route::get('portal/dashboard', 'DashboardController@index')->name('portal.dashboard');

Route::get('portal/coursereg/{id}/{dept}', 'CourseController@recieveAjax');

Route::get('portal/reghistory', 'RegHistoryController@index')->name('portal.reghistory');

Route::get('portal/downloadPDF/{id}/{sem}/{date}','RegHistoryController@downloadPDF')->name('portal.showhistory');

Route::get('/guide',function () {
return view('applicationguide');
});

Route::post('/register', [
'uses' => 'Auth\RegisterController@register',
'as' => 'register.store'
]);
//->middleware('check');



Route::get('/registerSearch/{id}', [
'uses' => 'StateController@recieve'
]);

Route::get('/events',[
  'uses' => 'EventController@index',
  'as' => 'events'
]);


// The admin panel routes
Route::group(['prefix' => '/admin', 'namespace' => 'Admin'], function () {
  // Dashboard
  Route::get('', 'DashboardController@index');
  
  // News section
  Route::get('news', 'NewsController@index');

  // Students section
  Route::get('students', 'StudentController@index');

  Route::view('roles', '/admin.roles', ['section' => 'roles']);
  Route::view('admins', '/admin.admins', ['section' => 'admins']);
  Route::view('system-settings', '/admin.system_settings', ['section' => 'settings']);
});