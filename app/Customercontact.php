<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customercontact extends Model
{
    protected $table = 'customer_contact';

    protected $fillable = array('customer_id', 'email', 'mobile', 'home_contact');
}
