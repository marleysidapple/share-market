<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customerreference extends Model
{
    protected $table = 'customer_reference';

    protected $fillable = array('customer_id', 'reference_person', 'mainfocus', 'client_type', 'pan', 'income');
}
