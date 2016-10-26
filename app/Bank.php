<?php 

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
	protected $table = 'bank';

  	protected $fillable = array('name', 'address', 'phone', 'email', 'bank_grade', 'contact_person', 'contact_person_no');
}


