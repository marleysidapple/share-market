<?php 

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table = 'company';

  	protected $fillable = array('company_name', 'company_type_id', 'company_ticker', 'rts_id');

  	public function companyComtype(){
  		return Company::belongsTo('App\Companytype', 'company_type_id', 'id');
  	}

  	public function companyRta(){
  		return Company::belongsTo('App\Rts', 'rts_id', 'id');
  	}

}


