<?php 

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\Model;

class Servicepackage extends Model
{
	protected $table = 'service_package';

  	protected $fillable = array('service_name');

}


