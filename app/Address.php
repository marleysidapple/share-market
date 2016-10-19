<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'customer_address';

    protected $fillable = array('customer_id', 'zone_id', 'district_id', 'vdc_municipality', 'ward', 'houseno', 'tel', 'tzone_id', 'tdistrict_id', 'tvdc_municipality', 'tward', 'thouseno', 'ttole', 'ttel');
}
