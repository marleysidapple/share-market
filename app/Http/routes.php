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
         * START OF USERNAME SETTING ROUTES
         *---------------------------------------------------------------------------------------------
         */

        /*
         * setting username
         * get route
         */
        Route::get('usernamesetting/{id?}', 'dashboardController@usernameDefiner')->name('usernamesetting');

        /*
         * saving username
         * post route
         */
        Route::post('username/store/{id?}', 'dashboardController@storeUsername');

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

        /*
         * ajax post route
         * getting dmat registrar
         */
        Route::post('customer/registrar', 'CustomerController@registrar');

        /*
         * personal detail
         * get route
         */
        Route::get('customer/{id}/personaldetail', 'CustomerController@personalDetail')->name('editpersonaldetail');

        /*
         * updating personal information
         * post route
         */
        Route::post('customer/personalinfo/update/{id}', 'CustomerController@updatePersonalDetail');

        /*
         * Editing permanent address detail
         * get route
         */
        Route::get('customer/{id}/paddressdetail', 'CustomerController@paddressDetail')->name('editpermanentaddress');

        /*
         * updating permanent address detail
         * post route
         */
        Route::post('customer/paddressinfo/update/{id}', 'CustomerController@updatePaddressDetail');

        /*
         * Editing temporary address detail
         * get route
         */
        Route::get('customer/{id}/taddressdetail', 'CustomerController@taddressDetail')->name('edittemporaryaddress');

        /*
         * updating temporary address detail
         * post route
         */
        Route::post('customer/taddressinfo/update/{id}', 'CustomerController@updateTaddressDetail');

        /*
         * Editing citizenship detail
         * get route
         */
        Route::get('customer/{id}/citizenship', 'CustomerController@editCitizen')->name('editcitizenshipdetail');

        /*
         * updating citizenship detail
         * post route
         */
        Route::post('customer/citizenship/update/{id}', 'CustomerController@updateCitizenShip');

        /*
         * editing bank detail
         * rendering view
         */
        Route::get('customer/{id}/banks', 'CustomerController@editBank')->name('editbankdetail');

        /*
         * editing the customer bank detail
         * rendering edit view
         */
        Route::get('customer/bank/edit/{id}', 'CustomerController@editBankDetail');

        /*
         * updating the bankdetail
         * post route
         */
        Route::post('customer/bankdetail/update/{id}', 'CustomerController@updateBankDetail');

        /*
         * deleting the bank detail
         * get route
         */
        Route::get('customer/bank/delete/{id}', 'CustomerController@deleteBankDetail')->name('deletebankdetail');

        /*
         * Adding new bank
         * get route
         */
        Route::get('customer/bank/add/{id}', 'CustomerController@addBankFromProfile')->name('addbankthroughprofile');

        /*
         * adding new bank detail
         * post route
         */
        Route::post('customer/newbank/add/{id}', 'CustomerController@addNewBank');

        /*
         * editing dmat detail
         * rendering view
         */
        Route::get('customer/{id}/dmat', 'CustomerController@editDmat')->name('editdmataccountdetail');


        /*
         * editing the customer dmat detail
         * get route
         */
        Route::get('customer/dmat/edit/{id}', 'CustomerController@editDmatDetail')->name('editcustomerdmatdetail');


        /*
        * updatinhg dmat detail
        * post route
        */
        Route::post('customer/dmatdetail/update/{id}', 'CustomerController@updateDmatDetail');


        /*
         * deleting the dmat detail
         * get route
         */
        Route::get('customer/dmat/delete/{id}', 'CustomerController@deleteDmatDetail')->name('deletebankdetailthroughprofile');


         /*
         * Adding new dmat registrar
         * get route
         */
        Route::get('customer/dmat/add/{id}', 'CustomerController@addDmatFromProfile')->name('adddmatthroughprofile');


        /*
        * Adding new dmat detail
        * post route
        */
        Route::post('customer/dmatdetail/add/{id}', 'CustomerController@addNewDmat');


        /*
        * profession detail
        * get route
        */
        Route::get('customer/{id}/profession', 'CustomerController@editProfession')->name('editprofession');


        /*
        * updating professional detail
        * post route
        */
        Route::post('customer/profession/update/{id}', 'CustomerController@updateProfession');


        /*
        * editing login detail
        * get route
        */
        Route::get('customer/{id}/login', 'CustomerController@editLogin')->name('editloginthroughprofile');


        /*
        * updating login detail
        * post route
        */
        Route::post('customer/login/update/{id}', 'CustomerController@updateLoginDetail');

    });

    /*
     *----------------------------------------------------------------------------------
     * broker routes
     *----------------------------------------------------------------------------------
     */

    /*
     * list broker
     * get route
     */
    Route::get('broker', 'BrokerController@index')->name('listbroker');

    /*
     * add broker
     * get route
     */
    Route::get('broker/add', 'BrokerController@add')->name('addbroker');

    /*
     * save broker
     * post route
     */
    Route::post('broker/add', 'BrokerController@store');

    /*
     * edit broker
     * get route
     */
    Route::get('broker/edit/{id}', 'BrokerController@edit')->name('editbroker');

    /*
     * update broker
     * post route
     */
    Route::post('broker/edit', 'BrokerController@update');

    /*
     * delete broker
     * get route
     */
    Route::get('broker/delete/{id}', 'BrokerController@deleteData')->name('deletebroker');

    /*
     * --------------------------------------------------------------------------------------
     * RTA ROUTES
     *----------------------------------------------------------------------------------------
     *
     */

    /*
     * list rta
     * get route
     */
    Route::get('rta', 'RtaController@index')->name('listrta');

    /*
     * add rta
     * get route
     */
    Route::get('rta/add', 'RtaController@add')->name('addrta');

    /*
     * save rta
     * post route
     */
    Route::post('rta/add', 'RtaController@store');

    /*
     * edit rta
     * get route
     */
    Route::get('rta/edit/{id}', 'RtaController@edit')->name('editrta');

    /*
     * update rta
     * post route
     */
    Route::post('rta/edit', 'RtaController@update');

    /*
     * delete rta
     * get route
     */
    Route::get('rta/delete/{id}', 'RtaController@deleteData')->name('deleterta');

    /*
     *---------------------------------------------------------------------------------------------
     * dp routes
     *---------------------------------------------------------------------------------------------
     *
     */

    /*
     * list dp
     * get route
     */
    Route::get('dp', 'DpController@index')->name('listdp');

    /*
     * add dp
     * get route
     */
    Route::get('dp/add', 'DpController@add')->name('adddp');

    /*
     * save dp
     * post route
     */
    Route::post('dp/add', 'DpController@store');

    /*
     * edit dp
     * get route
     */
    Route::get('dp/edit/{id}', 'DpController@edit')->name('editdp');

    /*
     * update dp
     * post route
     */
    Route::post('dp/edit', 'DpController@update');

    /*
     * delete dp
     * get route
     */
    Route::get('dp/delete/{id}', 'DpController@deleteData')->name('deletedp');

    /*
     *------------------------------------------------------------------------------------------------------
     * COMPANY AND COMPANY TYPE ROUTES
     *------------------------------------------------------------------------------------------------------
     *
     */

    /*
     * list company
     * get route
     */
    Route::get('company', 'CompanyController@index')->name('listcompany');

    /*
     * add company
     * get route
     */
    Route::get('company/add', 'CompanyController@add')->name('addcompany');

    /*
     * save company
     * post route
     */
    Route::post('company/add', 'CompanyController@store');

    /*
     * edit company
     * get route
     */
    Route::get('company/edit/{id}', 'CompanyController@edit')->name('editcompany');

    /*
     * update company
     * post route
     */
    Route::post('company/edit', 'CompanyController@update');

    /*
     * delete company
     * get route
     */
    Route::get('company/delete/{id}', 'CompanyController@deleteData')->name('deletecompany');

    /*
     * list company-type
     * get route
     */
    Route::get('company-type', 'CompanyTypeController@index')->name('listcompany-type');

    /*
     * add company-type
     * get route
     */
    Route::get('company-type/add', 'CompanyTypeController@add')->name('addcompany-type');

    /*
     * save company-type
     * post route
     */
    Route::post('company-type/add', 'CompanyTypeController@store');

    /*
     * edit company-type
     * get route
     */
    Route::get('company-type/edit/{id}', 'CompanyTypeController@edit')->name('editcompany-type');

    /*
     * update company-type
     * post route
     */
    Route::post('company-type/edit', 'CompanyTypeController@update');

    /*
     * delete company-type
     * get route
     */
    Route::get('company-type/delete/{id}', 'CompanyTypeController@deleteData')->name('deletecompany-type');

});

/*
 *
 * Logging user out
 * GET route
 */
Route::get('logout', 'AuthenticationController@logout');
