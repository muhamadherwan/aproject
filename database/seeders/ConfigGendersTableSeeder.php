<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConfigGendersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('config_genders')->delete();
        
        \DB::table('config_genders')->insert(array (
            0 => 
            array (
                'created_at' => '2022-01-01 00:00:00',
                'description' => NULL,
                'id' => 1,
                'index' => 1,
                'parameter' => 'LELAKI',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            1 => 
            array (
                'created_at' => '2022-01-01 00:00:00',
                'description' => NULL,
                'id' => 2,
                'index' => 2,
                'parameter' => 'PEREMPUAN',
                'updated_at' => '2022-01-01 00:00:00',
            ),
        ));
        
        
    }
}