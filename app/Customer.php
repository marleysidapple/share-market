<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = array('user_id', 'gender', 'dateofbirth', 'fathername', 'mothername', 'gfathername', 'gmothername', 'permanentaddress',  'temporaryaddress', 'phone', 'mobile', 'country', 'citizenshipno', 'maritalstatus', 'occupation', 'ismultiple');


    public function userdetail()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }


    public function bank()
    {
    	return $this->hasMany('App\CustomerBank');
    }
}
