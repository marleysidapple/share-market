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
	        'name' => 'Nepal Merchant Bank',
	        'address' => 'Babarmahal,Kathmandu',
	        'phone' => '014839984',
	        'bank_grade'	=> 'A',
	        'contact_person'	=> 'Sirish Luitel',
	        'contact_person_no'	=> '9874546512'
	    ]);

         Bank::create([
            'name' => 'Nabil Bank Ltd.',
            'address' => 'Kamaladi,Kathmandu',
            'phone' => '014439384',
            'bank_grade'    => 'A',
            'contact_person'    => 'Harihar Bastola',
            'contact_person_no' => '98511928340'
        ]);

          Bank::create([
            'name' => 'NIC Asia Bank',
            'address' => 'Kamaladi,Kathmandu',
            'phone' => '014938984',
            'bank_grade'    => 'A',
            'contact_person'    => 'Rama Shrestha',
            'contact_person_no' => '9808393843'
        ]);
    }
}
