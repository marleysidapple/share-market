<?php

namespace App\Services;

use App\Pricepackage;
use Config;
use URL;
use Input;

class PricepackageService 
{ 

    public function __construct() {

        $this->model = new Pricepackage();
    }

    public function add($request){
        
        return $this->model->create($request);
    }

    public function update($id, $request){
        $data = $this->model->find($id);
        return $data->update($request);
    }

    public function getAllData(){
        return $this->model->all();
    }

    public function getDataById($id){
        return $this->model->find($id);
    }

    public function getDataByIdStatus($id){
        return $this->model->where('package_id', $id)->where('status', 'active')->first();
    }

    public function getDataByIdStatusAll($id){
        return $this->model->where('package_id', $id)->where('status', 'active')->get();
    }

    public function deleteData($id){
        $data = $this->model->find($id);
        return $data->delete();
    }


}