<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerBank extends Model
{
    protected $table = 'customer_bank';

    protected $fillable = array('customer_id', 'bank_id', 'accountno');

    public $timestamps = false;



    public function bankname()
    {
    	return $this->belongsTo('App\Bank', 'bank_id');
    }
}
