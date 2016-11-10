<?php 

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\Model;

class Dptable extends Model
{
	protected $table = 'dp';

  	protected $fillable = array('name', 'dp_code', 'address', 'phone', 'email');

}


