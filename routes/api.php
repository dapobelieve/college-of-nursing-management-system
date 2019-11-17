<?php

// get lgas for state
Route::get('get-location/{state}', 'StateController@getLocations');

//
Route::post('news', 'Admin\NewsController@store');
