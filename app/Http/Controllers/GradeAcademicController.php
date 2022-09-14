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
     * @param
     * @return void
     */
    private function setTotalMarks($student)
    {
        $bm = ( $student->semester != 4 ) ? $this->setTmSem($student, 1) : $this->setTmBMSem4($student);
        $bi = $this->setTmSem($student, 2);
        $mt = $this->setTmSem($student, 3);
        $sn = $this->setTmSem($student, 4);
        $sj = $this->setTmSem($student, 5);
    }

    /**
     * Set subjects total mark for All Semester
     * @param $student
     * @param $subject
     * @return void
     */
    private function setTmSem($student, $subject):void
    {
        // for dev only. will remove!
        $student->id = 1786;

        $student->subject = $subject;

        switch ($student->subject)
        {
            case 1:
            case 2:
            case 3:
            case 5:
                $markB1 = MarksAcademic::where('students_details_fk', $student->id)->where('subject_academics_fk', $student->subject)->get('mark_b1');
                $markA1 = MarksAcademic::where('students_details_fk', $student->id)->where('subject_academics_fk', $student->subject)->get('mark_a1');

                if (($markB1[0]->mark_b1 == -1) || ($markA1[0]->mark_a1 == -1))
                {
                    $this->setTotalMarksNegative($student);
                } else {
                    $wajaran_berterusan = $this->getWajaranBerterusan($student);
                    $wajaran_akhir = $this->getWajaranAkhir($student, 1);

                    $twb = ceil(($markB1[0]->mark_b1 / 100) * $wajaran_berterusan[0]->continuous);
                    $twa = ceil(($markA1[0]->mark_a1 / 100) * $wajaran_akhir[0]->final1);
                    $totalMarks = $twb + $twa;

                    MarksAcademic::where('students_details_fk', $student->id)->where('subject_academics_fk', $student->subject)->update(['total_marks' => $totalMarks]);
                }
                break;
            case 4:
                $markB1 = MarksAcademic::where('students_details_fk', $student->id)->where('subject_academics_fk', $student->subject)->get('mark_b1');
                $markA1 = MarksAcademic::where('students_details_fk', $student->id)->where('subject_academics_fk', $student->subject)->get('mark_a1');
                $markA2 = MarksAcademic::where('students_details_fk', $student->id)->where('subject_academics_fk', $student->subject)->get('mark_a2');
                $markA2 = $markA2[0]->mark_a2 ?? 0;

                if ( ($markB1[0]->mark_b1 == -1) || ($markA1[0]->mark_a1 == -1) || ($markA2 == -1) )
                {
                    $this->setTotalMarksNegative($student);
                } else {
                    $wajaran_berterusan = $this->getWajaranBerterusan($student);
                    $wajaran_akhir = $this->getWajaranAkhir($student, 1);
                    $wajaran_akhir2 = $this->getWajaranAkhir($student, 2);

                    $twb = ceil(($markB1[0]->mark_b1 / 100) * $wajaran_berterusan[0]->continuous);
                    $twa = ceil(($markA1[0]->mark_a1 / 100) * $wajaran_akhir[0]->final1);
                    $twa2 = ceil(($markA2 / 100) * $wajaran_akhir2[0]->final2);
                    $totalMarks = $twb + $twa + $twa2;
//print $totalMarks;exit;
                    MarksAcademic::where('students_details_fk', $student->id)->where('subject_academics_fk', $student->subject)->update(['total_marks' => $totalMarks]);
//                    exit;
                }
        }
    }

    /**
     * Set subject total mark and save in db.
     * @param $markB1
     * @param $markA1
     * @param $markA2
     * @param $student
     */
    private function storedTM($markB1, $markA1, $markA2, $student): void
    {

        if (($markB1->mark_b1 == -1) || ($markA1->mark_a1 == -1)) {
            $this->setTotalMarksNegative($student);
        } else {
            $wajaran_berterusan = $this->getWajaranBerterusan($student);
            $wajaran_akhir = $this->getWajaranAkhir($student);

            $twb = ceil(($markB1->mark_b1 / 100) * $wajaran_berterusan[0]->continuous);
            $twa = ceil(($markA1->mark_a1 / 100) * $wajaran_akhir[0]->final1);
            $totalMarks = $twb + $twa;

            MarksAcademic::where('students_details_fk', $student->id)
                ->where('subject_academics_fk', $student->subject)
                ->update(['total_marks' => $totalMarks]);
        }
    }

    /**
     * Set Sains subject total mark and save in db.
     * @param $markB1
     * @param $markA1
     * @param $student
     */
    private function storedTMSN($markB1, $markA1, $student): void
    {
        if (($markB1->mark_b1 == -1) || ($markA1->mark_a1 == -1)) {
            $this->setTotalMarksNegative($student);
        } else {
            $wajaran_berterusan = $this->getWajaranBerterusan($student);
            $wajaran_akhir = $this->getWajaranAkhir($student);

            $twb = ceil(($markB1->mark_b1 / 100) * $wajaran_berterusan[0]->continuous);
            $twa = ceil(($markA1->mark_a1 / 100) * $wajaran_akhir[0]->final1);
            $totalMarks = $twb + $twa;

            MarksAcademic::where('students_details_fk', $student->id)
                ->where('subject_academics_fk', $student->subject)
                ->update(['total_marks' => $totalMarks]);
        }
    }

    /**
     * Set subjects total mark to "-1"
     *
     * @param
     * @return void
     */
    private function setTotalMarksNegative($student)
    {
        MarksAcademic::where('students_details_fk', $student->id)
            ->where('subject_academics_fk', $student->subject)
            ->update(['total_marks' => -1]);
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
    private function getWajaranAkhir($student, $type)
    {
        $final = ($type == 1) ? 'final1' : 'final2';
        return SubjectAcademicsDetail::where('year',$student->year)
            ->where('semester',$student->semester)
            ->where('subject_academics_fk',$student->subject)
            ->get($final);
    }

    /**
     * Set subjects BM total mark for sem 4
     *
     * @param
     * @return void
     */
    private function setTmBMSem4($student)
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
//        print $student;exit;
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
//        print $subject;exit;
        // refactor later using ternary
//        $subject->total_marks = empty($subject->total_marks) ? 0 : $subject->total_marks;

        $total_marks = $subject->total_marks ?? 0;
//print $total_marks;exit;

        $grade = ConfigGradeAcademic::where('mark_from', '<=', $total_marks)
            ->where('mark_to', '>=', $total_marks)->get('grade');
//dd($grade);
        $row = match ($subject->subject_academics_fk)
        {
            1 => 'grade_bm',
            2 => 'grade_bi',
            3 => 'grade_mt',
            4 => 'grade_sc',
            5 => 'grade_sj',
            6 => 'grade_pi',
            7 => 'grade_pm',
        };

//print $row;exit;
//        print $student;exit;
//        print $grade[0]->grade;exit;

        Grade::where('students_details_fk', $student)->update([$row => $grade[0]->grade]);
//exit;
        MarksAcademic::where('students_details_fk', $student)
            ->where('subject_academics_fk', $subject->subject_academics_fk)
            ->update(['is_graded' => 1]);
    }

}
