<?php

namespace App\Http\Controllers;

use App\Services\BankService;
use App\Services\BranchService;
use App\Services\BankContactPersonService;
use Illuminate\Http\Request;
use Redirect;
use Validator;

class BankController extends Controller
{
    public function __construct()
    {
        // parent::__construct();

        $this->bankService = new BankService();
        $this->branchService = new BranchService();
        $this->bankContactPersonService = new BankContactPersonService();
        $this->middleware('able');
        $this->select = 'home';
        $this->tabId = 'bank';
    }

    public function index()
    {
        // if(!empty(Input::get('page'))){
        //     $data['page'] = Input::get('page') - 1;
        // }else{
        //     $data['page'] = 0;
        // }

        $data['pageData'] = $this->bankService->getallData();

        // dd($data);
        return view('modules.bank.list', $data);
    }

    public function add()
    {

        $data['select'] = $this->select;
        $data['tabId'] = $this->tabId;
    	return view('modules.bank.add', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $rules = array(

            'name'              => 'required',
            'address'           => 'required|min:2|max:50',
            'phone'             => 'required|digits_between:8,20',
            'email'             => 'email',
            'contact_person'    => 'min:2|max:20',
            'contact_person_no' => 'digits_between:8,20',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $res = $this->bankService->add($request->except('_token'));
        $data['msgSuccess'] = "New Bank added successfully.";
        return Redirect::to('management/bank')->withErrors($data);
    }

    public function edit($id)
    {
        // dd($id);
        $data['select'] = $this->select;
        $data['tabId'] = $this->tabId;
        $data['pageData'] = $this->bankService->getDataById($id);
        // dd($data);
        return view('modules.bank.edit', $data);
    }

    public function update(Request $request)
    {

        $rules = array(
            'name' => 'required',
            'address' => 'required|min:2|max:50',
            'phone' => 'required|digits_between:8,20',
            'email' => 'email',
            'contact_person' => 'min:2|max:20',
            'contact_person_no' => 'digits_between:8,20', 
            );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $bankId    = $request->get('id');
        $inputData = $request->except('_token', 'id');

        // dd($inputData);
        $this->bankService->update($bankId, $inputData);

        $data['msgSuccess'] = "Bank updated successfully.";
        return Redirect::to('management/bank')->withErrors($data);
    }

    public function deleteData($id)
    {
        // dd($id);
        $this->bankService->deleteData($id);

        $data['msgSuccess'] = "Bank deleted successfully.";
        return Redirect::to('management/bank')->withErrors($data);
    }

    public function view($id)
    {
        // dd($id);
        $data['select'] = $this->select;
        $data['tabId'] = $this->tabId;
        $data['pageData'] = $this->bankService->getDataById($id);
        $data['branchList'] = $this->branchService->getAllData($id);
        $data['contactPersonList'] = $this->bankContactPersonService->getAllDataByBank($id);
        // dd($data);
        return view('modules.bank.view', $data);
    }

    public function storeContactPerson(Request $request){

        $rules = array(
            'name' => 'required|min:2|max:20',
            'designation' => 'required|min:2|max:50',
            'contact' => 'required|digits_between:8,20',
            'email' => 'email'
            );

        // $validator = Validator::make($request->all(), $rules);
        // if ($validator->fails()) {
        //     return Redirect::back()->withErrors($validator)->withInput($request->all());
        // }

        $input = $request->except('_token');
        // dd($input);
        $inputData['bank_id'] = $request->get('id');
        for ($i=0; $i < count($input['name']); $i++) { 
            $inputData['branch_id'] = $input['branch_id'][$i];
            $inputData['name'] = $input['name'][$i];
            $inputData['designation'] = $input['designation'][$i];
            $inputData['email'] = $input['email'][$i];
            $inputData['contact'] = $input['contact'][$i];

            // print_r($inputData);
            $res = $this->bankContactPersonService->add($inputData);
        }
        
        $data['msgSuccess'] = "Contact Person added successfully.";
        return Redirect::to('bank/'.$inputData['bank_id'].'/view')->withErrors($data);
    }

    public function editContactPerson($bankId, $id){

        $data['branchList'] = $this->branchService->getAllData($bankId);
        $data['pageData'] = $this->bankContactPersonService->getDataById($id);


        return view('modules.bank.contact-person-edit', $data);
    }

    public function updateContactPerson(Request $request){
        
        // dd($request->all());
        $rules = array(
            'name' => 'required|min:2|max:20',
            'designation' => 'required|min:2|max:50',
            'contact' => 'required|digits_between:8,20',
            'email' => 'email'
            );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $id    = $request->get('id');
        $updateData = $request->except('_token', 'id', 'bank_id');

        // dd($updateData);
        $this->bankContactPersonService->update($id, $updateData);

        $data['msgSuccess'] = "Contact Person updated successfully.";
        return Redirect::to("bank/$request->bank_id/view")->withErrors($data);
    }

    public function deleteContactPerson($bankId, $id)
    {
        // dd($id);
        $this->bankContactPersonService->deleteData($id);

        $data['msgSuccess'] = "Contact Person deleted successfully.";
        return Redirect::to("bank/$bankId/view")->withErrors($data);
    }

}
