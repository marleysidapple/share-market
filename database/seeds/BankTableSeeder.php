<?php

use Illuminate\Database\Seeder;
use App\Bank;

class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bank::create([
	        'name' => 'Bank1',
	        'address' => 'Kupandol',
	        'phone' => '1234456789',
	        'bank_grade'	=> 'A',
	        'contact_person'	=> 'someone',
	        'contact_person_no'	=> '9874546512'
	    ]);
    }
}
