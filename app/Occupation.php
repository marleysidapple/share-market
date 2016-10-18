<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    protected $table = 'customer_occupation';

    protected $fillable = array('customer_id', 'designation', 'name', 'address', 'pan', 'income', 'contact');
}
