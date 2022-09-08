<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConfigCollegesTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('config_colleges_types')->delete();
        
        \DB::table('config_colleges_types')->insert(array (
            0 => 
            array (
                'created_at' => '2022-01-01 00:00:00',
                'description' => NULL,
                'id' => 1,
                'index' => 1,
                'parameter' => 'KPM',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            1 => 
            array (
                'created_at' => '2022-01-01 00:00:00',
                'description' => NULL,
                'id' => 2,
                'index' => 2,
                'parameter' => 'ILKA',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            2 => 
            array (
                'created_at' => '2022-01-01 00:00:00',
                'description' => NULL,
                'id' => 3,
                'index' => 3,
                'parameter' => 'ILKS',
                'updated_at' => '2022-01-01 00:00:00',
            ),
        ));
        
        
    }
}