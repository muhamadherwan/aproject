<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConfigStatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('config_statuses')->delete();
        
        \DB::table('config_statuses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parameter' => 'AKTIF',
                'description' => NULL,
                'index' => 1,
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'parameter' => 'TIDAK AKTIF',
                'description' => NULL,
                'index' => 2,
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'parameter' => 'TANGGUH',
                'description' => NULL,
                'index' => 3,
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            3 => 
            array (
                'id' => 4,
                'parameter' => 'TAHAN KEPUTUSAN',
                'description' => NULL,
                'index' => 4,
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2022-01-01 00:00:00',
            ),
        ));
        
        
    }
}