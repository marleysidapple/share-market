<?php

use Illuminate\Database\Seeder;
use DB;

class ZoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = 'app/developer_docs/countries.sql';
        DB::unprepared(file_get_contents($path));
    }
}
