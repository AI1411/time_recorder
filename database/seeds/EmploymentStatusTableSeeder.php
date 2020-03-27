<?php

use Illuminate\Database\Seeder;

class EmploymentStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('employment_statuses')->delete();
        \DB::table('employment_statuses')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => '管理者',
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => '社員',
                ),
            2 =>
                array(
                    'id' => 3,
                    'name' => 'パート・アルバイト・契約社員',
                ),
        ));
    }
}
