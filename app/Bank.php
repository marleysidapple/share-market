<?php 

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
	protected $table = 'bank';

<<<<<<< HEAD
  	protected $fillable = array('name', 'address', 'phone', 'bank_grade', 'contact_person', 'contact_person_no');

  	public function branch()
  	{
  		return $this->hasMany('App\Branch', 'bank_id');
  	}

=======
  	protected $fillable = array('name', 'address', 'phone', 'email', 'bank_grade', 'contact_person', 'contact_person_no');
>>>>>>> 0cab9c056deb49ba004bc5696b4409fada0e5b36
}


