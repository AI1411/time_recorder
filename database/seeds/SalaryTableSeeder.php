<?php

use App\Models\Salary;
use Illuminate\Database\Seeder;

class SalaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Salary::class, 100)->create();
    }
}
