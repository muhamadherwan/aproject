<?php

namespace App\Services;

use App\Models\ConfigScoreVocational;
use App\Models\Grade;
use App\Models\MarksVocational;
use App\Models\Module;
use Exception;

class MarksVocationalService
{
    public function handle(object $students): bool
    {
        foreach ($students as $student) {
            $collection = MarksVocational::where('students_details_fk', $student->id)->get();
            $this->store($collection);

            $modules = MarksVocational::where('students_details_fk', $student->id)
                ->count();

            $total = MarksVocational::where('students_details_fk', $student->id)
                ->sum('total_marks');

            $totalVocational = ceil($total / $modules);

            Grade::where('students_details_fk', $student->id)
                ->update(['total_vocational' => $totalVocational]);
        }

        return true;
    }

//    function getTV($student)
//    {
//        $total = MarksVocational::where('students_details_fk', $student->id)
//            ->sum('total_marks');
//
//        $modules = MarksVocational::where('students_details_fk', $student->id)
////                ->where('is_graded', '=', 0)
//            ->orderBy('modules_fk', 'ASC')
//            ->get(['modules_fk', 'total_marks']);
//
//        $subject = Module::where('id', $modules->modules_fk)
//            ->get('subject_vocationals_fk');
//
//        $gradeModule = Module::query()
//                ->select('id')
//                ->selectRaw('ROW_NUMBER() OVER (ORDER BY code ASC) AS ranking')
//                ->where('subject_vocationals_fk', $subject[0]->subject_vocationals_fk)
//                ->withCasts(['ranking' => 'integer'])
//                ->get()
//                ->firstWhere('id', $module->modules_fk)
//                ?->ranking ?? 0;
//
//        $total
//
//
//
//    }

    /**
     * @throws Exception
     */
    private function store(object $collection): bool
    {
        $is_vocational_pb = 1;
        $is_vocational_pat = 1;
        $is_vocational_paa = 1;

        $is_total_vocational = 1;

        $scorePB_Amali = 0;
        $scorePB_Teori = 0;
        $scorePA_Amali = 0;
        $scorePA_Teori = 0;
        $countModule = 0;

        foreach ($collection as $collect) {
            $countModule = $countModule + 1;

            $marks = MarksVocational::where('students_details_fk', $collect->students_details_fk)
                ->where('modules_fk', $collect->modules_fk)
                ->get([
                    'mark_b_teori',
                    'mark_b_amali',
                    'mark_a_teori',
                    'mark_a_amali'
                ]);

            if ((-1 == $marks[0]->mark_b_teori) || (-1 == $marks[0]->mark_b_amali) || (-1 == $marks[0]->mark_a_teori) || (-1 == $marks[0]->mark_a_amali)) {
                $this->setTotalMarksNegative($collect);
                $is_vocational_pb = 0;
                $this->setIsVocationalPB($collect);
                $is_total_vocational = 0;
                $this->setTotalVocational($collect);
            }

            if (-1 == $marks[0]->mark_a_teori) {
                $is_vocational_pat = 0;
                $this->setIsVocationalPAT($collect);
            }

            if (-1 == $marks[0]->mark_a_amali) {
                $is_vocational_paa = 0;
                $this->setIsVocationalPAA($collect);
            }

            if ((-1 != $marks[0]->mark_b_teori) || (-1 != $marks[0]->mark_b_amali) || (-1 != $marks[0]->mark_a_teori) || (-1 != $marks[0]->mark_a_amali)) {
                $markBTeori = $marks[0]->mark_b_teori ?? 0;
                $markBAmali = $marks[0]->mark_b_amali ?? 0;
                $markATeori = $marks[0]->mark_a_teori ?? 0;
                $markAAmali = $marks[0]->mark_a_amali ?? 0;

                $modules = $this->getModules($collect->modules_fk);

//                $totalBTeori = ceil(($markBTeori / 100) * $modules[0]->b_teori);
//                $totalBAmali = ceil(($markBAmali / 100) * $modules[0]->b_amali);
//                $totalATeori = ceil(($markATeori / 100) * $modules[0]->a_teori);
//                $totalAAmali = ceil(($markAAmali / 100) * $modules[0]->a_amali);

                $totalBTeori = ($markBTeori / 100) * $modules[0]->b_teori;

                $totalBAmali = ($markBAmali / 100) * $modules[0]->b_amali;

                $totalATeori = ($markATeori / 100) * $modules[0]->a_teori;
                $totalAAmali = ($markAAmali / 100) * $modules[0]->a_amali;

                // untuk pengiraan is_vocational_pb
                $scorePB_Teori = $scorePB_Teori + $totalBTeori;
                $scorePB_Amali = $scorePB_Amali + $totalBAmali;
                $scorePA_Teori = $scorePA_Teori + $totalATeori;
                $scorePA_Amali = $scorePA_Amali + $totalAAmali;

                if ($countModule == 1) {
                    $scorePA_Teori = $scorePA_Teori + $totalATeori;
                    $scorePA_Amali = $scorePA_Amali + $totalAAmali;

//                    $scoresPA = ConfigScoreVocational::where('year', 2022)
                    $scoresPA = ConfigScoreVocational::where('year', 2020)
                        ->where('semester', 1)
                        ->get();

                    foreach ($scoresPA as $scorePA) {
                        if ($is_vocational_pat == 1) {
                            if ($scorePA_Teori < $scorePA->score_PAT) {
                                $this->setIsVocationalPAT($collect);
                            }
                        }

                        if ($is_vocational_paa == 1) {
                            if (floatval($scorePA_Amali) < $scorePA->score_PAA) {
                                $this->setIsVocationalPAA($collect);
                            }
                        }
                    }
                }

                $totalMarks = $totalBTeori + $totalBAmali + $totalATeori + $totalAAmali;


                MarksVocational::where('students_details_fk', $collect->students_details_fk)
                    ->where('modules_fk', $collect->modules_fk)
                    ->update(['total_marks' => ceil($totalMarks)]);
            }
        }

        if ($is_vocational_pb == 1) {
//            $scoresPB = ConfigScoreVocational::where('year', 2022)
            $scoresPB = ConfigScoreVocational::where('year', 2020)
                ->where('semester', 1)
                ->get();

            $totalScorePB = ($scorePB_Teori / $countModule) + ($scorePB_Amali / $countModule);

            foreach ($scoresPB as $scorePB) {
                if ($totalScorePB < $scorePB->score_PBA) {
                    $this->setIsVocationalPB($collect);
                }
            }
        }

//        if ($is_total_vocational == 1) {
//            $totalScoreVocational = (($scorePB_Teori + $scorePB_Amali) / $countModule) + ($scorePA_Teori + $scorePA_Amali) / $countModule;
//
//
////            Grade::where('students_details_fk', $collect->students_details_fk)
////                ->update(['total_vocational' => ceil($totalScoreVocational)]);
//        }

        if ($is_vocational_pb == 0 || $is_vocational_paa == 0 || $is_vocational_pat == 0) {
            Grade::where('students_details_fk', $collect->students_details_fk)
                ->update(['grade_vocational' => 'G']);
        }

        return true;
    }

    /**
     * @throws Exception
     */
    private function setTotalMarksNegative(object $student): void
    {
        MarksVocational::where('students_details_fk', $student->students_details_fk)
            ->where('modules_fk', $student->modules_fk)
            ->update(['total_marks' => -1]);
    }

    private function setIsVocationalPB(object $student): void
    {
        Grade::where('students_details_fk', $student->students_details_fk)
            ->update(['is_vocational_pb' => 0]);
    }

    private function setTotalVocational(object $student): void
    {
        Grade::where('students_details_fk', $student->students_details_fk)
            ->update(['total_vocational' => -1]);
    }

    private function setIsVocationalPAT(object $student): void
    {
        Grade::where('students_details_fk', $student->students_details_fk)
            ->update(['is_vocational_pat' => 0]);
    }

    private function setIsVocationalPAA(object $student): void
    {
        Grade::where('students_details_fk', $student->students_details_fk)
            ->update(['is_vocational_paa' => 0]);
    }

    /**
     * @throws Exception
     */
    private function getModules(int $modulesId): object
    {
        $collection = Module::where('id', $modulesId)
            ->get([
                'b_teori',
                'b_amali',
                'a_teori',
                'a_amali'
            ]);

        if ($collection->isEmpty()) {
            throw new Exception('Gred vokasional tidak berjaya dijana. Tiada rekod wajaran.');
        }

        return $collection;
    }
}
