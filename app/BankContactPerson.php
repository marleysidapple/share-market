<?php 

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\Model;

class BankContactPerson extends Model
{
	protected $table = 'bank_contact_person';

  	protected $fillable = array('name', 'designation','email', 'contact', 'bank_id', 'branch_id');

  	public function bankContactPerson(){
  		return BankContactPerson::belongsTo('App\Bank', 'bank_id', 'id');
  	}

  	public function branchContactPerson(){
  		return BankContactPerson::belongsTo('App\Branch', 'branch_id', 'id');
  	}

}


