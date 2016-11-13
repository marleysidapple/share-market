<?php

use Illuminate\Database\Seeder;
use App\Broker;

class BrokersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Broker::create([
          'name'  => 'first broker',
          'address' => 'kupandol',
          'broker_no' => '123456',
          'email' => 'borker@gmail.com',
          'phone' => '9874547854',
          'contact_person' => 'person',
          'contact_person_no' => '9874541256'
      ]);
    }
}