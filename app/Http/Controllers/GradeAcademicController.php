<?php

namespace App\Http\Controllers;

use App\Models\ConfigGradeAcademic;
use App\Models\Grade;
use App\Models\MarksAcademic;
use App\Models\StudentsDetail;
use Illuminate\Http\Request;

class GradeAcademicController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return
     */
    public function create()
    {
        return view('modules.grade.academics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $colleges_fk = 50;
        $year = 2020;
        $semester = 1;
        $session = 1;
        $courses_fk = 638;

        // get students based on request
        $students = StudentsDetail::where('colleges_fk', $colleges_fk)
          ->where('year', $year)
          ->where('semester', $semester)
          ->where('session', $session)
          ->where('courses_fk', $courses_fk)
          ->get('id');

        if ( count($students) > 0)
        {
            // set student grade for each subject
            foreach ($students as $student)
            {
                // hardcoded student_details_fk id for dev and. will remove!
                $student->id = 1786;

                $row = Grade::where('students_details_fk', $student->id)->count();
                $check = ($row != 0) ? 'exist' : Grade::create(['students_details_fk' => $student->id]);
                $graded = $this->setGrade($student->id);
            }

            return redirect()->route( 'grade.academics.create')
                ->with('success', 'Gred akademik berjaya dijana.');

        }

        return redirect()->route( 'grade.academics.create')
            ->with('error', 'Gred akademik gagal dijana.');

    }

    /**
     * Set grade for student.
     *
     * @param
     * @return bool
     */
    private function setGrade($student):bool
    {
        $subjects = MarksAcademic::where('students_details_fk', $student)
            ->where('is_graded', '=',0)
            ->orderBy('subject_academics_fk', 'ASC')
            ->get(['subject_academics_fk', 'total_marks']);

        foreach ($subjects as $subject) {
            // count total mark logic here...

            // then get the grade and stored in db
            $grade = $this->storeGrade($student, $subject);
        }

        return true;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $student
     * @param $subject
     * @return void
     */
    private function storeGrade($student, $subject):void
    {
        // for testing. maybe remove later tonight
        $subject->total_marks = empty($subject->total_marks) ? 0 : $subject->total_marks;

        $grade = ConfigGradeAcademic::where('mark_from', '<=', $subject->total_marks)
            ->where('mark_to', '>=', $subject->total_marks)->get('grade');

        $row = match ($subject->subject_academics_fk) {
            1 => 'grade_bm',
            2 => 'grade_bi',
            3 => 'grade_sc',
            4 => 'grade_sj',
            5 => 'grade_mt',
            6 => 'grade_pi',
            7 => 'grade_pm',
        };

        Grade::where(['students_details_fk' => $student])->update([$row => $grade[0]->grade]);

        MarksAcademic::where('students_details_fk', $student)
            ->where('subject_academics_fk', $subject->subject_academics_fk)
            ->update(['is_graded' => 1]);
    }


}
