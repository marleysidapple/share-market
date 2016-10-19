<?php 

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\Model;

class Broker extends Model
{
	protected $table = 'brokers';

  	protected $fillable = array('name', 'address', 'broker_no', 'phone', 'contact_person', 'contact_person_no');

}


