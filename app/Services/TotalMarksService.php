<?php

namespace App\Services;

use App\Models\MarksAcademic;
use App\Models\SubjectAcademicsDetail;

/*
|--------------------------------------------------------------------------
| Set Academics Subject Total Mark v1.1.0
|--------------------------------------------------------------------------
|
| Service class for set students academic subject total mark.
| Author:mdherwan@gmail.com
| Date: 13 Sept 2022.
|
*/

class TotalMarksService
{
    /**
     * @throws \Exception
     */
    public function handle(object $students): bool
    {
        foreach ($students as $student) {
            $bm = ($student->semester != 4) ? $this->create($student, 1) : $this->createBMSetara($student);
            $bi = $this->create($student, 2);
            $mt = $this->create($student, 3);
            $sn = $this->create($student, 4);
            $sj = ($student->semester != 4) ? $this->create($student, 5) : $this->createSJSetara($student);

            $collection = MarksAcademic::where('students_details_fk', $student->id)->where(
                'subject_academics_fk',
                '6'
            )->get('id');

            $agama = $collection->isEmpty() ? $this->create($student, 7) : $this->create($student, 6);
        }

        return true;
    }

    /**
     * @throws \Exception
     */
    private function create(object $student, int $subject): bool
    {
        $student->subject = $subject;

        match ($student->subject) {
            1, 2, 3, 5, 7 => $this->store1($student),
            4, 6 => $this->store2($student),
        };

        return true;
    }

    /**
     * @throws \Exception
     */
    private function store1(object $student): bool
    {
        $markB1 = $this->getMarkB1($student);
        $markA1 = $this->getMarkA1($student);

        if (($markB1[0]->mark_b1 != -1) || ($markA1[0]->mark_a1 != -1)) {
            $wajaran_berterusan = $this->getWajaranBerterusan($student);
            $wajaran_akhir = $this->getWajaranAkhir($student, 1);

            $twb = ceil(($markB1[0]->mark_b1 / 100) * $wajaran_berterusan[0]->continuous);
            $twa = ceil(($markA1[0]->mark_a1 / 100) * $wajaran_akhir[0]->final1);
            $totalMarks = $twb + $twa;

            MarksAcademic::where('students_details_fk', $student->id)->where(
                'subject_academics_fk',
                $student->subject
            )->update(['total_marks' => $totalMarks]);
        }

        if (($markB1[0]->mark_b1 == -1) || ($markA1[0]->mark_a1 == -1)) {
            $this->setTotalMarksNegative($student);
        }

        return true;
    }

    /**
     * @throws \Exception
     */
    private function store2(object $student): bool
    {
        $markB1 = $this->getMarkB1($student);
        $markA1 = $this->getMarkA1($student);
        $markA2 = $this->getMarkA2($student);
        $markA2 = ($student->subject == 4) ? $markA2[0]->mark_a2 ?? 0 : $markA2[0]->mark_a2;

        if (($markB1[0]->mark_b1 != -1) || ($markA1[0]->mark_a1 != -1) || ($markA2 != -1)) {
            $wajaran_berterusan = $this->getWajaranBerterusan($student);
            $wajaran_akhir = $this->getWajaranAkhir($student, 1);
            $wajaran_akhir2 = $this->getWajaranAkhir($student, 2);

            $twb = ceil(($markB1[0]->mark_b1 / 100) * $wajaran_berterusan[0]->continuous);
            $twa = ceil(($markA1[0]->mark_a1 / 100) * $wajaran_akhir[0]->final1);
            $twa2 = ceil(($markA2 / 100) * $wajaran_akhir2[0]->final2);
            $totalMarks = $twb + $twa + $twa2;

            MarksAcademic::where('students_details_fk', $student->id)->where(
                'subject_academics_fk',
                $student->subject
            )->update(['total_marks' => $totalMarks]);
        }

        if (($markB1[0]->mark_b1 == -1) || ($markA1[0]->mark_a1 == -1) || ($markA2 == -1)) {
            $this->setTotalMarksNegative($student);
        }

        return true;
    }

    private function createBMSetara(object $student): bool
    {
        // some code....
        return true;
    }

    private function createSJSetara(object $student): bool
    {
        // some code....
        return true;
    }

    /**
     * @throws \Exception
     */
    private function getMarkB1(object $student): object
    {
        $collection = MarksAcademic::where('students_details_fk', $student->id)->where(
            'subject_academics_fk',
            $student->subject
        )->get('mark_b1');

        if ($collection->isEmpty()) {
            throw new \Exception('Gred akademik tidak berjaya dijana. Tiada rekod markah berterusan 1.');
        }

        return $collection;
    }

    /**
     * @throws \Exception
     */
    private function getMarkA1(object $student): object
    {
        $collection = MarksAcademic::where('students_details_fk', $student->id)->where(
            'subject_academics_fk',
            $student->subject
        )->get('mark_a1');

        if ($collection->isEmpty()) {
            throw new \Exception('Gred akademik tidak berjaya dijana. Tiada rekod markah akhir 1.');
        }

        return $collection;
    }

    /**
     * @throws \Exception
     */
    private function getMarkA2(object $student): object
    {
        $collection = MarksAcademic::where('students_details_fk', $student->id)->where(
            'subject_academics_fk',
            $student->subject
        )->get('mark_a2');

        if ($collection->isEmpty()) {
            throw new \Exception('Gred akademik tidak berjaya dijana. Tiada rekod markah akhir 2.');
        }

        return $collection;
    }


    /**
     * @throws \Exception
     */
    private function setTotalMarksNegative(object $student): bool
    {
        $collection = MarksAcademic::where('students_details_fk', $student->id)
            ->where('subject_academics_fk', $student->subject)
            ->update(['total_marks' => -1]);

        if ($collection != true) {
            throw new \Exception('Gred akademik tidak berjaya dijana. Tiada rekod markah -1');
        }

        return true;
    }

    /**
     * @throws \Exception
     */
    private function getWajaranBerterusan(object $student): object
    {
        $collection = SubjectAcademicsDetail::where('year', $student->year)
            ->where('semester', $student->semester)
            ->where('subject_academics_fk', $student->subject)
            ->get('continuous');

        if ($collection->isEmpty()) {
            throw new \Exception('Gred akademik tidak berjaya dijana. Tiada rekod wajaran berterusan.');
        }

        return $collection;
    }

    /**
     * @throws \Exception
     */
    private function getWajaranAkhir(object $student, int $type): object
    {
        $final = ($type == 1) ? 'final1' : 'final2';

        $collection = SubjectAcademicsDetail::where('year', $student->year)
            ->where('semester', $student->semester)
            ->where('subject_academics_fk', $student->subject)
            ->get($final);

        if ($collection->isEmpty()) {
            throw new \Exception('Gred akademik tidak berjaya dijana. Tiada rekod wajaran akhir.');
        }

        return $collection;
    }
}
