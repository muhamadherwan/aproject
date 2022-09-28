<?php

namespace App\Http\Controllers;

use App\Actions\SetGradeVocationalAction;
use App\Services\TotalMarksVocationalService;
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
| Set Vocational Grade Controller v1.1.0
|--------------------------------------------------------------------------
|
| Create students vocational module total mark and grade
| based on request values from submit form.
| Author:mdherwan@gmail.com Date: 27 Sept 2022.
|
*/

class GradeVocationalController extends Controller
{
    public function create()
    {
        return view('modules.grade.vocationals.create', [
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
        TotalMarksVocationalService $totalMarksVocationalService,
        SetGradeVocationalAction $gradeAction
    ) {
        try {
            $students = $studentsAction->handle($request);
            $totalMarksVocationalService->handle($students);
            $gradeAction->handle($students);
        } catch (Exception $e) {
            return back()->withError($e->getMessage());
        }

        return back()->with('success', 'Gred Vokasional berjaya dijana.');
    }
}
