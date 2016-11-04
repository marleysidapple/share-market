<?php 

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\Model;

class Pricepackage extends Model
{
	protected $table = 'price_package';

  	protected $fillable = array('package_id', 'primary_price', 'secondary_price', 'status');

  	// public function pricePackage(){
  		
  	// 	return Pricepackage::belongsTo('App\Packagesystem', 'package_id', 'id');
  	// }
}


