<?php

namespace App\Services;

abstract class EloquentService
{

  public function __construct($model)
  {
    $this->model = $model;
  }

  public function getAllData()
  {

    return $this->model->getAllData();
  }

  public function add($data)
  {
    return $this->model->add($data);
  }

  public function updateData($id, $data)
  {
    return $this->model->updateData($id, $data);
  }

  public function deleteData($id)
  {
    return $this->model->deleteData($id);
  }

  public function restore($id)
  {
    return $this->model->restore($id);
  }


  public function validate($data)
  {
    return $this->model->validate($data);
  }


  public function validateUpdate($data, $id)
  {
    return $this->model->validateUpdate($data, $id);
  }

  public function getDataById($id)
  {
    return $this->model->getDataById($id);
  }




}