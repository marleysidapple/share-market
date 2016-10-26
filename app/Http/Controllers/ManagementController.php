<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Redirect;
use Input;
use Validator;
use App\Services\BankService;

class ManagementController extends Controller
{
    public function __construct()
    {
    	$this->bankService = new BankService(); 
    }

    public function index(){

    	$data['bankData'] = $this->bankService->getallData();
        // dd('test');
    	return view('modules.management.list', $data);
    }

}
