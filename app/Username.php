<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Username extends Model
{
    protected $table = 'username_setting';

    protected $fillable = array('prefix', 'year');
}
