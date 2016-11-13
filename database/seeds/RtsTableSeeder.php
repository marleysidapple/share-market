<?php

use Illuminate\Database\Seeder;
use App\Rts;

class RtsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rts::create([
          'name'  => 'rts test name',
          'email' => 'rts@email.com',
          'phone' => '984574578',
          'contact_person' => 'someone',
          'contact_person_no' => '123456789',
          'remarks' => 'this is rts management module'
          
      ]);
    }
}
