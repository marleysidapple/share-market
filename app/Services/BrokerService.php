<?php

namespace App\Services;

use App\Broker;
use Config;
use URL;
use Input;

class BrokerService 
{ 

    public function __construct() {

        $this->model = new Broker();
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