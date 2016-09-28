<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Role::create([
        'name' => 'superadmin',
        'display_name' => 'Super Administrator',
        'description' => 'Handles other user of the system'
      ]);

      Role::create([
        'name' => 'admin',
        'display_name' => 'Administrator',
        'description' => 'Handles other user of the system'
      ]);

      Role::create([
        'name' => 'user',
        'display_name' => 'General User',
        'description' => 'Uses the system'
      ]);
    }
}
