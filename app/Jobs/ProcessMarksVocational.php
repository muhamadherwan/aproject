<?php

namespace App\Jobs;

use App\Models\ConfigScoreVocational;
use App\Models\Grade;
use App\Models\MarksVocational;
use App\Models\Module;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Exception;

/*
|--------------------------------------------------------------------------
| Set Student Vocational Module Total Mark Queue Job v1.1.0
|--------------------------------------------------------------------------
|
| Set vocational module total mark based on semester
| and dispatch to job queue for stored in db process.
| Author:mdherwan@gmail.com Date: 07 Oct 2022.
| Remark: Some code were written by ZZ.
|
*/

class ProcessMarksVocational implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;
    use Batchable;

    public object $student;
    public $year;
    public $semester;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($student, $year, $semester)
    {
        $this->student = $student;
        $this->year = $year;
        $this->semester = $semester;
//        dd($this->year, $this->semester);
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws Exception
     */
    public function handle()
    {
        $collection = MarksVocational::where('students_details_fk', $this->student->id)->get();
        $this->store($collection);

        $modules = MarksVocational::where('students_details_fk', $this->student->id)
            ->count();

        $total = MarksVocational::where('students_details_fk', $this->student->id)
            ->sum('total_marks');

        $totalVocational = ceil($total / $modules);

        Grade::where('students_details_fk', $this->student->id)
            ->update(['total_vocational' => $totalVocational]);
    }

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
//                    $scoresPA = ConfigScoreVocational::where('year', 2020)
//                        ->where('semester', 1)
//                        ->get();

                    $scoresPA = ConfigScoreVocational::where('year',$this->year)
                        ->where('semester', $this->semester)
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
//            $scoresPB = ConfigScoreVocational::where('year', 2020)
//                ->where('semester', 1)
//                ->get();

            $scoresPB = ConfigScoreVocational::where('year',$this->year)
                ->where('semester', $this->semester)
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
