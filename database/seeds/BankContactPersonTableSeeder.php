<?php

use Illuminate\Database\Seeder;
use App\BankContactPerson;

class BankContactPersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
        BankContactPerson::create([
            'bank_id' => '1',
            'branch_id' => '1',
            'name' => 'Rakesh Shrestha',
            'designation' => '1 cp designation',
            'email' => 'test@gmail.com',
            'contact' => '01454381'
        ]);

        BankContactPerson::create([
            'bank_id' => '1',
            'branch_id' => '2',
            'name' => 'Baman Shrestha',
            'designation' => '1 cp designation',
            'email' => 'test@gmail.com',
            'contact' => '01454768'
        ]);

    }
}
