<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConfigGradeVocationalsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('config_grade_vocationals')->delete();
        
        \DB::table('config_grade_vocationals')->insert(array (
            0 => 
            array (
                'id' => 1,
                'year' => 2020,
                'semester' => 1,
                'mark_from' => -1,
                'mark_to' => -1,
                'grade' => 'T',
                'status' => 'TH',
                'competency' => 'BELUM KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'year' => 2020,
                'semester' => 1,
                'mark_from' => 0,
                'mark_to' => 59,
                'grade' => 'G',
                'status' => 'GAGAL',
                'competency' => 'BELUM KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'year' => 2020,
                'semester' => 1,
                'mark_from' => 60,
                'mark_to' => 70,
                'grade' => 'B',
                'status' => 'KEPUJIAN TINGGI',
                'competency' => 'KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            3 => 
            array (
                'id' => 4,
                'year' => 2020,
                'semester' => 1,
                'mark_from' => 71,
                'mark_to' => 79,
                'grade' => 'B+',
                'status' => 'KEPUJIAN TERTINGGI',
                'competency' => 'KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            4 => 
            array (
                'id' => 5,
                'year' => 2020,
                'semester' => 1,
                'mark_from' => 80,
                'mark_to' => 89,
                'grade' => 'A-',
                'status' => 'CEMERLANG',
                'competency' => 'KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            5 => 
            array (
                'id' => 6,
                'year' => 2020,
                'semester' => 1,
                'mark_from' => 90,
                'mark_to' => 97,
                'grade' => 'A',
                'status' => 'CEMERLANG TINGGI',
                'competency' => 'KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            6 => 
            array (
                'id' => 7,
                'year' => 2020,
                'semester' => 1,
                'mark_from' => 98,
                'mark_to' => 100,
                'grade' => 'A+',
                'status' => 'CEMERLANG TERTINGGI',
                'competency' => 'KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2022-01-01 00:00:00',
            ),
        ));
        
        
    }
}