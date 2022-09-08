<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConfigGradeAcademicsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('config_grade_academics')->delete();
        
        \DB::table('config_grade_academics')->insert(array (
            0 => 
            array (
                'competency' => 'TH',
                'created_at' => '2022-01-01 00:00:00',
                'grade' => 'T',
                'id' => 1,
                'mark_from' => -1,
                'mark_to' => -1,
                'pointer' => 0.0,
                'status' => 'T',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            1 => 
            array (
                'competency' => 'BELUM KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'grade' => 'E',
                'id' => 2,
                'mark_from' => 0,
                'mark_to' => 34,
                'pointer' => 0.0,
                'status' => 'GAGAL',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            2 => 
            array (
                'competency' => 'BELUM KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'grade' => 'D-',
                'id' => 3,
                'mark_from' => 35,
                'mark_to' => 39,
                'pointer' => 1.0,
                'status' => 'GAGAL',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            3 => 
            array (
                'competency' => 'BELUM KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'grade' => 'D',
                'id' => 4,
                'mark_from' => 40,
                'mark_to' => 44,
                'pointer' => 1.33,
                'status' => 'GAGAL',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            4 => 
            array (
                'competency' => 'BELUM KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'grade' => 'D+',
                'id' => 5,
                'mark_from' => 45,
                'mark_to' => 49,
                'pointer' => 1.67,
                'status' => 'GAGAL',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            5 => 
            array (
                'competency' => 'BELUM KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'grade' => 'C',
                'id' => 6,
                'mark_from' => 50,
                'mark_to' => 54,
                'pointer' => 2.0,
                'status' => 'LULUS',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            6 => 
            array (
                'competency' => 'BELUM KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'grade' => 'C+',
                'id' => 7,
                'mark_from' => 55,
                'mark_to' => 59,
                'pointer' => 2.33,
                'status' => 'LULUS',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            7 => 
            array (
                'competency' => 'KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'grade' => 'B-',
                'id' => 8,
                'mark_from' => 60,
                'mark_to' => 64,
                'pointer' => 2.67,
                'status' => 'KEPUJIAN',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            8 => 
            array (
                'competency' => 'KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'grade' => 'B',
                'id' => 9,
                'mark_from' => 65,
                'mark_to' => 69,
                'pointer' => 3.0,
                'status' => 'KEPUJIAN',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            9 => 
            array (
                'competency' => 'KOMPETEN',
                'created_at' => '2022-01-01 00:00:00',
                'grade' => 'B+',
                'id' => 10,
                'mark_from' => 70,
                'mark_to' => 79,
                'pointer' => 3.33,
                'status' => 'KEPUJIAN',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            10 => 
            array (
                'competency' => 'KOMPETEN BAIK',
                'created_at' => '2022-01-01 00:00:00',
                'grade' => 'A-',
                'id' => 11,
                'mark_from' => 80,
                'mark_to' => 89,
                'pointer' => 3.67,
                'status' => 'CEMERLANG',
                'updated_at' => '2022-01-01 00:00:00',
            ),
            11 => 
            array (
                'competency' => 'KOMPETEN CEMERLANG',
                'created_at' => '2022-01-01 00:00:00',
                'grade' => 'A',
                'id' => 12,
                'mark_from' => 90,
                'mark_to' => 100,
                'pointer' => 4.0,
                'status' => 'CEMERLANG',
                'updated_at' => '2022-01-01 00:00:00',
            ),
        ));
        
        
    }
}