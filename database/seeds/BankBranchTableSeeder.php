<?php

use Illuminate\Database\Seeder;
use App\Branch;

class BankBranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Branch::create([
	        'bank_id' => '1',
	        'address' => 'Nagpokhari, Kathmandu',
	        'phone' => '014928984',
	        'contact_person'	=> 'Asish Lama',
	        'contact_person_no'	=> '9851039843'
	    ]);
    }
}
