<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\RtsService;
use Redirect;
use Input;
use Validator;

class RtsController extends Controller
{
    public function __construct()
    {
        // parent::__construct();
        $this->rtsService = new RtsService(); 
        $this->select = 'home';
        $this->tabId = 'rts';
    }

    public function index()
    {
        // if(!empty(Input::get('page'))){
        //     $data['page'] = Input::get('page') - 1;
        // }else{
        //     $data['page'] = 0;
        // }

        $data['pageData'] = $this->rtsService->getallData();

        // dd($data);
    	return view('modules.rta.rta-list', $data);
    }

    public function add()
    {
        $data['select'] = $this->select;
        $data['tabId'] = $this->tabId;
    	return view('modules.rta.rta-add', $data);
    }

    public function store(Request $request){
        // dd($request->all());

        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits_between:8,20',
            'contact_person' => 'min:2|max:20',
            'contact_person_no' => 'digits_between:8,20'
            );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $res = $this->rtsService->add($request->except('_token'));

        $data['msgSuccess'] = "New RTS added successfully";
        return Redirect::to('management/rts')->withErrors($data);
    }

    public function edit($id){
        // dd($id);
        $data['select'] = $this->select;
        $data['tabId'] = $this->tabId;
        $data['pageData'] = $this->rtsService->getDataById($id);
        // dd($data);
        return view('modules.rta.rta-edit', $data);
    }

    public function update(Request $request){

        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits_between:8,20',
            'contact_person' => 'min:2|max:20',
            'contact_person_no' => 'digits_between:8,20'
            );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $brokerId = $request->get('id');
        $inputData = $request->except('_token', 'id');

        // dd($inputData);
        $this->rtsService->update($brokerId, $inputData);

        $data['msgSuccess'] = "New RTS updated successfully";
        return Redirect::to('management/rts')->withErrors($data);
    }

    public function deleteData($id){
        // dd($id);
        $this->rtsService->deleteData($id);

        $data['msgSuccess'] = "New RTS deleted successfully";
        return Redirect::to('management/rts')->withErrors($data);
    }

}
