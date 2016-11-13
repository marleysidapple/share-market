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
            'address' => 'Newroad, Kathmanduu',
            'email' => 'dinesh@gmail.com',
            'phone' => '01454381'
        ]);

        Branch::create([
            'bank_id' => '1',
            'address' => 'Tinkune, Kathmanduu',
            'email' => 'roshan@gmail.com',
            'phone' => '01454548'
        ]);

        Branch::create([
            'bank_id' => '2',
            'address' => 'Tangal, Kathmanduu',
            'email' => 'pushjoshi@gmail.com',
            'phone' => '01763987'
        ]);


        Branch::create([
            'bank_id' => '2',
            'address' => 'Maharajgunj, Kathmanduu',
            'email' => 'vishalthapa@gmail.com',
            'phone' => '014732647'
        ]);

        Branch::create([
            'bank_id' => '3',
            'address' => 'Panipokhari, Kathmanduu',
            'email' => 'sishir@gmail.com',
            'phone' => '014392183'
        ]);
    }
}
