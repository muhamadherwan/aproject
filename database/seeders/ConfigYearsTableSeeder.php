<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConfigYearsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('config_years')->delete();
        
        \DB::table('config_years')->insert(array (
            0 => 
            array (
                'created_at' => '2022-01-01 00:00:00',
                'description' => NULL,
                'id' => 1,
                'index' => NULL,
                'parameter' => '2017',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            1 => 
            array (
                'created_at' => '2022-01-01 00:00:00',
                'description' => NULL,
                'id' => 2,
                'index' => NULL,
                'parameter' => '2018',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            2 => 
            array (
                'created_at' => '2022-01-01 00:00:00',
                'description' => NULL,
                'id' => 3,
                'index' => NULL,
                'parameter' => '2019',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            3 => 
            array (
                'created_at' => '2022-01-01 00:00:00',
                'description' => NULL,
                'id' => 4,
                'index' => NULL,
                'parameter' => '2020',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            4 => 
            array (
                'created_at' => '2022-01-01 00:00:00',
                'description' => NULL,
                'id' => 5,
                'index' => NULL,
                'parameter' => '2021',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            5 => 
            array (
                'created_at' => '2022-01-01 00:00:00',
                'description' => NULL,
                'id' => 6,
                'index' => NULL,
                'parameter' => '2022',
                'updated_at' => '2022-01-01 00:00:00',
            ),
        ));
        
        
    }
}