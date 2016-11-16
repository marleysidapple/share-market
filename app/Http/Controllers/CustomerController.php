<?php

namespace App\Http\Controllers;

use App\Address;
use App\Bank;
use App\Branch;
use App\Broker;
use App\Citizenship;
use App\Clienttype;
use App\Customer;
use App\CustomerBank;
use App\Customercontact;
use App\Customerdmat;
use App\Customermember;
use App\Customerpackage;
use App\Customerreference;
use App\Customerservice;
use App\District;
use App\Dptable;
use App\Http\Requests\AddDmatRequest;
use App\Http\Requests\AddNewBankRequest;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\UpdateBankRequest;
use App\Http\Requests\UpdateCitizenshipRequest;
use App\Http\Requests\UpdateContactInfoRequest;
use App\Http\Requests\UpdateLoginRequest;
use App\Http\Requests\UpdatePermanentAddressRequest;
use App\Http\Requests\UpdatePersonalDetailRequest;
use App\Http\Requests\UpdateProfessionRequest;
use App\Http\Requests\UpdateTemporaryAddressRequest;
use App\Occupation;
use App\Packagesystem;
use App\Role;
use App\Rta;
use App\Servicepackage;
use App\User;
use App\Username;
use App\Zone;
use Illuminate\Http\Request;

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
        $packages = Packagesystem::all();
        $service  = Servicepackage::all();
        $client   = Clienttype::all();

        $user = User::OrderBy('id', 'desc')->select('username')->first();

        if ($user->username != "") {
            $year    = date('Y');
            $result  = explode($year, $user->username);
            $counter = $result['1'];
            $count   = $counter + 1;
            $final   = sprintf("%04d", $count);
        } else {
            $final = '0001';
        }

        /*
         * username config
         */
        $username = Username::first();
        $username = $username->prefix . $username->year . $final;
        return view('modules.customer.add', compact(array('bank', 'username', 'zone', 'district', 'packages', 'service', 'client')));
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
            'password' => \bcrypt($request->username),
        ]);

        $roles = Role::where('name', 'user')->first();
        $user->attachRole($roles->id);

        $this->storeCustomerDetail($user, $request);

        return redirect()->back()->with('success', 'New Customer added successfully');

    }

    public function storeCustomerDetail($user, $request)
    {

        $destinationPath = 'uploads/' . date('his') . '-' . str_slug($request->name);
        if ($request->file('profilephoto') != "") {
            $ext = $request->file('profilephoto')->getClientOriginalExtension();
            if ($request->file('profilephoto')->isValid()) {
                $fileName = str_random(4) . date('his') . '.' . $ext;
                $request->file('profilephoto')->move($destinationPath, $fileName);
            }
        } else {
            $fileName = '';
        }

        $customer = Customer::create([
            'user_id'           => $user->id,
            'gender'            => $request->gender,
            'dateofbirth'       => $request->dateofbirth,
            'fathername'        => $request->fathername,
            'gfathername'       => $request->grandfathername,
            'husband_wife_name' => $request->husband_wife_name,
            'photo'             => $destinationPath . '/' . $fileName,
            'status'            => 1,
        ]);

        $this->storePackage($customer, $request);
        $this->storeService($customer, $request);
        $this->storeContactDetail($customer, $request);
        $this->storeAddressDetail($customer, $request);
        $this->storeCitizenshipDetail($customer, $destinationPath, $request);
        $this->storeOccupationDetail($customer, $request);
        $this->storeReference($customer, $request);
        // $this->storeDmatDetail($customer, $request);
        // $this->storeBankDetail($customer, $request);

        return redirect()->back()->with('success', 'New Customer added successfully');

    }

    public function storePackage($customer, $request)
    {
        $package = Customerpackage::create([
            'customer_id' => $customer->id,
            'package_id'  => $request->package,
        ]);
    }

    public function storeService($customer, $request)
    {
        if (count($request->service) != "0") {
            foreach ($request->service as $key => $val) {
                echo $val;
                $cust_service              = new Customerservice;
                $cust_service->customer_id = $customer->id;
                $cust_service->service_id  = $val;
                $cust_service->save();
            }
        }
    }

    public function storeContactDetail($customer, $request)
    {
        $cont = Customercontact::create([
            'customer_id'  => $customer->id,
            'email'        => $request->email,
            'mobile'       => $request->mobile,
            'home_contact' => $request->homeno,
        ]);
    }

    public function storeAddressDetail($customer, $request)
    {

        $address = Address::create([
            'customer_id'       => $customer->id,
            'zone_id'           => $request->zone,
            'district_id'       => $request->district,
            'vdc_municipality'  => $request->vdc_municipality,
            'ward'              => $request->ward,
            'street'            => $request->street,

            'tzone_id'          => $request->tzone ? $request->tzone : '',
            'tdistrict_id'      => $request->tdistrict ? $request->tdistrict : '',
            'tvdc_municipality' => $request->tvdc_municipality,
            'tward'             => $request->tward,
            'tstreet'           => $request->tstreet,
        ]);
    }

    public function storeCitizenshipDetail($customer, $destinationPath, $request)
    {
        $ext = $request->file('scancitizenshipcopy')->getClientOriginalExtension();
        if ($request->file('scancitizenshipcopy')->isValid()) {
            $fileName = str_random(4) . date('his') . '.' . $ext;
            $request->file('scancitizenshipcopy')->move($destinationPath, $fileName);
        }
        $citizenship = Citizenship::create([
            'customer_id'   => $customer->id,
            'citizenshipno' => $request->citizenshipno,
            'issuedate'     => $request->issuedate,
            'issuedistrict' => $request->issuedistrict,
            'filename'      => $destinationPath . '/' . $fileName,
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
            $banks->accountname = $val['accname'];

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
            'address'     => $request->oaddress,
            'contact'     => $request->contact,

        ]);
    }

    public function storeDmatDetail($customer, $request)
    {
        foreach ($request->dmat as $key => $val) {
            $dmat                     = new Customerdmat;
            $dmat->customer_id        = $customer->id;
            $dmat->registrar_type     = $val['registrar'];
            $dmat->registrar_agent_id = $val['regname'];
            $dmat->accountnumber      = $val['accno'];
            $dmat->save();
        }
    }

    public function storeReference($customer, $request)
    {
        $ref = Customerreference::create([
            'customer_id'      => $customer->id,
            'reference_person' => $request->reference,
            'mainfocus'        => '0',
            'client_type'      => $request->clienttype,
            'pan'              => $request->pan,
            'income'           => $request->income,

        ]);
    }

    /*
     * Displaying the detail of the customer
     * render view and pass data
     */
    public function show($id)
    {
        $bank     = Bank::all();
        $customer = Customer::find($id);
        return view('modules.customer.detail', compact('customer', 'bank'));
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

    /*
     *
     * sending data back for the ajax request
     * finding appropriate registrar
     */
    public function registrar(Request $request)
    {
        $reg = $request->registrar;
        switch ($reg) {
            case 'broker':
                $rDetail = Broker::all();
                break;

            case 'dp':
                $rDetail = Dptable::all();
                break;

            case 'rta':
                $rDetail = Rta::all();
                break;

            default:
                echo "none";
                break;
        }

        return \Response::json($rDetail);
    }

    /*
     * Getting personal detail
     *
     */
    public function personalDetail($id)
    {

        $customer = Customer::find($id);
        return view('modules.customer.personaldetail', compact('customer'));
    }

    /*
     * updating personal detail
     * update in database
     */
    public function updatePersonalDetail(UpdatePersonalDetailRequest $request, $id)
    {
        $customer = Customer::find($id);
        $user     = User::find($customer->user_id);
        //if user has updated the profie picture
        if ($request->profilephoto != "") {
            //delete the previous profile picture
            $directoryAndFile = explode('/', $customer->photo);
            //0 - parent(uploads) 1-folder name 2-filename
            if (\File::exists('uploads/' . $directoryAndFile['1'] . '/' . $directoryAndFile['2'])) {
                \File::delete('uploads/' . $directoryAndFile['1'] . '/' . $directoryAndFile['2']);
            }
            //now prepare for destination

            $destination = 'uploads/' . $directoryAndFile['1'];
            $ext         = $request->file('profilephoto')->getClientOriginalExtension();
            $fileName    = str_random(4) . date('his') . '.' . $ext;
            $request->file('profilephoto')->move($destination, $fileName);
            $customer->photo = $destination . '/' . $fileName;
        }
        $user->name = $request->name;

        $customer->gender            = $request->gender;
        $customer->dateofbirth       = $request->dateofbirth;
        $customer->fathername        = $request->fathername;
        $customer->gfathername       = $request->gfathername;
        $customer->husband_wife_name = $request->husband_wife_name;
        $customer->status            = 1;

        $user->save();
        $customer->save();

        return redirect()->back()->with('success', 'Personal Details updated successfully');
    }

    /*
     * getting contact information
     * render edit view
     */
    public function contactInfo($id)
    {
        $customer = Customer::find($id);
        return view('modules.customer.contactinfo', compact('customer'));
    }

    /*
     * updating contact detail
     * post to database
     */
    public function updateContactDetail(UpdateContactInfoRequest $request, $id)
    {
        $customer               = Customer::find($id);
        $user                   = User::find($customer->user_id);
        $customerContact        = Customercontact::where('customer_id', $id)->first();
        $contacts               = Customercontact::find($customerContact->id);
        $contacts->email        = $request->email;
        $contacts->mobile       = $request->mobile;
        $contacts->home_contact = $request->homeno;

        $user->email = $request->email;

        $user->save();
        $contacts->save();

        return redirect()->back()->with('success', 'Contact Details updated successfully');

    }

    /*
     * getting permanent address detail
     * render edit view
     *
     */
    public function paddressDetail($id)
    {
        $customer = Customer::find($id);
        $zone     = Zone::all();
        return view('modules.customer.permanentaddressdetail', compact('customer', 'zone'));
    }

    /*
     * updating permanent address detail
     * post to database
     */
    public function updatePaddressDetail(UpdatePermanentAddressRequest $request, $id)
    {
        $address = Address::where('customer_id', $id)->select('id')->first();

        if (count($address) != "0") {
            $addr                   = Address::find($address->id);
            $addr->zone_id          = $request->zone;
            $addr->district_id      = $request->district;
            $addr->vdc_municipality = $request->vdc_municipality;
            $addr->ward             = $request->ward;
            $addr->street           = $request->street;
            $addr->save();
        } else {
            $addr                   = new Address;
            $addr->customer_id      = $id;
            $addr->zone_id          = $request->zone;
            $addr->district_id      = $request->district;
            $addr->vdc_municipality = $request->vdc_municipality;
            $addr->ward             = $request->ward;
            $addr->street           = $request->street;
            $addr->save();

        }
        return redirect()->back()->with('success', 'Permanent Address updated successfully');
    }

    /*
     * getting permanent address detail
     * render edit view
     *
     */
    public function taddressDetail($id)
    {
        $customer = Customer::find($id);
        $zone     = Zone::all();
        return view('modules.customer.temporaryaddressdetail', compact('customer', 'zone'));
    }

    /*
     * updating permanent address detail
     * post to database
     */
    public function updateTaddressDetail(UpdateTemporaryAddressRequest $request, $id)
    {
        $address                    = Address::where('customer_id', $id)->select('id')->first();
        $address                    = Address::find($address->id);
        $address->tzone_id          = $request->zone;
        $address->tdistrict_id      = $request->district;
        $address->tvdc_municipality = $request->vdc_municipality;
        $address->tward             = $request->ward;
        $address->tstreet           = $request->tstreet;
        $address->save();
        return redirect()->back()->with('success', 'Temporary Address updated successfully');
    }

    /*
     * editing citizenship detail
     * render view
     */
    public function editCitizen($id)
    {
        $district = District::all();
        $customer = Customer::find($id);
        return view('modules.customer.citizenship', compact('customer', 'district'));
    }

    /*
     * updating citizenship detail
     * post to database
     */
    public function updateCitizenShip(UpdateCitizenshipRequest $request, $id)
    {
        $customer            = Customer::find($id);
        $findIdOfCitizenShip = Citizenship::where('customer_id', $id)->select('id')->first();
        $citizenship         = Citizenship::find($findIdOfCitizenShip->id);

        if ($request->scancopy != "") {
            //delete the previous citizenship copy
            $directoryAndFile = explode('/', $customer->citizen->filename);
            //0 - parent(uploads) 1-folder name 2-filename
            if (\File::exists('uploads/' . $directoryAndFile['1'] . '/' . $directoryAndFile['2'])) {
                \File::delete('uploads/' . $directoryAndFile['1'] . '/' . $directoryAndFile['2']);
            }
            //now prepare for destination

            $destination = 'uploads/' . $directoryAndFile['1'];
            $ext         = $request->file('scancopy')->getClientOriginalExtension();
            $fileName    = str_random(4) . date('his') . '.' . $ext;
            $request->file('scancopy')->move($destination, $fileName);
            $citizenship->filename = $destination . '/' . $fileName;
        }

        $citizenship->citizenshipno = $request->citizenshipno;
        $citizenship->issuedate     = $request->issuedate;
        $citizenship->issuedistrict = $request->issuedistrict;
        $citizenship->save();

        return redirect()->back()->with('success', 'Citizenship details updated successfully');
    }

    /*
     * editing bank
     * rendering edit view
     */
    public function editBank($id)
    {
        $bank          = Bank::all();
        $customer      = Customer::find($id);
        $customer_bank = CustomerBank::where('customer_id', $id)->get();
        return view('modules.customer.banks', compact('bank', 'customer_bank', 'customer'));
    }

    /*
     * editing the bank detail
     * rendering edit view
     */
    public function editBankDetail($id)
    {
        $bank          = Bank::all();
        $customer_bank = CustomerBank::find($id);
        $customer      = Customer::find($customer_bank->customer_id);
        return view('modules.customer.editbank', compact('bank', 'customer_bank', 'customer'));
    }

    /*
     * updating bank detail
     * save to database
     */
    public function updateBankDetail(UpdateBankRequest $request, $id)
    {

        $customerBank = CustomerBank::find($id);

        if ($request->isprimary == 1) {
            $customer = $customerBank->customer_id;
            $cust     = CustomerBank::where('customer_id', $customer)->where('isprimary', 1)->get();
            if (!is_null($cust)) {
                foreach ($cust as $key => $val) {
                    $b            = CustomerBank::find($val->id);
                    $b->isprimary = 0;
                    $b->save();
                }
            }
        }

        $customerBank->bank_id     = $request->bank;
        $customerBank->branch_id   = $request->branch;
        $customerBank->accountno   = $request->accountnumber;
        $customerBank->accountname = $request->accountname;
        $customerBank->isprimary   = $request->isprimary;
        $customerBank->save();

        return redirect()->back()->with('success', 'Bank details updated successfully');
    }

    /*
     * Deleting bank detail
     * delete from database
     */
    public function deleteBankDetail($id)
    {
        $customerBank = CustomerBank::find($id);
        $customerBank->delete();
        return redirect()->back()->with('success', 'Bank details deleted successfully');
    }

    /*
     * adding bank
     * rendering view
     */
    public function addBankFromProfile($id)
    {
        $customer = Customer::find($id);
        $bank     = Bank::all();
        return view('modules.customer.addbank', compact('bank', 'customer'));
    }

    /*
     * adding new bank
     * saving to db
     */
    public function addNewBank(AddNewBankRequest $request, $id)
    {

        if ($request->isprimary == 1) {
            $bank = CustomerBank::where('customer_id', $id)->where('isprimary', 1)->get();

            if (!is_null($bank)) {
                foreach ($bank as $key => $val) {
                    $b            = CustomerBank::find($val->id);
                    $b->isprimary = 0;
                    $b->save();
                }
            }
        }

        $bank = CustomerBank::create([
            'customer_id' => $id,
            'bank_id'     => $request->bank,
            'branch_id'   => $request->branch,
            'accountno'   => $request->accountnumber,
            'accountname' => $request->accountname,
            'isprimary'   => $request->isprimary,
        ]);

        return redirect()->back()->with('success', 'Bank details added successfully');

    }

    /*
     * editing dmat detail
     * rendering view
     */
    public function editDmat($id)
    {
        $customer      = Customer::find($id);
        $customer_dmat = Customerdmat::where('customer_id', $id)->get();
        return view('modules.customer.dmat', compact('customer_dmat', 'customer'));
    }

    /*
     * editing customer dmat detail
     * rendering view
     */
    public function editDmatDetail($id)
    {
        $dmat     = Customerdmat::find($id);
        $customer = Customer::find($dmat->customer_id);
        return view('modules.customer.editdmat', compact('dmat', 'customer'));
    }

    /*
     * updating dmat detail
     * save to db
     */
    public function updateDmatDetail(Request $request, $id)
    {
        $dmat                     = Customerdmat::find($id);
        $dmat->registrar_type     = $request->registrar;
        $dmat->registrar_agent_id = $request->registrarname;
        $dmat->accountnumber      = $request->accountnumber;
        $dmat->save();

        return redirect()->back()->with('success', 'DMAT details added successfully');
    }

    /*
     * deleting dmat detail
     * delete from db
     */
    public function deleteDmatDetail($id)
    {
        $customerDmat = Customerdmat::find($id);
        $customerDmat->delete();
        return redirect()->back()->with('success', 'DMAT details deleted successfully');
    }

    /*
     * adding new dmat
     * get route
     */
    public function addDmatFromProfile($id)
    {
        $customer = Customer::find($id);
        return view('modules.customer.addDmat', compact('customer'));
    }

    /*
     * adding new dmat
     * save to database
     */
    public function addNewDmat(AddDmatRequest $request, $id)
    {

        $dmat = Customerdmat::create([
            'customer_id'        => $id,
            'registrar_type'     => $request->registrar,
            'registrar_agent_id' => $request->registrarname,
            'accountnumber'      => $request->accountnumber,
        ]);

        return redirect()->back()->with('success', 'DMAT details added successfully');
    }

    /*
     * editing customer profession
     * get route
     */
    public function editProfession($id)
    {
        $customer = Customer::find($id);
        return view('modules.customer.profession', compact('customer'));
    }

    /*
     * updating professional details
     * post to database
     */
    public function updateProfession(UpdateProfessionRequest $request, $id)
    {
        $prof                    = Occupation::where('customer_id', $id)->select('id')->first();
        $profession              = Occupation::find($prof->id);
        $profession->name        = $request->name;
        $profession->designation = $request->designation;
        $profession->contact     = $request->contact;
        $profession->address     = $request->address;

        $profession->save();

        return redirect()->back()->with('success', 'Profession details updated successfully');
    }

    /*
     * editing other information
     * render view
     */
    public function editOtherInfo($id)
    {
        $customer = Customer::find($id);
        $client   = Clienttype::all();
        return view('modules.customer.otherinfo', compact('customer', 'client'));
    }

    /*
     * updating other information
     * save to database
     */
    public function updateotherInfo(Request $request, $id)
    {
        $cust                   = Customerreference::where('customer_id', $id)->first();
        $info                   = Customerreference::find($cust->id);
        $info->reference_person = $request->reference_person;
        $info->mainfocus        = '0';
        $info->client_type      = $request->client_type;
        $info->pan              = $request->pan;
        $info->income           = $request->income;

        $info->save();

        return redirect()->back()->with('success', 'Other details updated successfully');
    }

    /*
     * editing login detail
     * rendering view
     */
    public function editLogin($id)
    {
        $customer = Customer::find($id);
        return view('modules.customer.login', compact('customer'));

    }

    /*
     * updating login detail
     * save to database
     */
    public function updateLoginDetail(UpdateLoginRequest $request, $id)
    {
        $user = User::find($id);

        if ($request->password != "") {
            $user->password = \bcrypt($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Login details updated successfully');
    }

    /*
     * getting package details
     *
     */
    public function getService(Request $request)
    {
        $system   = Packagesystem::find($request->dt);
        $services = explode(',', $system->service);

        $arr = array();

        foreach ($services as $s) {
            $html = '<li><input type="checkbox" name="service[] value="' . $s . '"><span class="stext">' . $s . '</span></li>';
            array_push($arr, $html);
        }

        return \Response::json($arr);
    }

    /*
     * adding new member
     * render view
     */
    public function listMember($id)
    {
        $customer = Customer::find($id);

        $findChilds = Customermember::where('parent_id', $customer->user_id)->select('child_id')->get();

        if ($findChilds != "") {
            $childrens = User::whereIn('id', $findChilds)->get();
        }

        return view('modules.customer.listmember', compact('customer', 'childrens'));
    }

    /*
     * adding members
     *
     */
    public function addMember($id)
    {

        $existingMembers = Customermember::select('child_id')->get();
        $existingParent  = Customermember::select('parent_id')->get();

        if (!is_null($existingMembers)) {
            foreach ($existingMembers as $m) {
                $arr1[] = $m->child_id;
            }
        }

        if (!is_null($existingParent)) {
            foreach ($existingParent as $p) {
                $arr2[] = $p->parent_id;
            }
        }

        if (is_null($arr1)){
            $arr1 = array();
        }

         if (is_null($arr2)){
            $arr2 = array();
        }

        $filters = array_merge($arr1, $arr2);

        if (is_null($filters)) {
            $filters = array();
        }

        $users = User::whereHas('roles', function ($q) {
            $q->where('name', 'user');
        })
            ->where('id', '!=', $id)
            ->whereNotIn('id', $filters)
            ->get();

        $customer = Customer::where('user_id', $id)->first();
        return view('modules.customer.addmember', compact('customer', 'users'));

    }

    /*
     * saving members
     * post to db
     */
    public function saveMember(Request $request, $id)
    {
        // $id - parent
        // $request->member - child

        $crossCheck = Customermember::where('parent_id', $id)->where('child_id', $request->member)->first();

        if (count($crossCheck) != "0") {
            return redirect::back()->with('error', 'Record already exists');
        }

        Customermember::create([
            'parent_id' => $id,
            'child_id'  => $request->member,
        ]);

        return redirect()->back()->with('success', 'Member added successfully');
    }

}
