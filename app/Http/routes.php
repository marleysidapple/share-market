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

        /*
         *---------------------------------------------------------------------------------------------
         * START OF BANK ROUTES
         *---------------------------------------------------------------------------------------------
         */

        /*
         * getting list of bank
         * get route
         */
        Route::get('bank', 'BankController@index')->name('listbank');

        /*
         * adding bank
         * get route
         */
        Route::get('bank/add', 'BankController@add')->name('addbank');

        /*
         * saving bank details
         * post route
         */
        Route::post('bank/add', 'BankController@store')->name('savebank');

        /*
         * editing bank detail
         * get route
         */
        Route::get('bank/edit/{id}', 'BankController@edit')->name('editbank');

        /*
         * updating bank information
         * post route
         */
        Route::post('bank/edit', 'BankController@update')->name('updatebank');

        /*
         * deleting bank detail
         * get route
         */
        Route::get('bank/delete/{id}', 'BankController@deleteData')->name('deletebank');

        /* 
        *------------------------------------------------------------------------------------------
        * START OF BRANCH ROUTES
        *------------------------------------------------------------------------------------------
        */

        /*
        * listing the branch of bank
        * get route
        */
        Route::get('branch/{id}', 'BranchController@index')->name('listbankbranch');

        /*
        * adding the detail of branch
        * get route
        */
        Route::get('branch/{id}/add', 'BranchController@add')->name('addbankbranch');

        /*
        * saving detail of the branch
        * post route
        */
        Route::post('branch/add', 'BranchController@store')->name('savebankbranch');

        /*
        * editing detail of the branch
        * get route
        */
        Route::get('branch/edit/{bid}', 'BranchController@edit')->name('editbankbranch');

        /*
        * updating the branch detail
        * post route
        */
        Route::post('branch/edit', 'BranchController@update')->name('updatebankbranch');

        /*
        * deleting branch detail
        * get route
        */
        Route::get('branch/{id}/delete/{bid}', 'BranchController@deleteData')->name('deletebankbranch');


        /* 
        *------------------------------------------------------------------------------------------
        * START OF CUSTOMER ROUTES
        *------------------------------------------------------------------------------------------
        */
        Route::get('customer/list', 'CustomerController@index')->name('customerlist');


        /*
        * adding new customer
        * get route
        */
        Route::get('customer/add', 'CustomerController@add')->name('addcustomer');


        /*
        * saving new customer
        * post route
        */
        Route::post('customer/store', 'CustomerController@store')->name('savecustomer');


        /*
        * Displaying the details of customer
        * get route
        */
        Route::get('customer/{id}/detail', 'CustomerController@show')->name('displaycustomerdetail');


        /*
        * ajax route
        * getting the districts from zone
        */
        Route::post('customer/district', 'CustomerController@district');


        /*
        * ajax route
        * getting branches of bank
        */
        Route::post('customer/branch', 'CustomerController@branches');



    });

});

/*
 *
 * Logging user out
 * GET route
 */
Route::get('logout', 'AuthenticationController@logout');
