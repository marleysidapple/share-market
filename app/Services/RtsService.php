<?php

namespace App\Services;

use App\Rts;
use Config;
use URL;
use Input;

class RtsService 
{ 

    public function __construct() {

        $this->model = new Rts();
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

    public function deleteData($id){
        $data = $this->model->find($id);
        return $data->delete();
    }


}