<?php

namespace App\Http\Controllers;

use App\Services\BankService;
use Illuminate\Http\Request;
use Redirect;
use Validator;

class BankController extends Controller
{
    public function __construct()
    {
        // parent::__construct();
<<<<<<< HEAD
        $this->bankService = new BankService();
        $this->middleware('able');
=======
        $this->bankService = new BankService(); 
        $this->select = 'home';
>>>>>>> 0cab9c056deb49ba004bc5696b4409fada0e5b36
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
<<<<<<< HEAD
        return view('modules.bank.add');
=======
        $data['select'] = $this->select;
    	return view('modules.bank.add', $data);
>>>>>>> 0cab9c056deb49ba004bc5696b4409fada0e5b36
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $rules = array(
<<<<<<< HEAD
            'name'              => 'required',
            'address'           => 'required|min:2|max:50',
            'phone'             => 'required|digits_between:8,20',
            'contact_person'    => 'required|min:2|max:20',
            'contact_person_no' => 'required|digits_between:8,20',
        );
=======
            'name' => 'required',
            'address' => 'required|min:2|max:50',
            'phone' => 'required|digits_between:8,20',
            'email' => 'email',
            'contact_person' => 'min:2|max:20',
            'contact_person_no' => 'digits_between:8,20',  
            );
>>>>>>> 0cab9c056deb49ba004bc5696b4409fada0e5b36
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $res = $this->bankService->add($request->except('_token'));

        $data['msgSuccess'] = "New Bank added successfully";
<<<<<<< HEAD
        return Redirect::to('home/bank')->withErrors($data);
=======
        return Redirect::to('management/bank')->withErrors($data);
>>>>>>> 0cab9c056deb49ba004bc5696b4409fada0e5b36
    }

    public function edit($id)
    {
        // dd($id);
        $data['select'] = $this->select;
        $data['pageData'] = $this->bankService->getDataById($id);
        // dd($data);
        return view('modules.bank.edit', $data);
    }

    public function update(Request $request)
    {

        $rules = array(
<<<<<<< HEAD
            'name'              => 'required',
            'address'           => 'required|min:2|max:50',
            'phone'             => 'required|digits_between:8,20',
            'contact_person'    => 'required|min:2|max:20',
            'contact_person_no' => 'required|digits_between:8,20',
        );
=======
            'name' => 'required',
            'address' => 'required|min:2|max:50',
            'phone' => 'required|digits_between:8,20',
            'email' => 'email',
            'contact_person' => 'min:2|max:20',
            'contact_person_no' => 'digits_between:8,20', 
            );
>>>>>>> 0cab9c056deb49ba004bc5696b4409fada0e5b36
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $bankId    = $request->get('id');
        $inputData = $request->except('_token', 'id');

        // dd($inputData);
        $this->bankService->update($bankId, $inputData);

        $data['msgSuccess'] = "Bank updated successfully";
<<<<<<< HEAD
        return Redirect::to('home/bank')->withErrors($data);
=======
        return Redirect::to('management/bank')->withErrors($data);
>>>>>>> 0cab9c056deb49ba004bc5696b4409fada0e5b36
    }

    public function deleteData($id)
    {
        // dd($id);
        $this->bankService->deleteData($id);

        $data['msgSuccess'] = "Bank deleted successfully";
<<<<<<< HEAD
        return Redirect::to('home/bank')->withErrors($data);
=======
        return Redirect::to('management/bank')->withErrors($data);
>>>>>>> 0cab9c056deb49ba004bc5696b4409fada0e5b36
    }

}
