<?php

namespace App\Services;

use App\Models\MarksAcademic;
use App\Models\SubjectAcademicsDetail;

class TotalMarksService
{
    /**
     * @throws \Exception
     */
    public function handle($students)
    {
        foreach ($students as $student)
        {
            $bm = ($student->semester != 4) ? $this->store($student, 1) : $this->storeBMSetara($student);
        }

        return true;
    }

    /**
     * @param object $student
     * @param int $subject
     * @throws \Exception
     */
    private function store(object $student, int $subject)
    {
        $student->subject = $subject;
        switch ($student->subject) {
            case 1:
            case 2:
            case 3:
            case 5:
            case 7:
                $markB1 = MarksAcademic::where('students_details_fk', $student->id)->where(
                    'subject_academics_fk',
                    $student->subject
                )->get('mark_b1');
                if ($markB1->count() == 0) {
                    throw new \Exception('Gred akademik tidak berjaya dijana. Tiada rekod markah berterusan 1.');
                }
//            print $markB1[0]->mark_b1;exit;

                $markA1 = MarksAcademic::where('students_details_fk', $student->id)->where(
                    'subject_academics_fk',
                    $student->subject
                )->get('mark_a1');
                if ($markB1->count() == 0) {
                    throw new \Exception('Gred akademik tidak berjaya dijana. Tiada rekod markah akhir 1.');
                }
//            print $markA1[0]->mark_a1;exit;

//                $markB1[0]->mark_b1 = -1;
                if (($markB1[0]->mark_b1 == -1) || ($markA1[0]->mark_a1 == -1)) {
                    $value = $this->setTotalMarksNegative($student);
                } else {
                    $wajaran_berterusan = $this->getWajaranBerterusan($student);
                    if ($markB1->count() == 0) {
                        throw new \Exception('Gred akademik tidak berjaya dijana. Tiada rekod wajaran berterusan.');
                    }

                    $wajaran_akhir = $this->getWajaranAkhir($student, 1);
                    if ($markB1->count() == 0) {
                        throw new \Exception('Gred akademik tidak berjaya dijana. Tiada rekod wajaran akhir.');
                    }

                    $twb = ceil(($markB1[0]->mark_b1 / 100) * $wajaran_berterusan[0]->continuous);
                    $twa = ceil(($markA1[0]->mark_a1 / 100) * $wajaran_akhir[0]->final1);
                    $totalMarks = $twb + $twa;

                    $value = MarksAcademic::where('students_details_fk', $student->id)->where(
                        'subject_academics_fk',
                        $student->subject
                    )->update(['total_marks' => $totalMarks]);
                }
        }
        return $value;
    }

    private function storeBMSetara(object $student): bool
    {
        // some code....
        return true;
    }

    private function setTotalMarksNegative(object $student) :bool
    {
        return MarksAcademic::where('students_details_fk', $student->id)
            ->where('subject_academics_fk', $student->subject)
            ->update(['total_marks' => -1]);
    }

    private function getWajaranBerterusan(object $student) :object
    {
        return SubjectAcademicsDetail::where('year', $student->year)
            ->where('semester', $student->semester)
            ->where('subject_academics_fk', $student->subject)
            ->get('continuous');
    }

    private function getWajaranAkhir(object $student, int $type) :object
    {
        $final = ($type == 1) ? 'final1' : 'final2';

        return SubjectAcademicsDetail::where('year', $student->year)
            ->where('semester', $student->semester)
            ->where('subject_academics_fk', $student->subject)
            ->get($final);
    }


}
