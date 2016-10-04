<?php

namespace App\Services;

use App\Branch;
use Config;
use URL;
use Input;

class BranchService 
{ 

    public function __construct() {

        $this->model = new Branch();
    }

    public function add($request){
        
        return $this->model->create($request);
    }

    public function update($id, $request){
        $data = $this->model->find($id);
        // dd($data);
        return $data->update($request);
    }

    public function getAllData($bankId){
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