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


    Route::get('/routes', 'dashboardController@permissions');

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


        /*
        * listing users
        * get route
        */
        Route::get('users', 'UserController@index')->name('users');

        /*
        * adding users
        * get route
        */
        Route::get('user/add', 'UserController@add')->name('adduser');


        /*
        * adding new user
        * post route
        */
        Route::post('user/store', 'UserController@store')->name('saveuser');

        /*
        * editing user
        * get route
        */
        Route::get('user/edit/{id}', 'UserController@edit')->name('edituser');


        /*
        * updating user details
        * post route
        */
        Route::post('user/update/{id}', 'UserController@update')->name('updateuser');

        /*
        * assigning permission
        * get route
        */
        Route::get('permissions', 'dashboardController@assignPermission')->name('assignpermission');


        /*
        * ajax route
        * for attaching permission
        */
        Route::post('user/attachpermission', 'dashboardController@attachPermission');

    });

    /* Bank routes */
    Route::get('bank', 'BankController@index')->name('bank');
    Route::get('bank/add', 'BankController@add')->name('bank');
    Route::post('bank/add', 'BankController@store')->name('bank');
    Route::get('bank/edit/{id}', 'BankController@edit')->name('bank');
    Route::post('bank/edit', 'BankController@update')->name('bank');
    Route::get('bank/delete/{id}', 'BankController@deleteData')->name('bank');

    /* branch routes */

    Route::get('branch/{id}', 'BranchController@index')->name('bank');
    Route::get('branch/{id}/add', 'BranchController@add')->name('bank');
    Route::post('branch/add', 'BranchController@store')->name('bank');
    Route::get('branch/edit/{bid}', 'BranchController@edit')->name('bank');
    Route::post('branch/edit', 'BranchController@update')->name('bank');
    Route::get('branch/{id}/delete/{bid}', 'BranchController@deleteData')->name('bank');

    /* broker routes */

    Route::get('broker', 'BrokerController@index')->name('broker');
    Route::get('broker/add', 'BrokerController@add')->name('broker');
    Route::post('broker/add', 'BrokerController@store')->name('broker');
    Route::get('broker/edit/{id}', 'BrokerController@edit')->name('broker');
    Route::post('broker/edit', 'BrokerController@update')->name('broker');
    Route::get('broker/delete/{id}', 'BrokerController@deleteData')->name('broker');

});

/*
 *
 * Logging user out
 * GET route
 */
Route::get('logout', 'AuthenticationController@logout');
