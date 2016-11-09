<?php 

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\Model;

class Rts extends Model
{
	protected $table = 'rta';

  	protected $fillable = array('name', 'email', 'phone', 'contact_person', 'contact_person_no', 'remarks');
}
