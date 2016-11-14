<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clienttype extends Model
{
    protected $table = 'client_type';

    protected $fillable = array('name', 'description', 'status');
}
