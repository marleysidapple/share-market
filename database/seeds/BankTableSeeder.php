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
            'email' => 'nepalmer@gmail.com',
	        'phone' => '01437928',
	        'bank_grade'	=> 'A'
	    ]);

        Bank::create([
            'name' => 'Nepal SBI Bank',
            'address' => 'Hattisar, Kathmandu',
            'email' => 'nepalsbi@mail.com',
            'phone' => '01432324',
            'bank_grade'    => 'A'
        ]);

         Bank::create([
            'name' => 'Laxmi Bank',
            'address' => 'Hattisar, Kathmandu',
            'email' => 'laxmi@mail.com',
            'phone' => '01432532',
            'bank_grade'    => 'A'
        ]);
    }
}
