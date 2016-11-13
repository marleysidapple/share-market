<?php

use Illuminate\Database\Seeder;
use App\Servicepackage;

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

        Servicepackage::create([
            'service_name' => 'Dematerialization'
        ]);
    }
}
