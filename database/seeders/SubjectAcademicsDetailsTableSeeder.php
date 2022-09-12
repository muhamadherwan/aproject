<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubjectAcademicsDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('subject_academics_details')->delete();

        \DB::table('subject_academics_details')->insert(array (
            0 =>
            array (
                'code' => 'A01100',
                'continuous' => 30,
                'created_at' => '2022-01-01 00:00:00',
                'created_by' => 1,
                'credit_hour' => 3,
                'final1' => 70,
                'final2' => 0,
                'id' => 1,
                'semester' => 1,
                'subject_academics_fk' => 1,
                'updated_at' => '2022-01-01 00:00:00',
                'year' => 2020,
                'year_exam' => 2020,
            ),
            1 =>
            array (
                'code' => 'A02100',
                'continuous' => 30,
                'created_at' => '2022-01-01 00:00:00',
                'created_by' => 1,
                'credit_hour' => 1,
                'final1' => 70,
                'final2' => 0,
                'id' => 2,
                'semester' => 1,
                'subject_academics_fk' => 2,
                'updated_at' => '2022-01-01 00:00:00',
                'year' => 2020,
                'year_exam' => 2020,
            ),
            2 =>
            array (
                'code' => 'A03100',
                'continuous' => 30,
                'created_at' => '2022-01-01 00:00:00',
                'created_by' => 1,
                'credit_hour' => 1,
                'final1' => 70,
                'final2' => 0,
                'id' => 3,
                'semester' => 1,
                'subject_academics_fk' => 3,
                'updated_at' => '2022-01-01 00:00:00',
                'year' => 2020,
                'year_exam' => 2020,
            ),
            3 =>
            array (
                'code' => 'A04100',
                'continuous' => 30,
                'created_at' => '2022-01-01 00:00:00',
                'created_by' => 1,
                'credit_hour' => 1,
                'final1' => 50,
                'final2' => 20,
                'id' => 4,
                'semester' => 1,
                'subject_academics_fk' => 4,
                'updated_at' => '2022-01-01 00:00:00',
                'year' => 2020,
                'year_exam' => 2020,
            ),
            4 =>
            array (
                'code' => 'A05100',
                'continuous' => 30,
                'created_at' => '2022-01-01 00:00:00',
                'created_by' => 1,
                'credit_hour' => 1,
                'final1' => 70,
                'final2' => 0,
                'id' => 5,
                'semester' => 1,
                'subject_academics_fk' => 5,
                'updated_at' => '2022-01-01 00:00:00',
                'year' => 2020,
                'year_exam' => 2020,
            ),
            5 =>
            array (
                'code' => 'A06100',
                'continuous' => 30,
                'created_at' => '2022-01-01 00:00:00',
                'created_by' => 1,
                'credit_hour' => 1,
                'final1' => 50,
                'final2' => 20,
                'id' => 6,
                'semester' => 1,
                'subject_academics_fk' => 6,
                'updated_at' => '2022-01-01 00:00:00',
                'year' => 2020,
                'year_exam' => 2020,
            ),
            6 =>
            array (
                'code' => 'A07100',
                'continuous' => 30,
                'created_at' => '2022-01-01 00:00:00',
                'created_by' => 1,
                'credit_hour' => 1,
                'final1' => 70,
                'final2' => 0,
                'id' => 7,
                'semester' => 1,
                'subject_academics_fk' => 7,
                'updated_at' => '2022-01-01 00:00:00',
                'year' => 2020,
                'year_exam' => 2020,
            ),
        ));


    }
}
