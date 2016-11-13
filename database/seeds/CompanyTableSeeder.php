<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
	        'company_name' => 'company one',
	        'company_type_id' => '1',
	        'company_ticker' => 'CO',
	        'rts_id'	=> '1'
	    ]);
    }
}