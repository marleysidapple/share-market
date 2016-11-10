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
	        'name' => 'dp test',
	        'dp_code' => '123456$%',
            'email' => 'test@gmail.com',
	        'address' => 'Kupandol',
	        'phone'	=> '9845474556'
	    ]);
    }
}
