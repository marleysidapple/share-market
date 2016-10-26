<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\CompanyService;
use App\Services\CompanyTypeService;
use App\Services\RtaService;
use Redirect;
use Input;
use Validator;

class CompanyController extends Controller
{
    public function __construct()
    {
        // parent::__construct();
        $this->companyService = new CompanyService(); 
        $this->companyTypeService = new CompanyTypeService(); 
        $this->rtaService = new RtaService(); 
    }

    public function index()
    {
        // if(!empty(Input::get('page'))){
        //     $data['page'] = Input::get('page') - 1;
        // }else{
        //     $data['page'] = 0;
        // }

        $data['pageData'] = $this->companyService->getallData();

        // dd($data);
    	return view('modules.company.company-list', $data);
    }

    public function add()
    {
        $data['companyType'] = $this->companyTypeService->getallData();
        $data['rtaList'] = $this->rtaService->getallData();
        // dd($data);
    	return view('modules.company.company-add', $data);
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

        $res = $this->companyService->add($request->except('_token'));

        $data['msgSuccess'] = "New Company added successfully";
        return Redirect::to('management/listed-company')->withErrors($data);
    }

    public function edit($id){
        // dd($id);

        $data['pageData'] = $this->companyService->getDataById($id);
        $data['companyType'] = $this->companyTypeService->getallData();
        $data['rtaList'] = $this->rtaService->getallData();
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
        $this->companyService->update($brokerId, $inputData);

        $data['msgSuccess'] = "Company updated successfully";
        return Redirect::to('management/listed-company')->withErrors($data);
    }

    public function deleteData($id){
        // dd($id);
        $this->companyService->deleteData($id);

        $data['msgSuccess'] = "Company deleted successfully";
        return Redirect::to('management/listed-company')->withErrors($data);
    }

}
