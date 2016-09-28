<?php namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
  protected $fillable = array('name', 'display_name', 'description');

   public function roles()
   {
        return $this->belongsToMany('App\Permission');
   }
}
