<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Bank;
use App\Customer;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\UpdateLoginInfoRequest;
use App\Http\Requests\UpdateCustomerDetailRequest;
use App\User;
use App\CustomerBank;
use App\Role;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('able');
    }

    /*
     * displaying list of customer
     * rendering view
     */
    public function index()
    {
    	$customer = Customer::all();
        return view('modules.customer.list', compact('customer'));
    }

    /*
     * adding new customer
     * rendering view
     */
    public function add($username = null)
    {
        $bank     = Bank::all();
        $username = "share" . date('his') . str_random(3);
        return view('modules.customer.add', compact(array('bank', 'username')));
    }

    /*
     * storing customer
     * saving data to database
     */
    public function store(CustomerRequest $request)
    {
        /*
         *
         * things to do
         * 1. create user (username, password, name)
         * 2. add details to the customers
         * 3. add bank details
         */

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'username' => $request->username,
            'password' => \bcrypt($request->password),
        ]);

        $roles = Role::where('name', 'user')->first();
        $user->attachRole($roles->id);

        $this->storeCustomerDetail($user, $request);

        return redirect()->back()->with('success', 'New Customer added successfully');

    }

    public function storeCustomerDetail($user, $request)
    {
        $customer = Customer::create([
            'user_id'          => $user->id,
            'gender'           => $request->gender,
            'dateofbirth'      => $request->dateofbirth,
            'fathername'       => $request->fathername,
            'mothername'       => $request->mothername,
            'gfathername'      => $request->grandfathername,
            'gmothername'      => $request->grandmothername,
            'permanentaddress' => $request->permanentaddress,
            'temporaryaddress' => $request->temporaryaddress,
            'phone'            => $request->phone,
            'mobile'           => $request->mobile,
            'country'          => $request->country,
            'citizenshipno'    => $request->citizenshipno,
            'maritalstatus'    => $request->maritalstatus,
            'occupation'       => $request->occupation,
            'ismultiple'       => $request->multiple
        ]);

        $this->storeBankDetail($customer, $request);

    }



    public function storeBankDetail($customer, $request)
    {
    	foreach($request->customer as $key => $val){
    		$banks = new CustomerBank;
    		$banks->customer_id = $customer->id;
    		$banks->bank_id = $val['bank'];
    		$banks->accountno = $val['accountno'];

    		$banks->save();
    	}

    	return redirect()->back()->with('success', 'New Customer added successfully');
    }



    /*
    * Displaying the detail of the customer
    * render view and pass data
    */
    public function show($id)
    {
        $bank = Bank::all();
        $customer = Customer::find($id);
        return view('modules.customer.detail', compact('customer', 'bank'));
    }



    /*
    * Updating login information of the customer
    * save to database
    *
    */
    public function updateLoginInfo(UpdateLoginInfoRequest $request, $id)
    {
        $user = User::find($id);
        $user->username = $request->username;
        if ($user->password != ""){
            $user->password = \bcrypt($request->password);
        }
        $user->save();
        return redirect()->back()->with('success', 'Login detail updated successfully');
    }



    /*
    * updating customer detail
    * save to database
    */
    public function updateCustomerDetail(UpdateCustomerDetailRequest $request, $id)
    {

        $customer                   = Customer::find($id);
        //$customer->name             = $request->name;
        $customer->permanentaddress = $request->permanentaddress;
        $customer->temporaryaddress = $request->temporaryaddress;
        $customer->mobile           = $request->mobile;
        $customer->fathername       = $request->fathername;
        $customer->mothername       = $request->mothername;
        $customer->citizenshipno    = $request->citizenshipno;
        $customer->ismultiple       = $request->multiple;
        $customer->save();

        $user = User::find($customer->user_id);
        $user->name = $request->name;
        $user->save();

        return redirect()->back()->with('success', 'Customer detail updated successfully');

    }


    /*
    * updating bank details
    * save to database
    */
    public function updateBank(Request $request, $id)
    {
        $customer = CustomerBank::create([
                'customer_id' => $id,
                'bank_id'  => $request->bank,
                'accountno' => $request->accountno
            ]);
        return redirect()->back()->with('success', 'Bank updated successfully');
    }

}
