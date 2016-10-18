<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\BrokerService;
use Redirect;
use Input;
use Validator;

class BrokerController extends Controller
{
    public function __construct()
    {
        // parent::__construct();
        $this->brokerService = new BrokerService(); 
    }

    public function index()
    {
        // if(!empty(Input::get('page'))){
        //     $data['page'] = Input::get('page') - 1;
        // }else{
        //     $data['page'] = 0;
        // }

        $data['pageData'] = $this->brokerService->getallData();

        // dd($data);
    	return view('modules.broker.broker-list', $data);
    }

    public function add()
    {
    	return view('modules.broker.broker-add');
    }

    public function store(Request $request){
        // dd($request->all());

        $rules = array(
            'name' => 'required',
            'address' => 'required|min:2|max:50',
            'broker_no' => 'required',
            'phone' => 'required|digits_between:8,20',
            'contact_person' => 'required|min:2|max:20',
            'contact_person_no' => 'required|digits_between:8,20',  
            );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $res = $this->brokerService->add($request->except('_token'));

        $data['msgSuccess'] = "New Broker added successfully";
        return Redirect::to('broker')->withErrors($data);
    }

    public function edit($id){
        // dd($id);

        $data['pageData'] = $this->brokerService->getDataById($id);
        // dd($data);
        return view('modules.broker.broker-edit', $data);
    }

    public function update(Request $request){

        $rules = array(
            'name' => 'required',
            'address' => 'required|min:2|max:50',
            'broker_no' => 'required',
            'phone' => 'required|digits_between:8,20',
            'contact_person' => 'required|min:2|max:20',
            'contact_person_no' => 'required|digits_between:8,20',  
            );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $brokerId = $request->get('id');
        $inputData = $request->except('_token', 'id');

        // dd($inputData);
        $this->brokerService->update($brokerId, $inputData);

        $data['msgSuccess'] = "Broker updated successfully";
        return Redirect::to('broker')->withErrors($data);
    }

    public function deleteData($id){
        // dd($id);
        $this->brokerService->deleteData($id);

        $data['msgSuccess'] = "Broker deleted successfully";
        return Redirect::to('broker')->withErrors($data);
    }

}
