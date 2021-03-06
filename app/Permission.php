<?php namespace App;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
	//protected $table = 'permissions';

	protected $fillable = array('name', 'display_name', 'description');



	public function perms()
	{
		return $this->belongsToMany('App\Role', 'permission_role');
	}
}
