<?php

use Illuminate\Database\Seeder;

class CostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('costs')->delete();
        \DB::table('costs')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => '交通費',
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => '修繕費',
                ),
            2 =>
                array(
                    'id' => 3,
                    'name' => '交際費',
                ),
            3 =>
                array(
                    'id' => 4,
                    'name' => '消耗品費',
                ),
            4 =>
                array(
                    'id' => 5,
                    'name' => '雑費',
                ),
        ));
    }
}
