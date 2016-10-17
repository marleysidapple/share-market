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
	        'address' => 'Nagpokhari, Kathmanduu',
	        'phone' => '014392183',
	        'contact_person'	=> 'Pratik Deshar',
	        'contact_person_no'	=> '984983745'
	    ]);

        Branch::create([
            'bank_id' => '1',
            'address' => 'Newroad, Kathmanduu',
            'phone' => '01454381',
            'contact_person'    => 'Dinesh Regmi',
            'contact_person_no' => '983098485'
        ]);

        Branch::create([
            'bank_id' => '2',
            'address' => 'Tangal, Kathmanduu',
            'phone' => '01763987',
            'contact_person'    => 'Pusp Joshi',
            'contact_person_no' => '9849837453'
        ]);


        Branch::create([
            'bank_id' => '2',
            'address' => 'Maharajgunj, Kathmanduu',
            'phone' => '014732647',
            'contact_person'    => 'Vishal Thapa',
            'contact_person_no' => '980384505'
        ]);

        Branch::create([
            'bank_id' => '3',
            'address' => 'Panipokhari, Kathmanduu',
            'phone' => '014392183',
            'contact_person'    => 'Sishir Khadka',
            'contact_person_no' => '984983745'
        ]);
    }
}
