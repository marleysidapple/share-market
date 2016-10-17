<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citizenship extends Model
{
    protected $table = 'customer_citizenship';

    protected $fillable = array('customer_id', 'citizenshipno', 'issuedate', 'issuedistrict', 'filename');
}
