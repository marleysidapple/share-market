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
	        'address' => 'Kupandol2',
	        'phone' => '1234456789',
	        'contact_person'	=> 'someone',
	        'contact_person_no'	=> '9874546512'
	    ]);
    }
}
