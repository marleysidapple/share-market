<?php

use Illuminate\Database\Seeder;
use App\Pricepackage;

class PricepackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pricepackage::create([
	        'package_id' => '1',
	        'primary_price' => '1000',
	        'secondary_price' => '800',
	        'status'	=> 'active'
	    ]);
    }
}
