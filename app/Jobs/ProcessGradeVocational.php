<?php

namespace App\Jobs;

use App\Models\ConfigGradeModule;
use App\Models\ConfigGradeVocational;
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

/*
|--------------------------------------------------------------------------
| Set Students Vocational Grade v1.1.0
|--------------------------------------------------------------------------
|
| Set students vocational mod grade module based on total mark, stored in
| grades table and update is graded status to 1 in marks_vocational table.
| Author:mdherwan@gmail.com Date: 7 Oct 2022.
|
*/

class ProcessGradeVocational implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;
    use Batchable;

    public object $student;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(object $student)
    {
        $this->student = $student;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $gradeRow = Grade::where('students_details_fk', $this->student->id)->count();

        if ($gradeRow == 0) {
            Grade::create(['students_details_fk' => $this->student->id]);
        }

        $modules = MarksVocational::where('students_details_fk', $this->student->id)
//                ->where('is_graded', '=', 0)
            ->orderBy('modules_fk', 'ASC')
            ->get(['modules_fk', 'total_marks']);

        foreach ($modules as $module) {
            $totalMarks = $module->total_marks ?? 0;

            $grade = ConfigGradeModule::where('mark_from', '<=', $totalMarks)
                ->where('mark_to', '>=', $totalMarks)->get('grade');

            $subject = Module::where('id', $module->modules_fk)
                ->get('subject_vocationals_fk');

            $gradeModule = Module::query()
                    ->select('id')
                    ->selectRaw('ROW_NUMBER() OVER (ORDER BY code ASC) AS ranking')
                    ->where('subject_vocationals_fk', $subject[0]->subject_vocationals_fk)
                    ->withCasts(['ranking' => 'integer'])
                    ->get()
                    ->firstWhere('id', $module->modules_fk)
                    ?->ranking ?? 0;

            $row = match ($gradeModule) {
                1 => 'grade_module1',
                2 => 'grade_module2',
                3 => 'grade_module3',
                4 => 'grade_module4',
                5 => 'grade_module5',
                6 => 'grade_module6',
                7 => 'grade_module7',
                8 => 'grade_module8',
            };

            if ($grade[0]->grade == 'C+' || $grade[0]->grade == 'C' || $grade[0]->grade == 'C-'
                || $grade[0]->grade == 'D+' || $grade[0]->grade == 'D' || $grade[0]->grade == 'D-'
                || $grade[0]->grade == 'E' || $grade[0]->grade == 'G' || $grade[0]->grade == 'T') {
                Grade::where('students_details_fk', $this->student->id)->update(
                    [$row => $grade[0]->grade, 'is_competent' => 0, 'grade_vocational' => 'G']
                );
            } else {
                Grade::where('students_details_fk', $this->student->id)->update([$row => $grade[0]->grade]);
            }

            MarksVocational::where('students_details_fk', $this->student->id)
                ->where('modules_fk', $module->modules_fk)
                ->update(['is_graded' => 1]);

        }

        $grades_vocational = Grade::where('students_details_fk', $this->student->id)
            ->select(['is_vocational_pb', 'is_vocational_paa', 'is_vocational_pat', 'is_competent', 'total_vocational'])
            ->get();

        // zz code.
        $skipGradeVocational = 1;
        foreach ($grades_vocational as $grade_vocational) {
            if ($grade_vocational->is_vocational_paa == 0 || $grade_vocational->is_vocational_pb == 0 || $grade_vocational->is_vocational_pat == 0 || $grade_vocational->is_competent == 0) {
                $skipGradeVocational = 0;
                Grade::where('students_details_fk', $this->student->id)->update(['grade_vocational' => 'G']);
            }
            if ($grade_vocational->total_vocational == -1) {
                $skipGradeVocational = 0;
                Grade::where('students_details_fk', $this->student->id)->update(['grade_vocational' => 'T']);
            }

            if ($skipGradeVocational == 1) {
                $gradesVocational = ConfigGradeVocational::where('mark_from', '<=', $grade_vocational->total_vocational)
                    ->where('mark_to', '>=', $grade_vocational->total_vocational)->get('grade');

                foreach ($gradesVocational as $gradeVocational) {
                    Grade::where('students_details_fk', $this->student->id)->update(
                        ['grade_vocational' => $gradeVocational->grade]
                    );
                }
            }
        }
    }
}
