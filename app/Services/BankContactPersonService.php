<?php

namespace App\Services;

use App\BankContactPerson;
use Config;
use URL;
use Input;

class BankContactPersonService 
{ 

    public function __construct() {

        $this->model = new BankContactPerson();
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

    public function getAllDataByBank($bankId){
        return $this->model->where('bank_id', $bankId)->get();
    }

    public function getDataById($id){
        return $this->model->find($id);
    }

    public function deleteData($id){
        $data = $this->model->find($id);
        return $data->delete();
    }


}