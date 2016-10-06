<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\CompanyTypeService;
use Redirect;
use Input;
use Validator;

class CompanyTypeController extends Controller
{
    public function __construct()
    {
        // parent::__construct();
        $this->companyTypeService = new CompanyTypeService(); 
    }

    public function index()
    {
        // if(!empty(Input::get('page'))){
        //     $data['page'] = Input::get('page') - 1;
        // }else{
        //     $data['page'] = 0;
        // }

        $data['pageData'] = $this->companyTypeService->getallData();

        // dd($data);
    	return view('modules.company.type-list', $data);
    }

    public function add()
    {
        // dd($data);
    	return view('modules.company.company-add');
    }

    public function store(Request $request){
        // dd($request->all());

        $rules = array(
            'company_name' => 'required',
            'company_type_id' => 'required|int',
            'company_ticker' => 'required',
            'rta_id' => 'required|int'
            );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $res = $this->companyTypeService->add($request->except('_token'));

        $data['msgSuccess'] = "New Company added successfully";
        return Redirect::to('company')->withErrors($data);
    }

    public function edit($id){
        // dd($id);

        $data['pageData'] = $this->companyTypeService->getDataById($id);
        // dd($data);
        return view('modules.company.company-edit', $data);
    }

    public function update(Request $request){

        $rules = array(
            'company_name' => 'required',
            'company_type_id' => 'required|int',
            'company_ticker' => 'required',
            'rta_id' => 'required|int'
            );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $brokerId = $request->get('id');
        $inputData = $request->except('_token', 'id');

        // dd($inputData);
        $this->companyTypeService->update($brokerId, $inputData);

        $data['msgSuccess'] = "Company updated successfully";
        return Redirect::to('company')->withErrors($data);
    }

    public function deleteData($id){
        // dd($id);
        $this->companyTypeService->deleteData($id);

        $data['msgSuccess'] = "Company deleted successfully";
        return Redirect::to('company')->withErrors($data);
    }

}
