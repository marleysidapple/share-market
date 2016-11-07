<?php

namespace App\Http\Controllers;

use App\Services\BranchService;
use Illuminate\Http\Request;
use Redirect;
use Validator;
use Entrust;
use Auth;

class BranchController extends Controller
{
    public function __construct()
    {
        // parent::__construct();
        $this->branchService = new BranchService(); 
        $this->middleware('able');
        $this->select = 'home';
    }

    public function index($bankId)
    {
        $data['bankId']   = $bankId;
        $data['pageData'] = $this->branchService->getallData($bankId);

        // dd($data);
        return view('modules.branch.branch-list', $data);
    }

    public function add($bankId)
    {
        $data['bankId'] = $bankId;
        return view('modules.branch.branch-add', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $rules = array(
            'address'           => 'required|min:2|max:50',
            'phone'             => 'required|digits_between:8,20',
            'contact_person'    => 'required|min:2|max:20',
            'contact_person_no' => 'required|digits_between:8,20',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $bankId = $request->get('bank_id');
        $res    = $this->branchService->add($request->except('_token'));

        $data['msgSuccess'] = "New Branch added successfully";

        // dd($data);
        return Redirect::to('home/branch/' . $bankId)->withErrors($data);
    }

    public function edit($id)
    {
        // dd($id);

        $data['pageData'] = $this->branchService->getDataById($id);
        // dd($data);
        return view('modules.branch.branch-edit', $data);
    }

    public function update(Request $request)
    {

        $rules = array(
            'address'           => 'required|min:2|max:50',
            'phone'             => 'required|digits_between:8,20',
            'contact_person'    => 'required|min:2|max:20',
            'contact_person_no' => 'required|digits_between:8,20',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $branchId  = $request->get('id');
        $bankId    = $request->get('bankId');
        $inputData = $request->except('_token', 'id', 'bank_id');

        $this->branchService->update($branchId, $inputData);

        $data['msgSuccess'] = "Branch updated successfully";
        // dd($data);
        return Redirect::to('home/branch/' . $bankId)->withErrors($data);
    }

    public function deleteData($bankId, $branchId)
    {

        $this->branchService->deleteData($branchId);
        $data['msgSuccess'] = "Branch deleted successfully";
        return Redirect::to('home/branch/' . $bankId)->withErrors($data);
    }

}
