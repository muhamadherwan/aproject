<?php

namespace App\Actions;

use App\Models\ConfigGradeAcademic;
use App\Models\Grade;
use App\Models\MarksAcademic;

/*
|--------------------------------------------------------------------------
| Set Students Detail v1.1.0
|--------------------------------------------------------------------------
|
| Action class for set students academic subject
| grade based on total mark.
| Author:mdherwan@gmail.com
| Date: 13 Sept 2022.
|
*/

class SetGradeAction
{
    public function handle(object $students):bool
    {
        foreach ($students as $student) {
            $subjects = MarksAcademic::where('students_details_fk', $student->id)
                ->where('is_graded', '=', 0)
                ->orderBy('subject_academics_fk', 'ASC')
                ->get(['subject_academics_fk', 'total_marks']);

            foreach ($subjects as $subject) {
                $totalMarks = $subject->total_marks ?? 0;

                $grade = ConfigGradeAcademic::where('mark_from', '<=', $totalMarks)
                    ->where('mark_to', '>=', $totalMarks)->get('grade');

                $row = match ($subject->subject_academics_fk) {
                    1 => 'grade_bm',
                    2 => 'grade_bi',
                    3 => 'grade_mt',
                    4 => 'grade_sn',
                    5 => 'grade_sj',
                    6 => 'grade_pi',
                    7 => 'grade_pm',
                };

                $gradeRow = Grade::where('students_details_fk', $student->id)->count();

                if ($gradeRow == 0) { Grade::create(['students_details_fk' => $student->id]); }

                Grade::where('students_details_fk', $student->id)->update([$row => $grade[0]->grade]);

                MarksAcademic::where('students_details_fk', $student->id)
                    ->where('subject_academics_fk', $subject->subject_academics_fk)
                    ->update(['is_graded' => 1]);
            }
        }
        return true;
    }
}
