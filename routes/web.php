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

Route::get('latest-news/{id}/{info}', 'Frontpages\latestNewsController@index')->name('latestNews');

Route::get('/provost-statement',function () {return view('provost-statement');});

Route::get('/contact',function () {return view('contact');});

Route::get('/our-team',function () {return view('college-officers');});

Route::group(['middleware' => 'check'], function(){

      Route::get('portal/home', 'HomeController@index')->name('portal.home');

      Route::post('portal/store', 'HomeController@store')->name('portal.biodata');

      Route::get('portal/coursereg', 'CourseController@index')->name('portal.coursereg');

      Route::post('portal/coursereg', 'CourseController@store')->name('portal.coursereg');

      Route::get('portal/dashboard', 'DashboardController@index')->name('portal.dashboard');

      Route::get('portal/coursereg/{id}/{dept}', 'CourseController@recieveAjax');

      Route::get('portal/reghistory', 'RegHistoryController@index')->name('portal.reghistory');

      Route::get('portal/paytuition', 'PayTuitionController@index')->name('portal.tuition');

      Route::get('portal/tuitionhistory', 'PayTuitionController@index4History')->name('portal.tuitionhistory');

      Route::get('portal/paytuition/{lvl}', 'PayTuitionController@payAjax')->name('portal.getamount');

      Route::get('portal/downloadPDF/{sem}/{date}','RegHistoryController@downloadPDF')->name('portal.showhistory');

});

Route::get('portal/checkpage', 'CheckpageController@index')->name('portal.checkpage');

Route::post('portal/checkpage', 'CheckpageController@store')->name('portal.check2store');

Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');

Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');


Route::get('/guide',function () {
return view('applicationguide');
});


Route::get('/registerSearch/{id}', [
'uses' => 'StateController@recieve'
]);

Route::get('/events',[
  'uses' => 'EventController@index',
  'as' => 'events'
]);
