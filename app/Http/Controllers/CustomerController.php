<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Address;
use App\Bank;
use App\Branch;
use App\Citizenship;
use App\Customer;
use App\CustomerBank;
use App\District;
use App\Occupation;
use App\Role;
use App\User;
use App\Zone;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;

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
        $zone     = Zone::all();
        $district = District::OrderBy('name', 'asc')->get();
        $username = "share" . date('his') . str_random(3);
        return view('modules.customer.add', compact(array('bank', 'username', 'zone', 'district')));
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

        $destinationPath = 'uploads/' . date('his') . '-' . str_slug($request->name);
        $ext             = $request->file('profilephoto')->getClientOriginalExtension();
        if ($request->file('profilephoto')->isValid()) {
            $fileName = str_random(4) . date('his').'.'.$ext;
            $request->file('profilephoto')->move($destinationPath, $fileName);
        }

        $customer = Customer::create([
            'user_id'     => $user->id,
            'gender'      => $request->gender,
            'dateofbirth' => $request->dateofbirth,
            'fathername'  => $request->fathername,
            'mothername'  => $request->mothername,
            'gfathername' => $request->grandfathername,
            'gmothername' => $request->grandmothername,
            'mobile'      => $request->mobile,
            'pan'         => $request->pan,
            'photo'       => $fileName,
            'status'      => 1,
        ]);

        $this->storeAddressDetail($customer, $request);
        $this->storeCitizenshipDetail($customer, $destinationPath, $request);
        $this->storeOccupationDetail($customer, $request);
        $this->storeBankDetail($customer, $request);

        return redirect()->back()->with('success', 'New Customer added successfully');

    }

    public function storeAddressDetail($customer, $request)
    {

        $address = Address::create([
            'customer_id'       => $customer->id,
            'zone_id'           => $request->zone,
            'district_id'       => $request->district,
            'vdc_municipality'  => $request->vdc_municipality,
            'ward'              => $request->ward,
            'street_address'    => $request->street,
            'tzone_id'          => $request->tzone,
            'tdistrict_id'      => $request->tdistrict,
            'tvdc_municipality' => $request->tvdc_municipality,
            'tward'             => $request->tward,
            'tstreet_address'   => $request->tstreet,
        ]);
    }

    public function storeCitizenshipDetail($customer, $destinationPath, $request)
    {
        $ext = $request->file('scancitizenshipcopy')->getClientOriginalExtension();
        if ($request->file('scancitizenshipcopy')->isValid()) {
            $fileName = str_random(4) . date('his').'.'.$ext;
            $request->file('scancitizenshipcopy')->move($destinationPath, $fileName);
        }
        $citizenship = Citizenship::create([
            'customer_id'   => $customer->id,
            'citizenshipno' => $request->citizenshipno,
            'issuedate'     => $request->issuedate,
            'issuedistrict' => $request->issuedistrict,
            'filename'      => $fileName,
        ]);
    }

    public function storeBankDetail($customer, $request)
    {
        foreach ($request->customer as $key => $val) {
            $banks              = new CustomerBank;
            $banks->customer_id = $customer->id;
            $banks->bank_id     = $val['bank'];
            $banks->branch_id   = $val['branch'];
            $banks->accountno   = $val['accountno'];

            $banks->save();
        }

        return redirect()->back()->with('success', 'New Customer added successfully');
    }

    public function storeOccupationDetail($customer, $request)
    {
        $occupation = Occupation::create([
            'customer_id' => $customer->id,
            'designation' => $request->designation,
            'name'        => $request->organisation,
            'address'     => $request->address,
            'contact'     => $request->contact,

        ]);
    }

    /*
     * Displaying the detail of the customer
     * render view and pass data
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        return view('modules.customer.detail', compact('customer'));
    }

    /*
     * Displaying district from zone
     *
     */
    public function district(Request $request)
    {
        $district = District::where('zone_id', $request->zone)->get();
        return \Response::json($district);
    }

    /*
     * Displaying branches
     *
     */
    public function branches(Request $request)
    {
        $branch = Branch::where('bank_id', $request->bank)->get();
        return \Response::json($branch);
    }

}
