<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\PackageService;
use App\Services\PricepackageService;
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
    }

    public function index()
    {
        // if(!empty(Input::get('page'))){
        //     $data['page'] = Input::get('page') - 1;
        // }else{
        //     $data['page'] = 0;
        // }

        $data['pageData'] = $this->packageService->getallData();
        $data['select'] = 'package';
        // dd($data);
    	return view('modules.management.package-list', $data);
    }

    public function add()
    {
        $data['listService'] = Config::get('packageservice.listService');
    	return view('modules.management.package-add', $data);
    }

    public function store(Request $request){
        // dd($request->all());

        $rules = array(
            'name' => 'required',
            'service' => 'required|min:2|max:50',
            'primary_price' => 'required|numeric|min:0.1',
            'secondary_price' => 'required|numeric|min:0.1' 
            );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $packageData['name'] = Input::get('name');
        $packageData['service'] = Input::get('service');
        $packageData['description'] = Input::get('description');

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

        $data['pageData'] = $this->packageService->getDataById($id);
        $priceData = $this->pricepackageService->getDataByIdStatus($id);
        $data['primaryPrice'] = $priceData->primary_price;
        $data['secondaryPrice'] = $priceData->secondary_price;

        $data['listService'] = Config::get('packageservice.listService');
        // dd($data);
        return view('modules.management.package-edit', $data);
    }

    public function update(Request $request){

        $rules = array(
            'name' => 'required',
            'service' => 'required|min:2|max:50',
            'primary_price' => 'required|numeric|min:0.1',
            'secondary_price' => 'required|numeric|min:0.1' 
            );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $id = $request->get('id');

        $packageData['name'] = Input::get('name');
        $packageData['service'] = Input::get('service');
        $packageData['description'] = Input::get('description');

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

}
