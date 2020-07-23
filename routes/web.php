<?php


Auth::routes();


Route::group(['prefix' => '/admission', 'namespace' => 'Admission'], function () {
Route::get('login', 'LoginController@index')->name('admission.login');

Route::post('login', 'LoginController@check')->name('admission.login');

Route::get('/',function () {return view('admission.index');});

//register for form
Route::get('appform', 'InvoiceController@index')->name('invoice.activate');

Route::post('appform', 'InvoiceController@store')->name('invoice.store');

Route::get('appformlogin', 'InvoiceController@indexLogin')->name('invoice.activateLogin');

Route::post('appformlogin', 'InvoiceController@storeLogin')->name('invoice.storeLogin');

//pay for form
Route::get('appformfee', 'ActivateController@index')->name('appformfee.activate');

Route::post('appformfee', 'ActivateController@redirectToGateway')->name('appformfee.pay');

Route::get('appformPDF/{cardapplicant}', 'ActivateController@downloadPDF')->name('appformfee.PDF');

Route::get('appformfee/logout', 'ActivateController@logout')->name('appformfee.logout');
});

Route::group(['prefix' => '/admission', 'namespace' => 'Admission', 'middleware' => 'checkAuth'], function () {

Route::get('dashboard', 'DashboardController@index')->name('admission.dashboard');

Route::get('dashboard/logout', 'DashboardController@logout')->name('admission.logout');

Route::get('application', 'ApplicationController@index')->name('application.index');

Route::get('application/{studentapplicant}', 'ApplicationController@update')->name('application.store');

Route::get('applicationtwo/steptwo', 'ApplicationtwoController@index')->name('application.steptwo');

Route::put('applicationtwo/steptwo/{studentapplicant}', 'ApplicationtwoController@update')->name('application.update');

Route::get('upload', 'UploadController@index')->name('upload.index');

Route::put('upload/{studentapplicant}', 'UploadController@update')->name('upload.update');

Route::get('payapplication', 'PayapplicationController@index')->name('payapplication.index');

Route::post('payapplication', 'PayapplicationController@index')->name('payapplication.pay');

Route::post('/pay', 'Payment2Controller@redirectToGateway')->name('payadmission');

Route::get('printout', 'PrintformController@index')->name('printout.index');

Route::get('printform', 'PrintformController@downloadPDF')->name('printform.downloadPDF');

Route::get('printreceipt', 'PrintformController@receiptPDF')->name('printform.receiptPDF');

Route::get('printacceptance', 'DashboardController@acceptancePDF')->name('printform.acceptance');

Route::post('/pay', 'Payment2Controller@redirectToGateway')->name('payacceptance');
});




Route::post('/signin', 'Auth\AuthController@login')->name('dashboard.login');
Route::get('/logout', 'Auth\AuthController@logout')->name('site.logout');

Route::get('/', 'Frontpages\WelcomeController@index')->name('welcome');

Route::get('about', 'Frontpages\AboutController@index')->name('about');

Route::get('latest-news/{id}/{info}', 'Frontpages\LatestNewsController@index')->name('latestNews');

Route::get('/speech',function () {return view('speech');});

Route::get('/sitemap',function () {return view('sitemap');});

Route::get('/contact', 'Frontpages\ContactController@index')->name('contact');

Route::post('/contact', 'Frontpages\ContactController@sendMail')->name('contact');

Route::post('portal/checkpage', 'CheckpageController@store')->name('portal.check2store');

Route::get('/our-team',function () {return view('college-officers');});

Route::get('/campus-life',function () {return view('campus-life');});

Route::get('/coursedetails/{id}', 'Frontpages\CoursedetailsController@index')->name('coursedetails');

Route::get('/job-application', 'Job\EmploymentController@index')->name('employment.index');

Route::post('/job-application', 'Job\EmploymentController@store')->name('employment.store');

Route::get('/job-guide',function () {return view('employment/index');});



Route::group(['middleware' => ['role:STUDENT']], function(){

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

      Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');

    });
    Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

    Route::post('/payment/webhook', 'PaymentController@handleGatewayWebhook')->name('webhook');



Route::get('/shortlist',[
'uses' => 'Frontpages\ShortlistController@index',
'as' => 'shortlist'
]);


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
  // Super and intermediate admin only routes
  Route::group(['middleware' => ['checkAdminPermissions:super,intermediate']], function () {
    Route::get('/index2dep/{id}', 'StudentController@dept')->name('students.index2dep');
    Route::get('/addresult/{id}', 'StudentController@showresult')->name('students.showresult');
    Route::post('/addresult', 'StudentController@addresult')->name('students.addresult');

    Route::put('applicants/addscore/{studentapplicant}', 'ApplicantController@update')->name('applicants.update');

    // Events section
    Route::resource('events', 'EventController',  [
      'only' => [
        'index', 'create', 'store', 'edit', 'update'
      ],
      'parameters' => [
        'events' => 'post'
      ]
    ]);

    // Fees
    Route::resource('fees', 'FeeController');

    // Lecturers
    Route::resource('lecturers', 'LecturerController');
  });

  // Super admin only routes
  Route::group(['middleware' => ['checkAdminPermissions:super']], function () {
    // Cards
    Route::resource('cards', 'CardController');
    Route::get('/index2', 'CardController@index2')->name('cards.index2');

    // Cardapplicants sub_section
    Route::resource('cardapplicants', 'CardapplicantController');
    Route::get('/index3', 'CardapplicantController@index2')->name('cardapplicants.index3');
    Route::post('/index3', 'CardapplicantController@exportcsv')->name('cardapplicants.exportcsv');
    Route::post('cardapplicants/index', 'CardapplicantController@deleteall')->name('cardapplicants.deleteall');


    // Applicants
    Route::put('applicants/index', 'ApplicantController@deleteall')->name('applicants.deleteall');
    Route::delete('applicants/destroy/{studentapplicant}', 'ApplicantController@delete')->name('applicants.destroy');
    Route::get('applicants/confirmteller/{studentapplicant}', 'ApplicantController@tellerindex')->name('applicants.addtelleredit');
    Route::put('applicants/confirmteller/{studentapplicant}', 'ApplicantController@addteller')->name('applicants.addteller');
    Route::get('applicants/downloadpdf', 'ApplicantController@pdfApplicants')->name('applicants.downloadPDF');
    Route::get('applicants/addresult', 'ApplicantController@showresultpage')->name('applicants.addresult');
    Route::post('applicants/addresult', 'ApplicantController@importresult')->name('applicants.addresultfile');

    // Admins section
    Route::resource('admins', 'AdminController',  ['parameters' => ['admins' => 'admin']]);

    // Roles section
    Route::get('roles', 'RoleController@index');

    // System settings
    Route::get('settings', 'SettingController@index')->name('settings.index');
    Route::put('settings/update', 'SettingController@update')->name('settings.update');
  });

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
  Route::resource('students', 'StudentController');

  // Applicants section
  Route::get('applicants/index', 'ApplicantController@index')->name('applicants.index');
  Route::get('applicants/index/{studentapplicant}', 'ApplicantController@edit')->name('applicants.edit');
  Route::post('applicants/search', 'ApplicantController@search')->name('applicants.search');
  Route::post('applicants/searchunapproved', 'ApplicantController@searchunapproved')->name('applicants.searchunapproved');
  Route::post('applicants/index', 'ApplicantController@exportcsv')->name('applicants.exportcsv');
});
