<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConfigGradeModulesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('config_grade_modules')->delete();
        
        \DB::table('config_grade_modules')->insert(array (
            0 => 
            array (
                'id' => 1,
                'mark_from' => -1,
                'mark_to' => -1,
                'grade' => 'T',
                'pointer' => 0.0,
                'status' => 'TH',
                'competency' => 'TH',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'mark_from' => 0,
                'mark_to' => 34,
                'grade' => 'E',
                'pointer' => 0.0,
                'status' => 'GAGAL',
                'competency' => 'BELUM KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'mark_from' => 35,
                'mark_to' => 39,
                'grade' => 'D-',
                'pointer' => 1.0,
                'status' => 'GAGAL',
                'competency' => 'BELUM KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            3 => 
            array (
                'id' => 4,
                'mark_from' => 40,
                'mark_to' => 44,
                'grade' => 'D',
                'pointer' => 1.33,
                'status' => 'GAGAL',
                'competency' => 'BELUM KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            4 => 
            array (
                'id' => 5,
                'mark_from' => 45,
                'mark_to' => 49,
                'grade' => 'D+',
                'pointer' => 1.67,
                'status' => 'GAGAL',
                'competency' => 'BELUM KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            5 => 
            array (
                'id' => 6,
                'mark_from' => 50,
                'mark_to' => 54,
                'grade' => 'C',
                'pointer' => 2.0,
                'status' => 'LULUS',
                'competency' => 'BELUM KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            6 => 
            array (
                'id' => 7,
                'mark_from' => 55,
                'mark_to' => 59,
                'grade' => 'C+',
                'pointer' => 2.33,
                'status' => 'LULUS',
                'competency' => 'BELUM KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            7 => 
            array (
                'id' => 8,
                'mark_from' => 60,
                'mark_to' => 64,
                'grade' => 'B-',
                'pointer' => 2.67,
                'status' => 'KEPUJIAN',
                'competency' => 'KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            8 => 
            array (
                'id' => 9,
                'mark_from' => 65,
                'mark_to' => 69,
                'grade' => 'B',
                'pointer' => 3.0,
                'status' => 'KEPUJIAN',
                'competency' => 'KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            9 => 
            array (
                'id' => 10,
                'mark_from' => 70,
                'mark_to' => 79,
                'grade' => 'B+',
                'pointer' => 3.33,
                'status' => 'KEPUJIAN',
                'competency' => 'KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            10 => 
            array (
                'id' => 11,
                'mark_from' => 80,
                'mark_to' => 89,
                'grade' => 'A-',
                'pointer' => 3.67,
                'status' => 'CEMERLANG',
                'competency' => 'KOMPETEN BAIK',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            11 => 
            array (
                'id' => 12,
                'mark_from' => 90,
                'mark_to' => 100,
                'grade' => 'A',
                'pointer' => 4.0,
                'status' => 'CEMERLANG',
                'competency' => 'KOMPETEN CEMERLANG',
                'created_at' => '2022-01-01 00:00:00',
                'updated_at' => '2022-01-01 00:00:00',
            ),
        ));
        
        
    }
}