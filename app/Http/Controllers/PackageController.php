<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\PackageService;
use App\Services\PricepackageService;
use App\Services\ServicepackageService;
use Redirect;
use Input;
use Validator;
use Config;

class PackageController extends Controller
{
    public function __construct()
    {
        // parent::__construct();
        $this->packageService = new PackageService();
        $this->pricepackageService = new PricepackageService();
        $this->servicepackageService = new ServicepackageService();
        $this->select = 'package';
    }

    public function index()
    {
        // if(!empty(Input::get('page'))){
        //     $data['page'] = Input::get('page') - 1;
        // }else{
        //     $data['page'] = 0;
        // }

        $data['pageData'] = $this->packageService->getallData();
        $data['select'] = $this->select;
        // dd($data);
    	return view('modules.management.package-list', $data);
    }

    public function add()
    {
        $data['select'] = $this->select;
        // $data['listService'] = $this->servicepackageService->getAllName();
        $data['listService'] = Config::get('packageservice.listService');
    	return view('modules.management.package-add', $data);
    }

    public function store(Request $request){
        // dd($request->all());

        $rules = array(
            'name' => 'required',
            'service' => 'required',
            'primary_price' => 'required|numeric|min:0.1',
            'secondary_price' => 'required|numeric|min:0.1' 
            );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $packageData['name'] = Input::get('name');
        $packageData['description'] = Input::get('description');

        $serviceList = array();
        $serviceData = '';
        $services = Input::get('service');
        if(!empty($services)){
            foreach ($services as $sList) {
                $serviceList[] = $sList;
                // array_push($serviceList, array($sList));
            }
            $packageData['service'] = implode(", ",$serviceList);
        }

        $res = $this->packageService->add($packageData);
        if($res){
            $priceData['package_id'] = $res->id;
            $priceData['primary_price'] = round(Input::get('primary_price'), 2);
            $priceData['secondary_price'] =round(Input::get('secondary_price'), 2);
            $priceData['status'] = 'active';
            $this->pricepackageService->add($priceData);
        }

        $data['msgSuccess'] = "New Package added successfully";
        return Redirect::to('package')->withErrors($data);
    }

    public function edit($id){
        // dd($id);

        $data['select'] = $this->select;
        $data['pageData'] = $this->packageService->getDataById($id);
        $priceData = $this->pricepackageService->getDataByIdStatus($id);
        $data['primaryPrice'] = $priceData->primary_price;
        $data['secondaryPrice'] = $priceData->secondary_price;

        $list = array();
        $data['listService'] = Config::get('packageservice.listService');
        foreach ($data['listService'] as $value) {
            $list[] = $value;
        }

        $serviceData = $data['pageData']->service;
        $data['relatedServiceList'] = explode(", ",$serviceData);
  
        $data['serviceResult'] = array_diff_assoc($list, $data['relatedServiceList']);

        // dd($data);
        return view('modules.management.package-edit', $data);
    }

    public function update(Request $request){

        $rules = array(
            'name' => 'required',
            'service' => 'required',
            'primary_price' => 'required|numeric|min:0.1',
            'secondary_price' => 'required|numeric|min:0.1' 
            );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $id = $request->get('id');

        $packageData['name'] = Input::get('name');
        $packageData['description'] = Input::get('description');

        $serviceList = array();
        $serviceData = '';
        $services = Input::get('service');
        if(!empty($services)){
            foreach ($services as $sList) {
                $serviceList[] = $sList;
                // array_push($serviceList, array($sList));
            }
            $packageData['service'] = implode(", ",$serviceList);
        }

        $result = $this->packageService->update($id, $packageData);

        $pricePack = $this->pricepackageService->getDataByIdStatusAll($id);
        foreach ($pricePack as $key) {
            $updateData['status'] = 'inactive';
            $this->pricepackageService->update($key->id, $updateData);
        }
        $priceData['package_id'] = $id;
        $priceData['primary_price'] = round(Input::get('primary_price'), 2);
        $priceData['secondary_price'] =round(Input::get('secondary_price'), 2);
        $priceData['status'] = 'active';
        $this->pricepackageService->add($priceData);

        $data['msgSuccess'] = "Package updated successfully";
        return Redirect::to('package')->withErrors($data);
    }

    public function deleteData($id){
        // dd($id);
        $this->packageService->deleteData($id);

        $data['msgSuccess'] = "Package deleted successfully";
        return Redirect::to('package')->withErrors($data);
    }

    /* service package code start */

    public function indexService()
    {
        $data['pageData'] = $this->servicepackageService->getallData();
        $data['select'] = $this->select;
        // dd($data);
        return view('modules.management.service-list', $data);
    }

    public function addService()
    {
        $data['select'] = $this->select;
        return view('modules.management.service-add', $data);
    }

    public function storeService(Request $request){
        // dd($request->all());

        $rules = array(
            'service_name' => 'required'
            );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $res = $this->servicepackageService->add($request->except('_token'));

        $data['msgSuccess'] = "New Service added successfully";
        return Redirect::to('package/service')->withErrors($data);
    }

    public function editService($id){
        // dd($id);

        $data['pageData'] = $this->servicepackageService->getDataById($id);
        $data['select'] = $this->select;

        return view('modules.management.service-edit', $data);
    }

    public function updateService(Request $request){

        $rules = array(
            'service_name' => 'required'
            );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $id = $request->get('id');

        $result = $this->servicepackageService->update($id, $request->except('_token'));

        $data['msgSuccess'] = "Service updated successfully";
        return Redirect::to('package/service')->withErrors($data);
    }

    public function deleteDataService($id){
        // dd($id);
        $this->servicepackageService->deleteData($id);

        $data['msgSuccess'] = "Service deleted successfully";
        return Redirect::to('package/service')->withErrors($data);
    }

}
