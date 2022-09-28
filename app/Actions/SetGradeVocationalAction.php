<?php

namespace App\Actions;

use App\Models\ConfigGradeModule;
use App\Models\Grade;
use App\Models\MarksVocational;
use App\Models\Module;


/*
|--------------------------------------------------------------------------
| Set Students Vocational Grade v1.1.0
|--------------------------------------------------------------------------
|
| Set students vocational module grade based on total mark, stored in
| grades table and update is graded status to 1 in marks_vocational table.
| Author:mdherwan@gmail.com Date: 27 Sept 2022.
|
*/

class SetGradeVocationalAction
{
    public function handle(object $students): bool
    {
        foreach ($students as $student) {
            $gradeRow = Grade::where('students_details_fk', $student->id)->count();

            if ($gradeRow == 0) {
                Grade::create(['students_details_fk' => $student->id]);
            }

            $modules = MarksVocational::where('students_details_fk', $student->id)
                ->where('is_graded', '=', 0)
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

                Grade::where('students_details_fk', $student->id)->update([$row => $grade[0]->grade]);

                MarksVocational::where('students_details_fk', $student->id)
                    ->where('modules_fk', $module->modules_fk)
                    ->update(['is_graded' => 1]);
            }
        }
        return true;
    }
}
