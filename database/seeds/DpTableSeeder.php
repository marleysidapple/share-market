<?php

use Illuminate\Database\Seeder;
use App\Dptable;

class DpTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dptable::create([
	        'name' => 'dp one',
	        'dp_id' => '1',
	        'address' => 'Kupandol',
	        'phone'	=> '9845474556'
	    ]);
    }
}
