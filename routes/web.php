<?php
Auth::routes();

Route::post('/signin', 'Auth\AuthController@login')->name('dashboard.login');

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

Route::get('get-location/{state}', 'StateController@getLocations');

Route::get('/events',[
  'uses' => 'EventController@index',
  'as' => 'events'
]);


// The admin panel routes
Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'middleware' => 'role:ADMIN'], function () {
  // Dashboard
  Route::get('', 'DashboardController@index')->name('dashboard.home');

  // Courses
  Route::resource('courses', 'CourseController');

  // Departments
  Route::resource('departments', 'DepartmentController');

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
  Route::get('students', 'StudentController@index');

  // Admins section
  Route::resource('admins', 'AdminController',  [
    'only' => [
      'index', 'create', 'store', 'edit', 'update'
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
