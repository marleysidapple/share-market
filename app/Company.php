<?php 

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table = 'company';

  	protected $fillable = array('company_name', 'company_type_id', 'company_ticker', 'rta_id');

}


