<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConfigSessionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('config_sessions')->delete();
        
        \DB::table('config_sessions')->insert(array (
            0 => 
            array (
                'created_at' => '2022-01-01 00:00:00',
                'description' => NULL,
                'id' => 1,
                'index' => NULL,
                'parameter' => '1',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            1 => 
            array (
                'created_at' => '2022-01-01 00:00:00',
                'description' => NULL,
                'id' => 2,
                'index' => NULL,
                'parameter' => '2',
                'updated_at' => '2022-01-01 00:00:00',
            ),
        ));
        
        
    }
}