<?php

namespace App\Http\Controllers;

use App\Actions\GetStudentsAction;
use App\Actions\GradeVocationalAction;
use App\Models\College;
use App\Models\ConfigCollegesType;
use App\Models\ConfigSemester;
use App\Models\ConfigSession;
use App\Models\ConfigState;
use App\Models\ConfigYear;
use App\Models\Course;
use App\Services\MarksVocationalService;
use Exception;
use Illuminate\Http\Request;

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
        MarksVocationalService $marksVocationalService,
        GradeVocationalAction $gradeVocationalAction
    ) {
        try {
            $students = $studentsAction->handle($request);
            $marksVocationalService->handle($students);
            $gradeVocationalAction->handle($students);
        } catch
        (Exception $e) {
            return back()->withError($e->getMessage());
        }

        return back()->with('success', 'Gred Vokasional berjaya dijana.');
    }
}
