<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\ConfigCollegesType;
use App\Models\ConfigGradeAcademic;
use App\Models\ConfigSemester;
use App\Models\ConfigSession;
use App\Models\ConfigState;
use App\Models\ConfigYear;
use App\Models\Course;
use App\Models\Grade;
use App\Models\MarksAcademic;
use App\Models\StudentsDetail;
use App\Models\SubjectAcademicsDetail;
use Illuminate\Http\Request;

class GradeAcademicController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.grade.academics.create', [
            'states' => ConfigState::get(["parameter", "id"]),
            'collegeTypes' => ConfigCollegesType::get(["parameter", "id"]),
            'colleges' => College::get(["id", "code", "name"]),
            'years' => ConfigYear::get("parameter"),
            'semesters' => ConfigSemester::get(["id", "parameter"]),
            'sessions' => ConfigSession::get(["id", "parameter"]),
            'courses' => Course::get(["id", "code", "name"])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $students = $this->getStudents($request);
//        print count($students);exit;

        if (count($students) > 0) {
//            foreach ($students as $student)
//            {
//                $studentsDetailsFk = $student->id;
//                $totalMark = $this->setTotalMarks($student);
//                $gradeRow = Grade::where('students_details_fk', $studentsDetailsFk)->count();
//                if ($gradeRow == 0) { Grade::create(['students_details_fk' => $studentsDetailsFk]); }
//                $graded = $this->setGrade($studentsDetailsFk);
//            }
            return back()->with('success', 'Gred akademik berjaya dijana.');
        }
        return back()->with('error', 'Gred akademik gagal dijana.');
    }

    /**
     * Get students based on request.
     * @param $student
     * @return
     */
    public function getStudents(Request $request)
    {
        return $students = StudentsDetail::where('colleges_fk', $request->college)
            ->where('year', $request->year)
            ->where('semester', $request->semester)
            ->where('session', $request->session)
            ->where('courses_fk', $request->course)
            ->get(['id', 'semester', 'year']);
    }


    /**
     * Set student subjects total mark based on subject.
     * @param $student
     * @return void
     */
    private function setTotalMarks($student)
    {
        $bm = ($student->semester != 4) ? $this->setTmSem($student, 1) : $this->setTmBMSetara($student);
        $bi = $this->setTmSem($student, 2);
        $mt = $this->setTmSem($student, 3);
        $sn = $this->setTmSem($student, 4);
        $sj = ($student->semester != 4) ? $this->setTmSem($student, 5) : $this->setTmSJSetara($student);
        $piRow = MarksAcademic::where('students_details_fk', $student->id)->where('subject_academics_fk', '6')->count();
        $agama = ($piRow == 1) ? $this->setTmSem($student, 6) : $this->setTmSem($student, 7);
    }

    /**
     * Set subjects total mark for All Semester
     * @param $student
     * @param $subject
     * @return void
     */
    private function setTmSem($student, $subject): void
    {
//        print $student;exit;
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
//            print $markB1[0]->mark_b1;exit;

                $markA1 = MarksAcademic::where('students_details_fk', $student->id)->where(
                    'subject_academics_fk',
                    $student->subject
                )->get('mark_a1');

                if (($markB1[0]->mark_b1 == -1) || ($markA1[0]->mark_a1 == -1)) {
                    $this->setTotalMarksNegative($student);
                } else {
                    $wajaran_berterusan = $this->getWajaranBerterusan($student);
                    $wajaran_akhir = $this->getWajaranAkhir($student, 1);

                    $twb = ceil(($markB1[0]->mark_b1 / 100) * $wajaran_berterusan[0]->continuous);
                    $twa = ceil(($markA1[0]->mark_a1 / 100) * $wajaran_akhir[0]->final1);
                    $totalMarks = $twb + $twa;

                    MarksAcademic::where('students_details_fk', $student->id)->where(
                        'subject_academics_fk',
                        $student->subject
                    )->update(['total_marks' => $totalMarks]);
                }
                break;
            case 4:
            case 6:
                $markB1 = MarksAcademic::where('students_details_fk', $student->id)->where(
                    'subject_academics_fk',
                    $student->subject
                )->get('mark_b1');
                $markA1 = MarksAcademic::where('students_details_fk', $student->id)->where(
                    'subject_academics_fk',
                    $student->subject
                )->get('mark_a1');
                $markA2 = MarksAcademic::where('students_details_fk', $student->id)->where(
                    'subject_academics_fk',
                    $student->subject
                )->get('mark_a2');
                $markA2 = ($student->subject == 4) ? $markA2[0]->mark_a2 ?? 0 : $markA2[0]->mark_a2;

                if (($markB1[0]->mark_b1 == -1) || ($markA1[0]->mark_a1 == -1) || ($markA2 == -1)) {
                    $this->setTotalMarksNegative($student);
                } else {
                    $wajaran_berterusan = $this->getWajaranBerterusan($student);
                    $wajaran_akhir = $this->getWajaranAkhir($student, 1);
                    $wajaran_akhir2 = $this->getWajaranAkhir($student, 2);

                    $twb = ceil(($markB1[0]->mark_b1 / 100) * $wajaran_berterusan[0]->continuous);
                    $twa = ceil(($markA1[0]->mark_a1 / 100) * $wajaran_akhir[0]->final1);
                    $twa2 = ceil(($markA2 / 100) * $wajaran_akhir2[0]->final2);
                    $totalMarks = $twb + $twa + $twa2;

                    MarksAcademic::where('students_details_fk', $student->id)->where(
                        'subject_academics_fk',
                        $student->subject
                    )->update(['total_marks' => $totalMarks]);
                }
        }
    }

    /**
     * Set subjects total mark to "-1"
     * @param $student
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
     * @param $student
     * @return void
     */
    private function getWajaranBerterusan($student)
    {
        return SubjectAcademicsDetail::where('year', $student->year)
            ->where('semester', $student->semester)
            ->where('subject_academics_fk', $student->subject)
            ->get('continuous');
    }

    /**
     * Get Wajaran Akhir from db
     * @param $student
     * @param $type
     * @return void
     */
    private function getWajaranAkhir($student, $type)
    {
        $final = ($type == 1) ? 'final1' : 'final2';
        return SubjectAcademicsDetail::where('year', $student->year)
            ->where('semester', $student->semester)
            ->where('subject_academics_fk', $student->subject)
            ->get($final);
    }

    /**
     * Set subjects BM Setara total mark
     * @param $student
     * @return void
     */
    private function setTmBMSetara($student)
    {
        // do logic for sem 4...
    }

    /**
     * Set subjects SJ Setara total mark
     * @param $student
     * @return void
     */
    private function setTmSJSetara($student)
    {
        // do logic for sem 4...
    }

    // *** Set grade process methods *** //

    /**
     * Set grade for student.
     * @param $student
     * @return void
     */
    private function setGrade($student): void
    {
        $subjects = MarksAcademic::where('students_details_fk', $student)
            ->where('is_graded', '=', 0)
            ->orderBy('subject_academics_fk', 'ASC')
            ->get(['subject_academics_fk', 'total_marks']);

        foreach ($subjects as $subject) {
            $grade = $this->storeGrade($student, $subject);
        }
    }

    /**
     * Store newly created subject grade resource in storage.
     * @param $student
     * @param $subject
     * @return void
     */
    private function storeGrade($student, $subject): void
    {
        $total_marks = $subject->total_marks ?? 0;

        $grade = ConfigGradeAcademic::where('mark_from', '<=', $total_marks)
            ->where('mark_to', '>=', $total_marks)->get('grade');

        $row = match ($subject->subject_academics_fk) {
            1 => 'grade_bm',
            2 => 'grade_bi',
            3 => 'grade_mt',
            4 => 'grade_sc',
            5 => 'grade_sj',
            6 => 'grade_pi',
            7 => 'grade_pm',
        };

        Grade::where('students_details_fk', $student)->update([$row => $grade[0]->grade]);

        MarksAcademic::where('students_details_fk', $student)
            ->where('subject_academics_fk', $subject->subject_academics_fk)
            ->update(['is_graded' => 1]);
    }

}
