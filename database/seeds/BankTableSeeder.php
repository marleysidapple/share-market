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
	        'address' => 'BabarMahal, Kathmandu',
	        'phone' => '01437928',
	        'bank_grade'	=> 'A',
	        'contact_person'	=> 'Suden Balami',
	        'contact_person_no'	=> '9874546512'
	    ]);

        Bank::create([
            'name' => 'Nepal SBI Bank',
            'address' => 'Hattisar, Kathmandu',
            'phone' => '01432324',
            'bank_grade'    => 'A',
            'contact_person'    => 'Rabin Shrestha',
            'contact_person_no' => '9874546423'
        ]);

         Bank::create([
            'name' => 'Laxmi Bank',
            'address' => 'Hattisar, Kathmandu',
            'phone' => '01432532',
            'bank_grade'    => 'A',
            'contact_person'    => 'Pradeep Bista',
            'contact_person_no' => '987409332'
        ]);
    }
}
