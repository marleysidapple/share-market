<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerBank extends Model
{
    protected $table = 'customer_bank';

    protected $fillable = array('customer_id', 'bank_id', 'branch_id', 'accountno', 'accountname');

    public $timestamps = false;



    public function bankname()
    {
    	return $this->belongsTo('App\Bank', 'bank_id');
    }

    public function branchname()
    {
    	return $this->belongsTo('App\Branch', 'branch_id');
    }
}
