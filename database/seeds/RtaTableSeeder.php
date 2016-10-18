<?php

use Illuminate\Database\Seeder;
use App\Rta;

class RtaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rta::create([
          'name'  => 'rta name',
          'email' => 'rt@email.com',
          'phone' => '984574578',
          'contact_person' => 'someone',
          'contact_person_no' => '123456789',
          'remarks' => 'this is rta management module'
          
      ]);
    }
}
