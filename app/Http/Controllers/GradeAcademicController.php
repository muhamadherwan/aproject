<?php

namespace App\Http\Controllers;

use App\Models\ConfigGradeAcademic;
use App\Models\Grade;
use App\Models\MarksAcademic;
use App\Models\StudentsDetail;
use App\Models\SubjectAcademicsDetail;
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
          ->get(['id', 'semester', 'year']);

        if ( count($students) > 0)
        {
            // set student grade for each subject
            foreach ($students as $student)
            {
                // hardcoded student_details_fk id for dev and. will remove!
                $student->id = 1786;
                $studentsDetailsFk = $student->id; // will use only this in prod

                $totalMark = $this->setTotalMarks($student);
                $gradeRow = Grade::where('students_details_fk', $studentsDetailsFk)->count();
                if ($gradeRow == 0) { Grade::create(['students_details_fk' => $studentsDetailsFk]); }
                $graded = $this->setGrade($studentsDetailsFk);
            }

            return redirect()->route( 'grade.academics.create')
                ->with('success', 'Gred akademik berjaya dijana.');

        }

        return redirect()->route( 'grade.academics.create')
            ->with('error', 'Gred akademik gagal dijana.');

    }

    /**
     * Set student subjects total mark based on semester
     *
     * @param
     * @return void
     */
    private function setTotalMarks($student)
    {
        $bm = ( $student->semester != 4 ) ? $this->setTmBM($student) : $this->setTmBM4($student);
    }

    /**
     * Set subjects BM total mark for sem 1 or sem 2 or sem 3
     *
     * @param
     * @return void
     */
    private function setTmBM($student):void
    {
        // for dev only. will remove!
        $student->id = 1786;

        $student->subject = 1;

        $markB1 = MarksAcademic::where('students_details_fk', $student->id)->where('subject_academics_fk', 1)->get('mark_b1');
        $markA1 = MarksAcademic::where('students_details_fk', $student->id)->where('subject_academics_fk', 1)->get('mark_a1');

//        $markB1[0]->mark_b1 = 1;
//        $markA1[0]->mark_a1 = -1;

        if ( ($markB1[0]->mark_b1 ==  -1) || ($markA1[0]->mark_a1 == -1) )
        {
            MarksAcademic::where('students_details_fk', $student->id)
                ->where('subject_academics_fk', 1)
                ->update(['total_marks' => -1]);
        } else {
            $wajaran_berterusan = $this->getWajaranBerterusan($student);
            $wajaran_akhir = $this->getWajaranAkhir($student);

            $twb = ceil(($markB1[0]->mark_b1 / 100) * $wajaran_berterusan[0]->continuous);
            $twa = ceil(($markA1[0]->mark_a1 / 100) * $wajaran_akhir[0]->final1);
            $totalMarks = $twb + $twa;

            MarksAcademic::where('students_details_fk', $student->id)
                ->where('subject_academics_fk', 1)
                ->update(['total_marks' => $totalMarks]);
        }
    }

    /**
     * Get Wajaran Berterusan from db
     *
     * @param
     * @return void
     */
    private function getWajaranBerterusan($student)
    {
        return SubjectAcademicsDetail::where('year',$student->year)
            ->where('semester',$student->semester)
            ->where('subject_academics_fk',$student->subject)
            ->get('continuous');
    }

    /**
     * Get Wajaran Akhir from db
     *
     * @param
     * @return void
     */
    private function getWajaranAkhir($student)
    {
        return SubjectAcademicsDetail::where('year',$student->year)
            ->where('semester',$student->semester)
            ->where('subject_academics_fk',$student->subject)
            ->get('final1');
    }

    /**
     * Set subjects BM total mark for sem 4
     *
     * @param
     * @return void
     */
    private function setTotalMarksSem4($subject, $kohort, $year, $semester)
    {
        // do logic for sem 4...
    }

    // Set grade process methods

    /**
     * Set grade for student.
     *
     * @param
     * @return void
     */
    private function setGrade($student):void
    {
        $subjects = MarksAcademic::where('students_details_fk', $student)
            ->where('is_graded', '=',0)
            ->orderBy('subject_academics_fk', 'ASC')
            ->get(['subject_academics_fk', 'total_marks']);

//        dd($subjects);

        foreach ($subjects as $subject)
        {
             $grade = $this->storeGrade($student, $subject);
        }
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
        // refactor later using ternary
        $subject->total_marks = empty($subject->total_marks) ? 0 : $subject->total_marks;

        $grade = ConfigGradeAcademic::where('mark_from', '<=', $subject->total_marks)
            ->where('mark_to', '>=', $subject->total_marks)->get('grade');
//dd($grade);>=
        $row = match ($subject->subject_academics_fk) {
            1 => 'grade_bm',
            2 => 'grade_bi',
            3 => 'grade_sc',
            4 => 'grade_sj',
            5 => 'grade_mt',
            6 => 'grade_pi',
            7 => 'grade_pm',
        };

//print $row;exit;
//        print $student;exit;
//        print $grade[0]->grade;exit;

        Grade::where('students_details_fk', $student)->update([$row => $grade[0]->grade]);

        MarksAcademic::where('students_details_fk', $student)
            ->where('subject_academics_fk', $subject->subject_academics_fk)
            ->update(['is_graded' => 1]);
    }

}
