<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\DpService;
use Redirect;
use Input;
use Validator;

class DpController extends Controller
{
    public function __construct()
    {
        // parent::__construct();
        $this->dpService = new DpService(); 
        $this->select = 'home';
    }

    public function index()
    {
        // if(!empty(Input::get('page'))){
        //     $data['page'] = Input::get('page') - 1;
        // }else{
        //     $data['page'] = 0;
        // }

        $data['pageData'] = $this->dpService->getallData();

        // dd($data);
    	return view('modules.dp.dp-list', $data);
    }

    public function add()
    {
        $data['select'] = $this->select;
    	return view('modules.dp.dp-add', $data);
    }

    public function store(Request $request){
        // dd($request->all());

        $rules = array(
            'name' => 'required',
            'dp_id' => 'required|digits:8',
            'address' => 'min:2|max:50',
            'phone' => 'digits_between:8,20',
            'email' => 'email'
            );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $res = $this->dpService->add($request->except('_token'));

        $data['msgSuccess'] = "New Depository Participants(DP) added successfully";
        return Redirect::to('management/dp')->withErrors($data);
    }

    public function edit($id){
        // dd($id);
        $data['select'] = $this->select;
        $data['pageData'] = $this->dpService->getDataById($id);
        // dd($data);
        return view('modules.dp.dp-edit', $data);
    }

    public function update(Request $request){

        $rules = array(
            'name' => 'required',
            'dp_id' => 'required',
            'address' => 'min:2|max:50',
            'phone' => 'digits_between:8,20',
            'email' => 'email'
            );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $bankId = $request->get('id');
        $inputData = $request->except('_token', 'id');

        // dd($inputData);
        $this->dpService->update($bankId, $inputData);

        $data['msgSuccess'] = "Depository Participants(DP) updated successfully";
        return Redirect::to('management/dp')->withErrors($data);
    }

    public function deleteData($id){
        // dd($id);
        $this->dpService->deleteData($id);

        $data['msgSuccess'] = "Depository Participants(DP) deleted successfully";
        return Redirect::to('management/dp')->withErrors($data);
    }

}
