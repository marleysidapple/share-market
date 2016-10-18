<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customerdmat extends Model
{
    protected $table = 'customer_dmat';

    protected $fillable = array('customer_id', 'registrar_type', 'registrar_agent_id', 'accountnumber');
}
