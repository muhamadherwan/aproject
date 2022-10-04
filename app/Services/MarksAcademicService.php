<?php

namespace App\Services;

use App\Jobs\ProcessMarksAcademic;
use App\Models\MarksAcademic;
use App\Models\StudentsDetail;
use App\Models\SubjectAcademicsDetail;
use Exception;
use Illuminate\Support\Facades\Storage;
use stdClass;

/*
|--------------------------------------------------------------------------
| Set Academics Subject Total Mark v1.2.0
|--------------------------------------------------------------------------
|
| Set students academic subject total mark based on semester
| and stored in db.
| Author:mdherwan@gmail.com
| Created: 13 Sept 2022. Updated: 03 Oct 2022.
|
*/

class MarksAcademicService
{
    /**
     * @throws Exception
     */
    public function handle(object $students): bool
    {
        $chunks = $students->chunk(100);

        foreach ($chunks as $chunk) {
            ProcessMarksAcademic::dispatch($chunk);
        }

        return true;
    }

///**
// * @throws Exception
// */
//private
//function create(object $student, int $subject): bool
//{
//    $student->subject = $subject;
//
//    match ($student->subject) {
//        1, 2, 3, 5, 7 => $this->store1($student),
//        4, 6 => $this->store2($student),
//    };
//
//    return true;
//}
//
///**
// * @throws Exception
// */
//private
//function store1(object $student): bool
//{
//    $markB1 = $this->getMarkB1($student);
//    $markA1 = $this->getMarkA1($student);
//
//    if ((-1 != $markB1[0]->mark_b1) || (-1 != $markA1[0]->mark_a1)) {
//        $wajaran_berterusan = $this->getWajaranBerterusan($student);
//        $wajaran_akhir = $this->getWajaranAkhir($student, 1);
//
//        $twb = ceil(($markB1[0]->mark_b1 / 100) * $wajaran_berterusan[0]->continuous);
//        $twa = ceil(($markA1[0]->mark_a1 / 100) * $wajaran_akhir[0]->final1);
//        $totalMarks = $twb + $twa;
//
//        MarksAcademic::where('students_details_fk', $student->id)->where(
//            'subject_academics_fk',
//            $student->subject
//        )->update(['total_marks' => $totalMarks]);
//    }
//
//    if ((-1 == $markB1[0]->mark_b1) || (-1 == $markA1[0]->mark_a1)) {
//        $this->setTotalMarksNegative($student);
//    }
//
//    return true;
//}
//
///**
// * @throws Exception
// */
//private
//function store2(object $student): bool
//{
//    $markB1 = $this->getMarkB1($student);
//    $markA1 = $this->getMarkA1($student);
//    $markA2 = $this->getMarkA2($student);
//    $markA2 = (4 == $student->subject) ? $markA2[0]->mark_a2 ?? 0 : $markA2[0]->mark_a2;
//
//    if ((-1 != $markB1[0]->mark_b1) || (-1 != $markA1[0]->mark_a1) || (-1 != $markA2)) {
//        $wajaran_berterusan = $this->getWajaranBerterusan($student);
//        $wajaran_akhir = $this->getWajaranAkhir($student, 1);
//        $wajaran_akhir2 = $this->getWajaranAkhir($student, 2);
//
//        $twb = ceil(($markB1[0]->mark_b1 / 100) * $wajaran_berterusan[0]->continuous);
//        $twa = ceil(($markA1[0]->mark_a1 / 100) * $wajaran_akhir[0]->final1);
//        $twa2 = ceil(($markA2 / 100) * $wajaran_akhir2[0]->final2);
//        $totalMarks = $twb + $twa + $twa2;
//
//        MarksAcademic::where('students_details_fk', $student->id)->where(
//            'subject_academics_fk',
//            $student->subject
//        )->update(['total_marks' => $totalMarks]);
//    }
//
//    if ((-1 == $markB1[0]->mark_b1) || (-1 == $markA1[0]->mark_a1) || (-1 != $markA2)) {
//        $this->setTotalMarksNegative($student);
//    }
//
//    return true;
//}
//
//private
//function createBMSetara(object $student): bool
//{
//    $student->subject = 1;
//
////        $wajaran_berterusan = $this->getWajaranBerterusan($student);
////        $wajaran_akhir = $this->getWajaranAkhir($student, 1);
//
//    // set dummy data for testing.
//    // coz still no data in db. will delete for PROD.
//    $wajaran_berterusan[] = new stdClass();
//    $wajaran_berterusan[0]->continuous = 30;
//    $wajaran_akhir[] = new stdClass();
//    $wajaran_akhir[0]->final1 = 30;
//
//    $bmSem1Mark = $this->getTotalMark($student->students_fk, 1);
//    $bmSem2Mark = $this->getTotalMark($student->students_fk, 2);
//    $bmSem3Mark = $this->getTotalMark($student->students_fk, 3);
//    $markB1 = $this->getMarkB1($student);
//
//
////        print $bmSem1Mark[0]['total_marks'].'<br/>';
////        print $bmSem2Mark[0]['total_marks'].'<br/>';
////        print $bmSem3Mark[0]['total_marks'].'<br/>';
////        print $markB1[0]['mark_b1'].'<br/>';
////        print $wajaran_berterusan[0]->continuous.'<br/>';
////        print $wajaran_akhir[0]->final1;exit;
//
//    return true;
//}
//
///**
// * @throws Exception
// */
//private
//function createSJSetara(object $student): bool
//{
//    $markB1 = $this->getMarkB1($student);
//    $markA1 = $this->getMarkA1($student);
//
//    if ((-1 != $markB1[0]->mark_b1) || (-1 != $markA1[0]->mark_a1)) {
//        $this->setTotalMarksNegative($student);
//    }
//
//    if ((-1 != $markB1[0]->mark_b1) || (-1 != $markA1[0]->mark_a1)) {
//        $wajaran_berterusan = $this->getWajaranBerterusan($student);
//        $wajaran_akhir = $this->getWajaranAkhir($student, 5);
//
//        $twb = ceil(($markB1[0]->mark_b1 / 100) * $wajaran_berterusan[0]->continuous);
//        $twa = ceil(($markA1[0]->mark_a1 / 100) * $wajaran_akhir[0]->final1);
//        $totalMarks = $twb + $twa;
//
////             wait confirmation where to store the value.
////            MarksAcademic::where('students_details_fk', $student->id)->where(
////                'subject_academics_fk',
////                $student->subject
////            )->update(['total_marks' => $totalMarks]);
//    }
//
//    $sjSem1Mark = $this->getTotalMark($student->students_fk, 1);
//    $sjSem2Mark = $this->getTotalMark($student->students_fk, 2);
//    $sjSem3Mark = $this->getTotalMark($student->students_fk, 3);
//
//    if (!isset($sjSem1Mark) || !isset($sjSem2Mark) || !isset($sjSem3Mark) || !isset($markA1) ||
//        ('T' == $sjSem1Mark) || ('T' == $sjSem2Mark) || ('T' == $sjSem3Mark) || ('T' == $markA1)) {
//        $PointerSJSetara = -1;
//    }
//
//    if (isset($sjSem1Mark) || isset($sjSem2Mark) || isset($sjSem3Mark) || isset($markA1) ||
//        ('T' != $sjSem1Mark) || ('T' != $sjSem2Mark) || ('T' != $sjSem3Mark) || ('T' != $markA1)) {
//        $sjSem1 = ceil(($sjSem1Mark[0]['total_marks'] / 100) * 10);
//        $sjSem2 = ceil(($sjSem2Mark[0]['total_marks'] / 100) * 10);
//        $sjSem3 = ceil(($sjSem3Mark[0]['total_marks'] / 100) * 10);
//        $markA1C = ceil(($markA1[0]->mark_a1 / 100) * 70);
//        $PointerSJSetara = $sjSem1 + $sjSem2 + $sjSem3 + $markA1C;
//    }
//
//    return true;
//}
//
///**
// * @throws Exception
// */
//private
//function getTotalMark(int $studentsFk, int $sem): object
//{
//    $studentsDetailsFk = StudentsDetail::where('students_fk', $studentsFk)
//        ->where('semester', $sem)
//        ->get('id');
//
//    $collection = MarksAcademic::where('students_details_fk', $studentsDetailsFk[0]['id'])
//        ->where('subject_academics_fk', '1')
//        ->get('total_marks');
//
//    if ($collection->isEmpty()) {
//        throw new Exception(
//            "Gred akademik tidak berjaya dijana. Tiada rekod markah Bahasa Melayu bagi semester $sem."
//        );
//    }
//
//    return $collection;
//}
//
///**
// * @throws Exception
// */
//private
//function getMarkB1(object $student): object
//{
//    $collection = MarksAcademic::where('students_details_fk', $student->id)->where(
//        'subject_academics_fk',
//        $student->subject
//    )->get('mark_b1');
//
//    if ($collection->isEmpty()) {
//        throw new Exception('Gred akademik tidak berjaya dijana. Tiada rekod markah berterusan 1.');
//    }
//
//    return $collection;
//}
//
///**
// * @throws Exception
// */
//private
//function getMarkA1(object $student): object
//{
//    $collection = MarksAcademic::where('students_details_fk', $student->id)->where(
//        'subject_academics_fk',
//        $student->subject
//    )->get('mark_a1');
//
//    if ($collection->isEmpty()) {
//        throw new Exception('Gred akademik tidak berjaya dijana. Tiada rekod markah akhir 1.');
//    }
//
//    return $collection;
//}
//
///**
// * @throws Exception
// */
//private
//function getMarkA2(object $student): object
//{
//    $collection = MarksAcademic::where('students_details_fk', $student->id)->where(
//        'subject_academics_fk',
//        $student->subject
//    )->get('mark_a2');
//
//    if ($collection->isEmpty()) {
//        throw new Exception('Gred akademik tidak berjaya dijana. Tiada rekod markah akhir 2.');
//    }
//
//    return $collection;
//}
//
//
///**
// * @throws Exception
// */
//private
//function setTotalMarksNegative(object $student): bool
//{
//    $collection = MarksAcademic::where('students_details_fk', $student->id)
//        ->where('subject_academics_fk', $student->subject)
//        ->update(['total_marks' => -1]);
//
//    if ($collection != true) {
//        throw new Exception('Gred akademik tidak berjaya dijana. Tiada rekod markah -1');
//    }
//
//    return true;
//}
//
///**
// * @throws Exception
// */
//private
//function getWajaranBerterusan(object $student): object
//{
//    $collection = SubjectAcademicsDetail::where('year', $student->year)
//        ->where('semester', $student->semester)
//        ->where('subject_academics_fk', $student->subject)
//        ->get('continuous');
//
//    if ($collection->isEmpty()) {
//        throw new Exception('Gred akademik tidak berjaya dijana. Tiada rekod wajaran berterusan.');
//    }
//
//    return $collection;
//}
//
///**
// * @throws Exception
// */
//private
//function getWajaranAkhir(object $student, int $type): object
//{
//    $final = (1 == $type) ? 'final1' : 'final2';
//
//    $collection = SubjectAcademicsDetail::where('year', $student->year)
//        ->where('semester', $student->semester)
//        ->where('subject_academics_fk', $student->subject)
//        ->get($final);
//
//    if ($collection->isEmpty()) {
//        throw new \Exception('Gred akademik tidak berjaya dijana. Tiada rekod wajaran akhir.');
//    }
//
////        $collection ?: throw new Exception('Gred akademik tidak berjaya dijana. Tiada rekod wajaran akhir.');
//    return $collection;
//}
}
