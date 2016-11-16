<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customermember extends Model
{
    protected $table = 'customer_member';

    protected $fillable = array('parent_id', 'child_id');
}
