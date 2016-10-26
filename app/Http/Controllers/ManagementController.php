<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Redirect;
use Input;
use Validator;
use App\Services\BankService;
use App\Services\BrokerService;
use App\Services\RtaService;
use App\Services\DpService;
use App\Services\CompanyService;

class ManagementController extends Controller
{
    public function __construct()
    {
    	$this->bankService = new BankService(); 
    	$this->brokerService = new BrokerService(); 
    	$this->rtaService = new RtaService(); 
    	$this->dpService = new DpService(); 
    	$this->companyService = new CompanyService();
    }

    public function index($tab=null){
    	if(!empty($tab)){
    		$data['tabId'] = $tab;
    	}else{
    		$data['tabId'] = '';
    	}
    	
    	$data['bankData'] = $this->bankService->getallData();
    	$data['brokerData'] = $this->brokerService->getallData();
    	$data['rtsData'] = $this->rtaService->getallData();
    	$data['dpData'] = $this->dpService->getallData();
    	$data['companyData'] = $this->companyService->getallData();
        // dd('test');
    	return view('modules.management.list', $data);
    }

}
