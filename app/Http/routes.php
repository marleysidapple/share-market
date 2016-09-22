<?php

/*
* User login Route
* /GET / or GET /login
*/


Route::get('/', 'AuthenticationController@login');

Route::get('/login', 'AuthenticationController@login');

/*
* post login data
* post route
*/
Route::post('login', 'AuthenticationController@validateLogin');


/*
*
* protected routes
*/
Route::group(['middleware' => 'auth'], function(){

   /*
   * Rendering dashboard
   * /home
   */
    Route::get('home', 'dashboardController@index');


});


/*
*
* Logging user out
* GET route
*/
Route::get('logout', 'AuthenticationController@logout');
