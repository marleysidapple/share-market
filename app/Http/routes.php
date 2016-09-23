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
Route::group(['middleware' => 'auth'], function () {

    /*
     * Rendering dashboard
     * /home
     */
    Route::get('home', 'dashboardController@index')->name('dashboard');

    Route::group(['prefix' => 'home'], function () {
        /*
         *
         * listing user-groups
         * get route
         */
        Route::get('usergroup', 'UserGroupController@index')->name('usergroup');

        /*
         * adding new user group
         * /usergroup/add
         */
        Route::get('usergroup/add', 'UserGroupController@show')->name('addusergroup');

        /*
         * storing usergroup
         * /usergroup/store
         */
        Route::post('usergroup/store', 'UserGroupController@store')->name('storeusergroup');

        /*
        * editing usergroup
        * /usergroup/edit/{roles}
        */
        Route::get('usergroup/edit/{id}', 'UserGroupController@edit')->name('editusergroup');


        /*
        * updating usergroups
        * post datas
        */
        Route::post('usergroup/update/{id}', 'UserGroupController@update')->name('updateusergroup');

    });

});

/*
 *
 * Logging user out
 * GET route
 */
Route::get('logout', 'AuthenticationController@logout');
