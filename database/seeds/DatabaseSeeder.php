<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StoreTableSeeder::class);
        $this->call(PrefTableSeeder::class);
        $this->call(RegionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SalaryTableSeeder::class);
        $this->call(EmploymentStatusTableSeeder::class);
        $this->call(CostTableSeeder::class);
    }
}
