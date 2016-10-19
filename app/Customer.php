<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';


    protected $fillable = array('user_id', 'gender', 'dateofbirth', 'mobile', 'photo', 'status');


    public function userdetail()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function bank()
    {
        return $this->hasMany('App\CustomerBank');
    }
}
