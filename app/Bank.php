<?php 

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
	protected $table = 'bank';

  	protected $fillable = array('name', 'address', 'phone', 'bank_grade', 'contact_person', 'contact_person_no');

  	public function branch()
  	{
  		return $this->hasMany('App\Branch', 'bank_id');
  	}

}


