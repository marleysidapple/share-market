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

    Route::get('management/{tab?}', 'ManagementController@index')->name('management');
    
    /* Bank routes */
    // Route::get('bank', 'BankController@index')->name('management');
    Route::get('bank/add', 'BankController@add')->name('management');
    Route::post('bank/add', 'BankController@store')->name('management');
    Route::get('bank/edit/{id}', 'BankController@edit')->name('management');
    Route::post('bank/edit', 'BankController@update')->name('management');
    Route::get('bank/delete/{id}', 'BankController@deleteData')->name('management');
    // Route::post('bank/jsValidation', 'BankController@jsValidation')->name('management');

    /* branch routes */

    Route::get('branch/{id}', 'BranchController@index')->name('management');
    Route::get('branch/{id}/add', 'BranchController@add')->name('management');
    Route::post('branch/add', 'BranchController@store')->name('management');
    Route::get('branch/edit/{bid}', 'BranchController@edit')->name('management');
    Route::post('branch/edit', 'BranchController@update')->name('management');
    Route::get('branch/{id}/delete/{bid}', 'BranchController@deleteData')->name('management');

    /* broker routes */

    // Route::get('broker', 'BrokerController@index')->name('management');
    Route::get('broker/add', 'BrokerController@add')->name('management');
    Route::post('broker/add', 'BrokerController@store')->name('management');
    Route::get('broker/edit/{id}', 'BrokerController@edit')->name('management');
    Route::post('broker/edit', 'BrokerController@update')->name('management');
    Route::get('broker/delete/{id}', 'BrokerController@deleteData')->name('management');

    /* rta routes */

    // Route::get('rta', 'RtaController@index')->name('management');
    Route::get('rta/add', 'RtaController@add')->name('management');
    Route::post('rta/add', 'RtaController@store')->name('management');
    Route::get('rta/edit/{id}', 'RtaController@edit')->name('management');
    Route::post('rta/edit', 'RtaController@update')->name('management');
    Route::get('rta/delete/{id}', 'RtaController@deleteData')->name('management');

    /* dp routes */

    // Route::get('dp', 'DpController@index')->name('management');
    Route::get('dp/add', 'DpController@add')->name('management');
    Route::post('dp/add', 'DpController@store')->name('management');
    Route::get('dp/edit/{id}', 'DpController@edit')->name('management');
    Route::post('dp/edit', 'DpController@update')->name('management');
    Route::get('dp/delete/{id}', 'DpController@deleteData')->name('management');

    /* company routes */

    // Route::get('company', 'CompanyController@index')->name('management');
    Route::get('company/add', 'CompanyController@add')->name('management');
    Route::post('company/add', 'CompanyController@store')->name('management');
    Route::get('company/edit/{id}', 'CompanyController@edit')->name('management');
    Route::post('company/edit', 'CompanyController@update')->name('management');
    Route::get('company/delete/{id}', 'CompanyController@deleteData')->name('management');

    // Route::get('company-type', 'CompanyTypeController@index')->name('management');
    Route::get('company-type/add', 'CompanyTypeController@add')->name('management');
    Route::post('company-type/add', 'CompanyTypeController@store')->name('management');
    Route::get('company-type/edit/{id}', 'CompanyTypeController@edit')->name('management');
    Route::post('company-type/edit', 'CompanyTypeController@update')->name('management');
    Route::get('company-type/delete/{id}', 'CompanyTypeController@deleteData')->name('management');

    /* Package system routes */
    // Route::get('package', 'PackageController@index')->name('management');
    Route::get('package/add', 'PackageController@add')->name('management');
    Route::post('package/add', 'PackageController@store')->name('management');
    Route::get('package/edit/{id}', 'PackageController@edit')->name('management');
    Route::post('package/edit', 'PackageController@update')->name('management');
    Route::get('package/delete/{id}', 'PackageController@deleteData')->name('management');

    /* Package service routes */
    Route::get('package/service', 'PackageController@indexService')->name('management');
    Route::get('package/service/add', 'PackageController@addService')->name('management');
    Route::post('package/service/add', 'PackageController@storeService')->name('management');
    Route::get('package/service/edit/{id}', 'PackageController@editService')->name('management');
    Route::post('package/service/edit', 'PackageController@updateService')->name('management');
    Route::get('package/service/delete/{id}', 'PackageController@deleteDataService')->name('management');

});

/*
 *
 * Logging user out
 * GET route
 */
Route::get('logout', 'AuthenticationController@logout');
