<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customerpackage extends Model
{
    protected $table = 'customer_package';

    protected $fillable = array('customer_id', 'package_id');
}
