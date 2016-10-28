<?php

use Illuminate\Database\Seeder;

class ServicePackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Servicepackage::create([
	        'service_name' => 'Right Share'
	    ]);
    }
}
