<?php 

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\Model;

class Companytype extends Model
{
	protected $table = 'company_type';

  	protected $fillable = array('type');

}


