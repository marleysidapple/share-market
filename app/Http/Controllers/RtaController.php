<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\RtaService;
use Redirect;
use Input;
use Validator;

class RtaController extends Controller
{
    public function __construct()
    {
        // parent::__construct();
        $this->rtaService = new RtaService(); 
    }

    public function index()
    {
        // if(!empty(Input::get('page'))){
        //     $data['page'] = Input::get('page') - 1;
        // }else{
        //     $data['page'] = 0;
        // }

        $data['pageData'] = $this->rtaService->getallData();

        // dd($data);
    	return view('modules.rta.rta-list', $data);
    }

    public function add()
    {
    	return view('modules.rta.rta-add');
    }

    public function store(Request $request){
        // dd($request->all());

        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits_between:8,20',
            'contact_person' => 'required|min:2|max:20',
            'contact_person_no' => 'required|digits_between:8,20',  
            'remarks' => 'required',
            );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $res = $this->rtaService->add($request->except('_token'));

        $data['msgSuccess'] = "New New Registrar and Transfer Agent (RTA) added successfully";
        return Redirect::to('rta')->withErrors($data);
    }

    public function edit($id){
        // dd($id);

        $data['pageData'] = $this->rtaService->getDataById($id);
        // dd($data);
        return view('modules.rta.rta-edit', $data);
    }

    public function update(Request $request){

        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits_between:8,20',
            'contact_person' => 'required|min:2|max:20',
            'contact_person_no' => 'required|digits_between:8,20',  
            'remarks' => 'required',  
            );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $brokerId = $request->get('id');
        $inputData = $request->except('_token', 'id');

        // dd($inputData);
        $this->rtaService->update($brokerId, $inputData);

        $data['msgSuccess'] = "New Registrar and Transfer Agent (RTA) updated successfully";
        return Redirect::to('rta')->withErrors($data);
    }

    public function deleteData($id){
        // dd($id);
        $this->rtaService->deleteData($id);

        $data['msgSuccess'] = "New Registrar and Transfer Agent (RTA) deleted successfully";
        return Redirect::to('rta')->withErrors($data);
    }

}
