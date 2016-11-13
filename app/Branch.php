<?php 

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
	protected $table = 'bank_branch';

  	protected $fillable = array('bank_id', 'address', 'phone', 'email', 'contact_person', 'contact_person_no');

  	// public function branchContactPerson()
  	// {
  	// 	return $this->hasMany('App\BankContactPerson', 'branch_id');
  	// }
}


