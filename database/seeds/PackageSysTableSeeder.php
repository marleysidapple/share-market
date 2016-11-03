<?php

use Illuminate\Database\Seeder;
use App\Packagesystem;

class PackageSysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Packagesystem::create([
	        'name' => 'Test Package',
	        'description' => 'description test',
	        'service' => 'ipo'
	    ]);
    }
}
