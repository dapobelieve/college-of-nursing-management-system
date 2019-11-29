<?php
Auth::routes();

Route::post('/signin', 'Auth\AuthController@login')->name('dashboard.login');
Route::get('/logout', 'Auth\AuthController@logout')->name('site.logout');

Route::get('/', 'Frontpages\WelcomeController@index')->name('welcome');

Route::get('about', 'Frontpages\AboutController@index')->name('about');

Route::get('latest-news/{id}/{info}', 'Frontpages\latestNewsController@index')->name('latestNews');

Route::get('/provost-statement',function () {return view('provost-statement');});

Route::get('/contact', 'Frontpages\ContactController@index')->name('contact');

Route::post('/contact', 'Frontpages\ContactController@sendMail')->name('contact');

Route::get('/our-team',function () {return view('college-officers');});

Route::group(['middleware' => ['role:STUDENT','check']], function(){

      Route::get('portal/home', 'HomeController@index')->name('portal.home');

      Route::post('portal/store', 'HomeController@store')->name('portal.biodata');

      Route::get('portal/coursereg', 'CourseController@index')->name('portal.coursereg');

      Route::post('portal/coursereg', 'CourseController@store')->name('portal.coursereg');

      Route::get('portal/dashboard', 'DashboardController@index')->name('portal.dashboard');

      Route::get('portal/coursereg/{id}/{dept}', 'CourseController@recieveAjax');

      Route::get('portal/reghistory', 'RegHistoryController@index')->name('portal.reghistory');

      Route::get('portal/paytuition', 'PayTuitionController@index')->name('portal.tuition');

      Route::get('portal/tuitionhistory', 'PayTuitionController@index4History')->name('portal.tuitionhistory');

      Route::get('portal/paytuition/{lvl}/{type}', 'PayTuitionController@payAjax')->name('portal.getamount');

      Route::get('portal/downloadPDF/{sem}/{date}','RegHistoryController@downloadPDF')->name('portal.showhistory');

      Route::get('portal/paydownloadPDF/{id}/{date}','PayTuitionController@downloadPDF')->name('portal.showpayhistory');

      Route::get('portal/checkpage', 'CheckpageController@index')->name('portal.checkpage');

      Route::post('portal/checkpage', 'CheckpageController@store')->name('portal.check2store');

      Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');

      Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
});




Route::get('/guide',function () {
return view('applicationguide');
});


Route::get('/registerSearch/{id}', [
'uses' => 'StateController@recieve'
]);

Route::get('get-location/{state}', 'StateController@getLocations');

Route::get('/events',[
  'uses' => 'EventController@index',
  'as' => 'events'
]);


// The admin panel routes
Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'middleware' => 'role:ADMIN'], function () {
  // Dashboard
  Route::get('', 'DashboardController@index')->name('dashboard.home');

  //cards
  Route::resource('cards', 'CardController');
    Route::get('/index2', 'CardController@index2')->name('cards.index2');

  // Courses
  Route::resource('courses', 'CourseController');

  // Departments
  Route::resource('departments', 'DepartmentController');


  // Lecturers
  Route::resource('lecturers', 'LecturerController');

  // News section
  Route::resource('news', 'NewsController',  [
    'only' => [
      'index', 'create', 'store', 'edit', 'update'
    ],
    'parameters' => [
      'news' => 'post'
    ]
  ]);

  // Students section
  Route::resource('students', 'StudentController');

  // Admins section
  Route::resource('admins', 'AdminController',  [
    'only' => [
      'index', 'create', 'store', 'edit', 'update', 'show'
    ],
    'parameters' => [
      'admins' => 'admin'
    ]
  ]);

  // Roles section
  Route::get('roles', 'RoleController@index');

  // System settings
  Route::get('settings', 'SettingController@index');
});
