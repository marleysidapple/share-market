<?php 

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\Model;

class Packagesystem extends Model
{
	protected $table = 'package_system';

  	protected $fillable = array('name', 'description', 'service');

  	public function packagePrice(){
  		return Packagesystem::hasMany('App\Pricepackage', 'package_id', 'id');
  	}
}


