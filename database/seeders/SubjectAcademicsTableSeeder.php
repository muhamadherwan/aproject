<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubjectAcademicsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('subject_academics')->delete();
        
        \DB::table('subject_academics')->insert(array (
            0 => 
            array (
                'created_at' => '2022-01-01 00:00:00',
                'created_by' => 1,
                'id' => 1,
                'name' => 'BAHASA MELAYU',
                'name_short' => 'BM',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            1 => 
            array (
                'created_at' => '2022-01-01 00:00:00',
                'created_by' => 1,
                'id' => 2,
                'name' => 'BAHASA INGGERIS',
                'name_short' => 'BI',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            2 => 
            array (
                'created_at' => '2022-01-01 00:00:00',
                'created_by' => 1,
                'id' => 3,
                'name' => 'MATEMATIK',
                'name_short' => 'MT',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            3 => 
            array (
                'created_at' => '2022-01-01 00:00:00',
                'created_by' => 1,
                'id' => 4,
                'name' => 'SAINS',
                'name_short' => 'SN',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            4 => 
            array (
                'created_at' => '2022-01-01 00:00:00',
                'created_by' => 1,
                'id' => 5,
                'name' => 'SEJARAH',
                'name_short' => 'SJ',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            5 => 
            array (
                'created_at' => '2022-01-01 00:00:00',
                'created_by' => 1,
                'id' => 6,
                'name' => 'PENDIDIKAN ISLAM',
                'name_short' => 'PI',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            6 => 
            array (
                'created_at' => '2022-01-01 00:00:00',
                'created_by' => 1,
                'id' => 7,
                'name' => 'PENDIDIKAN MORAL',
                'name_short' => 'PM',
                'updated_at' => '2022-01-01 00:00:00',
            ),
        ));
        
        
    }
}