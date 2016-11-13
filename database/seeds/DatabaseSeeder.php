<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        
        $this->call(BankTableSeeder::class);
        $this->call(BankBranchTableSeeder::class);
        $this->call(BankContactPersonTableSeeder::class);

        $this->call(BrokersTableSeeder::class);
        $this->call(RtsTableSeeder::class);

        $this->call(CompanyTableSeeder::class);
        $this->call(CompanyTypeTableSeeder::class);

        $this->call(DpTableSeeder::class);

        $this->call(PackageSysTableSeeder::class);
        $this->call(PricepackTableSeeder::class);
        $this->call(ServicePackageTableSeeder::class);

        
       
    }
}
