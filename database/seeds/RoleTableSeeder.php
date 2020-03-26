<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        DB::table('roles')->insert([
            0 => [
                'name' => '管理者'
            ],
            1 => [
                'name' => '社員'
            ],
            2 => [
                'name' => 'パート・アルバイト'
            ],
            3 => [
                'name' => '契約社員'
            ]
        ]);
    }
}
