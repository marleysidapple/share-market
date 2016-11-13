<?php

use Illuminate\Database\Seeder;
use App\Companytype;

class CompanyTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Companytype::create([
	        'type' => 'finance',
	    ]);

        Companytype::create([
            'type' => 'bank',
        ]);
    }
}
