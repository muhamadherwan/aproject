<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\SubjectAcademic;

class SubjectAcademicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $SubjectAcademic = SubjectAcademic::create(
            [
                'name' => 'BAHASA MELAYU',
                'name_short' => 'BM',
                'created_by' => '1'
            ]
        );
        $SubjectAcademic = SubjectAcademic::create(
            [
                'name' => 'BAHASA INGGERIS',
                'name_short' => 'BI',
                'created_by' => '1'
            ]
        );
        $SubjectAcademic = SubjectAcademic::create(
            [
                'name' => 'SAINS',
                'name_short' => 'SN',
                'created_by' => '1'
            ]
        );
        $SubjectAcademic = SubjectAcademic::create(
            [
                'name' => 'SEJARAH',
                'name_short' => 'SJ',
                'created_by' => '1'
            ]
        );
        $SubjectAcademic = SubjectAcademic::create(
            [
                'name' => 'MATEMATIK',
                'name_short' => 'MT',
                'created_by' => '1'
            ]
        );
        $SubjectAcademic = SubjectAcademic::create(
            [
                'name' => 'PENDIDIKAN ISLAM',
                'name_short' => 'PI',
                'created_by' => '1'
            ]
        );
        $SubjectAcademic = SubjectAcademic::create(
            [
                'name' => 'PENDIDIKAN MORAL',
                'name_short' => 'PM',
                'created_by' => '1'
            ]
        );
    }
}
