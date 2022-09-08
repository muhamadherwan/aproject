<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConfigRacesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('config_races')->delete();
        
        \DB::table('config_races')->insert(array (
            0 => 
            array (
                'created_at' => '2022-01-01 00:00:00',
                'description' => NULL,
                'id' => 1,
                'index' => 1,
                'parameter' => 'MELAYU',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            1 => 
            array (
                'created_at' => '2022-01-01 00:00:00',
                'description' => NULL,
                'id' => 2,
                'index' => 2,
                'parameter' => 'CINA',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            2 => 
            array (
                'created_at' => '2022-01-01 00:00:00',
                'description' => NULL,
                'id' => 3,
                'index' => 3,
                'parameter' => 'INDIA',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            3 => 
            array (
                'created_at' => '2022-01-01 00:00:00',
                'description' => NULL,
                'id' => 4,
                'index' => 99,
                'parameter' => 'LAIN-LAIN',
                'updated_at' => '2022-01-01 00:00:00',
            ),
        ));
        
        
    }
}