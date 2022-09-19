<?php

namespace App\Http\Controllers;

use App\Actions\SetGradeAction;
use App\Services\TotalMarksService;
use Exception;
use App\Actions\GetStudentsAction;
use App\Models\College;
use App\Models\ConfigCollegesType;
use App\Models\ConfigSemester;
use App\Models\ConfigSession;
use App\Models\ConfigState;
use App\Models\ConfigYear;
use App\Models\Course;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Set Academics Grade Controller v1.1.0
|--------------------------------------------------------------------------
|
| Controller for create students subject total mark and grade
| based on request values from submit form.
| Author:mdherwan@gmail.com
| Date: 13 Sept 2022.
|
*/

class GradeAcademicController extends Controller
{
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

    public function store(
        Request $request,
        GetStudentsAction $studentsAction,
        TotalMarksService $totalMarksService,
        SetGradeAction $gradeAction
    ) {
        try {
            $students = $studentsAction->handle($request);
            $totalMarksService->handle($students);
            $gradeAction->handle($students);
        } catch (Exception $e) {
            return back()->withError($e->getMessage());
        }

        return back()->with('success', 'Gred akademik berjaya dijana.');
    }
}
